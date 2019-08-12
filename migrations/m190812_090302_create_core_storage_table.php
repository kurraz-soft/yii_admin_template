<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%core_storage}}`.
 */
class m190812_090302_create_core_storage_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%core_storage}}', [
            'id' => $this->primaryKey(),
            'key' => $this->string(255)->unique(),
            'value' => $this->text(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%core_storage}}');
    }
}
