<?php

namespace app\models;

use Yii;
use \yii\db\ActiveRecord;

/**
 * This is the model class for table "order_items".
 *
 * @property integer $id
 * @property integer $order_id
 * @property integer $product_id
 * @property string $category
 * @property integer $size
 * @property string $name
 * @property double $price
 * @property integer $count_item
 * @property double $sum_item
 */
class OrderItems extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'order_items';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['order_id', 'product_id', 'size', 'count_item'], 'integer'],
            [['price', 'sum_item'], 'number'],
            [['category', 'name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'order_id' => '№ Заказа',
            'product_id' => 'Product ID',
            'category' => 'Категория',
            'size' => 'Размер',
            'name' => 'Название',
            'price' => 'Цена',
            'count_item' => 'Количество',
            'sum_item' => 'Сумма',
        ];
    }
    public function getOrder()
    {
        return $this->hasOne(Order::className(),['id' => 'order_id']);
    }
}
