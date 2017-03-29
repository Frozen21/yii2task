<?php

use yii\db\Migration;

/**
 * Handles the creation of table `task`.
 */
class m170328_115445_create_task_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('task',
            [
                'id' => $this->primaryKey()->notNull(),
                'tasklist_id' => $this->Integer()->notNull(),
                'text' => $this->string()->notNull(),
                'created_at' => $this->timestamp(),
                'rate' => $this->Integer(),
            ]);
        $this->addForeignKey('task_tasklist_id', 'task', 'tasklist_id', 'tasklist', 'id', 'cascade', 'cascade');
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropForeignKey('task_tasklist_id', 'task');
        $this->dropTable('task');
    }
}
