<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%car_advanced_image}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%car_advanced}}`
 * - `{{%file}}`
 */
class m231210_215649_create_car_advanced_image_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%car_advanced_image}}', [
            'id' => $this->primaryKey(),
            'car_advanced_id' => $this->integer()->notNull(),
            'file_id' => $this->integer()->notNull(),
        ]);

        // creates index for column `car_advanced_id`
        $this->createIndex(
            '{{%idx-car_advanced_image-car_advanced_id}}',
            '{{%car_advanced_image}}',
            'car_advanced_id'
        );

        // add foreign key for table `{{%car_advanced}}`
        $this->addForeignKey(
            '{{%fk-car_advanced_image-car_advanced_id}}',
            '{{%car_advanced_image}}',
            'car_advanced_id',
            '{{%car_advanced}}',
            'id',
            'CASCADE'
        );

        // creates index for column `file_id`
        $this->createIndex(
            '{{%idx-car_advanced_image-file_id}}',
            '{{%car_advanced_image}}',
            'file_id'
        );

        // add foreign key for table `{{%file}}`
        $this->addForeignKey(
            '{{%fk-car_advanced_image-file_id}}',
            '{{%car_advanced_image}}',
            'file_id',
            '{{%file}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%car_advanced}}`
        $this->dropForeignKey(
            '{{%fk-car_advanced_image-car_advanced_id}}',
            '{{%car_advanced_image}}'
        );

        // drops index for column `car_advanced_id`
        $this->dropIndex(
            '{{%idx-car_advanced_image-car_advanced_id}}',
            '{{%car_advanced_image}}'
        );

        // drops foreign key for table `{{%file}}`
        $this->dropForeignKey(
            '{{%fk-car_advanced_image-file_id}}',
            '{{%car_advanced_image}}'
        );

        // drops index for column `file_id`
        $this->dropIndex(
            '{{%idx-car_advanced_image-file_id}}',
            '{{%car_advanced_image}}'
        );

        $this->dropTable('{{%car_advanced_image}}');
    }
}
