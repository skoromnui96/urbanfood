<?php

use yii\db\Migration;

/**
 * Handles the creation of table `order`.
 */
class m171111_130659_create_order_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('order', [
            'id' => $this->primaryKey(),
            'created_at' => $this->dateTime(),
            'updated_at' => $this->dateTime(),
            'delivery_date' => $this->dateTime(),
            'size' => $this->integer(),
            'count' => $this->integer(),
            'sum' => $this->float(),
            'status' => $this->integer()->defaultValue(0),
            'phone' => $this->string(),
            'city' => $this->string(),
            'street' => $this->string(),
            'corps' => $this->string(),
            'house' => $this->string(),
            'flat' => $this->string(),
            'comment' => $this->string(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('order');
    }
}
