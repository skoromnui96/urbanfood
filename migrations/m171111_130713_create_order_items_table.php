<?php

use yii\db\Migration;

/**
 * Handles the creation of table `order_items`.
 */
class m171111_130713_create_order_items_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('order_items', [
            'id' => $this->primaryKey(),
            'order_id' => $this->integer(),
            'product_id' => $this->integer(),
            'category' => $this->string(),
            'size' => $this->integer(),
            'name' => $this->string(),
            'price' => $this->float(),
            'count_item' => $this->integer(),
            'sum_item' => $this->float(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('order_items');
    }
}
