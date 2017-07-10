<?php

use yii\db\Migration;

class m170710_102056_add_audit_fields_to_customer extends Migration
{
    public function safeUp()
    {
        $this->addColumn('customer', 'created_at', 'integer');
        $this->addColumn('customer', 'created_by', 'integer');
        $this->addColumn('customer', 'updated_at', 'integer');
        $this->addColumn('customer', 'updated_by', 'integer');

        $this->addForeignKey('customer_created_by', 'customer', 'created_by', 'user', 'id');
        $this->addForeignKey('customer_updated_by', 'customer', 'updated_by', 'user', 'id');
    }

    public function safeDown()
    {
        echo "m170710_102056_add_audit_fields_to_customer cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170710_102056_add_audit_fields_to_customer cannot be reverted.\n";

        return false;
    }
    */
}
