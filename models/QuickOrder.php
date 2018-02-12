<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "quick_order".
 *
 * @property integer $id
 * @property string $phone
 */
class QuickOrder extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'quick_order';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['phone'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'phone' => '',
        ];
    }
}
