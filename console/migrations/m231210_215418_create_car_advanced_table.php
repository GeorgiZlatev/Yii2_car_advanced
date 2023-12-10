<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%car_advanced}}`.
 */
class m231210_215418_create_car_advanced_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%car_advanced}}', [
            'id' => $this->primaryKey(),
            'type_auto' => $this->string()->notNull(),
            'brand' => $this->text()->notNull(),
            'model' => $this->text()->notNull(),
            'year_car' => $this->text()->notNull(),
            'description' => $this->text()->notNull(),
            'start_date' => $this->integer()->notNull(),
            'end_date' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%car_advanced}}');
    }
}
