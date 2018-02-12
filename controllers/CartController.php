<?php

namespace app\controllers;

use Yii;
use app\models\Cart;
use app\models\Menu;
use app\models\Order;
use app\models\OrderItems;
use yii\web\Controller;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use Swift_Plugins_LoggerPlugin;
use Swift_Plugins_Loggers_ArrayLogger;

class CartController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }


    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionAdd()
    {
        $id = Yii::$app->request->get('id'); // узнаем id товара
        $count = (int)Yii::$app->request->get('count'); //получаем количество товара приставка (int) для получения числа
        $count = !$count ? 1 : $count; //если не число то подставляем дефолтное значение, тоесть 1
        $product = Menu::findOne($id); // находим товар с указанным ранее id
        if (empty($product)) return false; // если товара нет то ничего не выводим
        $session = Yii::$app->session; //
        $session->open(); // начало сессии для хранение данных для корзины
        $cart = new Cart();
        $cart->addToCart($product, $count); // с помощью этого метода в моделе Cart добавляем товар
        if (!Yii::$app->request->isAjax){ // если вдруг javascript отключен на сайте то перенаправляем покупателя на страницу с которой он пришел
            return $this->redirect(Yii::$app->request->referrer);
        }
        $this->layout = false; // отключаем шаблон в модальном окне для того чтоб не отображался в нем футер и хедер
        return $this->render('add', compact('session'));

    }

    /*
     * удаляем все значения из массива $_SESSION с помощью встроенных методов, тоесть очистка корзины полностью
     */
    public function actionClear()
    {
        $session = Yii::$app->session;
        $session->open();
        $session->remove('cart');
        $session->remove('cart.count');
        $session->remove('cart.sum');
        $this->layout = false;
        return $this->render('add', compact('session'));
    }

    /*
     * удаление только выбранной позиции из корзины с помощью метода recalc в моделе Cart
     */
    public function actionDelItem()
    {
        $id = Yii::$app->request->get('id');
        $session = Yii::$app->session;
        $session->open();
        $cart = new Cart();
        $cart->recalc($id);
        $this->layout = false;
        return $this->render('add', compact('session'));
    }
    /*
     * отображение содержимого корзины по нажатию на кнопку корзины без добавления какого либо товара, в связи с
     * этим не передавался параметр id товара
     */
    public function actionShow()
    {
        $session = Yii::$app->session;
        $session->open();
        $this->layout = false;
        return $this->render('add', compact('session'));
    }

    public function actionView()
    {
        $session = Yii::$app->session;
        $session->open();
        $order = new Order();
        if ($order->load(Yii::$app->request->post())){
            $order->count = $session['cart.count'];
            $order->sum = $session['cart.sum'];
            if ($order->save()){
                $order->saveOrderItems($session['cart'], $order->id);
                Yii::$app->mailer->compose('orders', ['session' => $session, 'order'=> $order])
                    ->setFrom('alexskoromnui96@yandex.com')
                    ->setTo('alexskoromnui@gmail.com')
                    ->setSubject('Заказ')
                    ->send();

                $session->remove('cart');
                $session->remove('cart.count');
                $session->remove('cart.sum');
                return $this->goBack();

            }
            else Yii::$app->session->setFlash('error', 'Ваш заказ не принят');
        }
        return $this->render('view', compact('session', 'order'));
    }

}