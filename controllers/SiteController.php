<?php

namespace app\controllers;

use app\models\Category;
use app\models\Order;
use app\models\OrderItems;
use app\models\Cart;
use app\models\Menu;
use app\models\QuickOrder;
use app\models\Reviews;
use app\models\Slider;
use app\models\Stock;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;


class SiteController extends Controller
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
    public function actionIndex()
    {
        $session = Yii::$app->session;
        $session->open();

        $quickorder = new QuickOrder();
        if ($quickorder->load(Yii::$app->request->post()) && $quickorder->save()) {
            Yii::$app->mailer->compose('phone', ['quickorder' => $quickorder])
                ->setFrom('alexskoromnui96@yandex.com')
                ->setTo('alexskoromnui@gmail.com')
                ->setSubject('Быстрый заказ')
                ->send();
            return $this->refresh();

        }
        $model = new Reviews();
        $model->load(Yii::$app->request->post()) && $model->save();

        $reviews = Reviews::find()->all();
        $menu1 = Menu::find()->where(['category_id' => 1, 'size' => 0])->all();
        $menu2 = Menu::find()->where(['category_id' => 2])->all();
        $menu3 = Menu::find()->where(['category_id' => 3])->all();

        $kidsfood = Menu::find()->where(['category_id' => 4])->all();
        $sliders = Slider::find()->all();
        $stocks = Stock::find()->all();
        return $this->render('index', [
            'stocks' => $stocks,
            'sliders' => $sliders,
            'menu1' => $menu1,
            'menu2' => $menu2,
            'menu3' => $menu3,
            'kidsfood' => $kidsfood,
            'reviews' => $reviews,
            'model' => $model,
            'session' => $session,
            'quickorder' => $quickorder,
            
        ]);
    }
    public function actionSlider()
    {
        $sliders = Slider::find()->all();
        return $this->render('slider', [
            'sliders' => $sliders,
        ]);
    }

    public function actionMenu()
    {

        $menu1 = Menu::find()->where(['category_id' => 1])->all();
        $menu2 = Menu::find()->where(['category_id' => 2])->all();
        $menu3 = Menu::find()->where(['category_id' => 3])->all();
        return $this->render('menu', [
            'menu1' => $menu1,
            'menu2' => $menu2,
            'menu3' => $menu3,
        ]);
    }
    public function actionKidsMenu()
    {
        $kidsfood =Menu::find()->where(['category_id' => 4])->all();
        return $this->render('menu', [
            'kidsfood' => $kidsfood
        ]);
    }
    public function actionSale()
    {
        $stocks = Stock::find()->all();
        return $this->render('menu', [
            'stocks' => $stocks,
        ]);
    }
    public function actionReviews()
    {
        $reviews = Reviews::find()->all();
        return $this->render('reviews',[
            'reviews' => $reviews
        ]);
    }
    public function actionNew()
    {
        $model = new Reviews();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        } else {
            return $this->render('new', [
                'model' => $model,
            ]);
        }
    }


    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
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
                Yii::$app->session->setFlash('success', 'Ваш заказ принят');
                Yii::$app->mailer->compose('order', ['session' => $session])
                    ->setFrom('alexskoromnui@gmail.com')
                    ->setTo($order->email)
                    ->setSubject('Заказ')
                    ->send();
                $session->remove('cart');
                $session->remove('cart.count');
                $session->remove('cart.sum');
                return $this->refresh();
            }
            else Yii::$app->session->setFlash('error', 'Ваш заказ не принят');
        }
        return $this->render('view', compact('session', 'order'));
    }
}
