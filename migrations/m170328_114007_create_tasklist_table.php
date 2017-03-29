<?php

use yii\db\Migration;


/**
 * Handles the creation of table `tasklist`.
 */
class m170328_114007_create_tasklist_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable(
                'tasklist',
                [
                    'id' => $this->primaryKey()->notNull(),
                    'title' => $this->string()->notNull(),
                ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('tasklist');
    }
}
