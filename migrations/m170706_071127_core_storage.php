<?php

use yii\db\Migration;

class m170706_071127_core_storage extends Migration
{
    public function up()
    {
        $this->createTable('core_storage',[
            'key' => $this->string()->unique(),
            'value' => $this->string(255),
        ]);
    }

    public function down()
    {
        $this->dropTable('core_storage');

        return true;
    }
}
