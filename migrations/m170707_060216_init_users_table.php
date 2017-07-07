<?php

use yii\db\Migration;

class m170707_060216_init_users_table extends Migration
{
    public function safeUp()
    {
        $this->createTable(
            'user',
            [
                'id' => 'pk',
                'username' => 'string UNIQUE',
                'password' => 'string'
            ]
        );
    }

    public function safeDown()
    {
        $this->dropTable('user');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170707_060216_init_users_table cannot be reverted.\n";

        return false;
    }
    */
}
