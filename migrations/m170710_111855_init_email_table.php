<?php

use yii\db\Migration;

class m170710_111855_init_email_table extends Migration
{
    public function safeUp()
    {
        $this->createTable(
            'email',
            [
                'id' => 'pk',
                'purpose' => 'string',
                'address' => 'string',
                'customer_id' => 'int not null',
            ]
        );
        $this->addForeignKey('customer_email', 'email', 'customer_id', 'customer', 'id');
    }

    public function safeDown()
    {
        $this->dropForeignKey('customer_email', 'email');
        $this->dropTable('email');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170710_111855_init_email_table cannot be reverted.\n";

        return false;
    }
    */
}
