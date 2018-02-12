<?php

use yii\db\Migration;

/**
 * Handles the creation of table `size`.
 */
class m171108_174028_create_size_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('size', [
            'id' => $this->primaryKey(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('size');
    }
}
