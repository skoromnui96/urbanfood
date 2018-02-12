<?php

use yii\db\Migration;

/**
 * Handles the creation of table `slider`.
 */
class m171108_112758_create_slider_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('slider', [
            'id' => $this->primaryKey(),
            'title' => $this->string(255),
            'description' => $this->string(255),
            'bg_img' => $this->string(255),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('slider');
    }
}
