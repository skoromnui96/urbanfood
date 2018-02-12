<?php

use yii\db\Migration;

/**
 * Handles the creation of table `quick_order`.
 */
class m171111_225039_create_quick_order_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('quick_order', [
            'id' => $this->primaryKey(),
            'phone' => $this->string(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('quick_order');
    }
}
