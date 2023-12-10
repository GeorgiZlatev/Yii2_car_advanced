<?php

use yii\db\Migration;

/**
 * Class m231210_221420_alter_date_volumns_in_project_table
 */
class m231210_221420_alter_date_volumns_in_project_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn('car_advanced', 'start_date', 'date');
        $this->alterColumn('car_advanced', 'end_date', 'date');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->alterColumn('car_advanced', 'start_date', 'integer');
        $this->alterColumn('car_advanced', 'end_date', 'integer');
    }

}
