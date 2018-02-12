<?php

use yii\db\Migration;

/**
 * Handles the creation of table `menu`.
 */
class m171112_201527_create_menu_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('menu', [
            'id' => $this->primaryKey(),
            'category_id' => $this->integer(),
            'name' => $this->string(),
            'consists' => $this->string(),
            'cook' => $this->string(),
            'size' => $this->integer(),
            'price' => $this->float(),
            'weight' => $this->integer(),
            'img' => $this->string(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('menu');
    }
}
