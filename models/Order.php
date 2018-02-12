<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use \yii\db\ActiveRecord;

/**
 * This is the model class for table "order".
 *
 * @property integer $id
 * @property string $created_at
 * @property string $updated_at
 * @property string $delivery_date
 * @property integer $size
 * @property integer $count
 * @property double $sum
 * @property integer $status
 * @property string $phone
 * @property string $city
 * @property string $street
 * @property string $corps
 * @property string $house
 * @property string $flat
 * @property string $comment
 */
class Order extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'order';
    }

    public function behaviors()
    {
        return [[
            'class' => TimestampBehavior::className(),
            'attributes' => [
                ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
            ],
            'value' => new Expression('NOW()'),
        ],
        ];
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['created_at', 'updated_at', 'delivery_date'], 'safe'],
            [['size', 'count', 'status'], 'integer'],
            [['sum'], 'number'],
            [['phone', 'city', 'street', 'corps', 'house', 'flat', 'comment'], 'string', 'max' => 255],
            [['phone'], 'required'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'delivery_date' => 'Delivery Date',
            'size' => 'Size',
            'count' => 'Count',
            'sum' => 'Sum',
            'status' => 'Status',
            'phone' => 'Телефон',
            'city' => 'Город',
            'street' => 'Улица',
            'corps' => 'Корпус',
            'house' => 'Дом',
            'flat' => 'Квартира',
            'comment' => 'Здесь вы можете оставить комментарий к заказу',
        ];
    }
    

    public function getOrderItems()
    {
        return $this->hasMany(OrderItems::className(), ['order_id' => 'id']);
    }
    public function saveOrderItems($items, $order_id)
    {
        foreach ($items as $id => $item){
            $order_items = new OrderItems();
            $order_items->order_id = $order_id;
            $order_items->product_id = $id;
            $order_items->name = $item['name'];
            $order_items->price = $item['price'];
            $order_items->count_item = $item['count'];
            $order_items->sum_item = $item['count']*$item['price'];
            $order_items->save();
        }
    }
}
