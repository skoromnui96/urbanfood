<?php

use yii\db\Migration;

/**
 * Handles the creation of table `reviews`.
 */
class m171108_113124_create_reviews_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('reviews', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'text' => $this->string(),
            'email' => $this->string(),
            'created_at' => $this->dateTime(),
            'updated_at' => $this->dateTime(),
            'status' => $this->integer()
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('reviews');
    }
}
