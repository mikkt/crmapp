<?php

use yii\db\Migration;

class m170707_091845_add_predefined_users extends Migration
{
    public function safeUp()
    {
        // Create predefined user
        $user = new \app\models\user\UserRecord();
        $username = 'JoeUser';
        $password = '7 wonder @ American soil';
        $user->attributes = compact('username', 'password');
        $user->save();

        // Create predefined manager
        $user = new \app\models\user\UserRecord();
        $username = 'AnnieManager';
        $password = 'Shiny 3 things hmm, vulnerable';
        $user->attributes = compact('username', 'password');
        $user->save();

        // Create predefined admin
        $user = new \app\models\user\UserRecord();
        $username = 'RobAdmin';
        $password = 'Imitate #14th syndrome of apathy';
        $user->attributes = compact('username', 'password');
        $user->save();
    }

    public function safeDown()
    {
        $this->delete('user', [
            'username' => ['JoeUser', 'AnnieManager', 'RobAdmin']
        ]);
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170707_091845_add_predefined_users cannot be reverted.\n";

        return false;
    }
    */
}
