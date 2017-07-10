<?php

use yii\db\Migration;

class m170710_110707_init_address_table extends Migration
{
    public function safeUp()
    {
        $this->createTable(
            'address',
            [
                'id' => 'pk',
                'purpose' => 'string',
                'country' => 'string',
                'state' => 'string',
                'city' => 'string',
                'street' => 'string',
                'building' => 'string',
                'apartment' => 'string',
                'receiver_name' => 'string',
                'postal_code' => 'string',
                'customer_id' => 'int not null'
            ]
        );
        $this->addForeignKey('customer_address', 'address', 'customer_id', 'customer', 'id');
    }

    public function safeDown()
    {
        $this->dropForeignKey('customer_address', 'address');
        $this->dropTable('address');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170710_110707_init_address_table cannot be reverted.\n";

        return false;
    }
    */
}
