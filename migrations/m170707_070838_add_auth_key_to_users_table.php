<?php

use yii\db\Migration;

class m170707_070838_add_auth_key_to_users_table extends Migration
{
    public function safeUp()
    {
        $this->addColumn('user', 'auth_key', 'string UNIQUE');
    }

    public function safeDown()
    {
        $this->dropColumn('user', 'auth_key');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170707_070838_add_auth_key_to_users_table cannot be reverted.\n";

        return false;
    }
    */
}
