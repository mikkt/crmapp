<?php

use yii\db\Migration;

class m170707_100355_insert_role_hierarchy extends Migration
{
    public function safeUp()
    {
        $rbac = \Yii::$app->authManager;

        $guest = $rbac->createRole('guest');
        $guest->description = 'Nobody';
        $rbac->add($guest);

        $user = $rbac->createRole('user');
        $user->description = 'Can use the query UI and nothing else';
        $rbac->add($user);

        $manager = $rbac->createRole('manager');
        $manager->description = 'Can manage entities in database, but not users';
        $rbac->add($manager);

        $admin = $rbac->createRole('admin');
        $admin->description = 'Can do anything including managing users';
        $rbac->add($admin);

        $rbac->addChild($admin, $manager);
        $rbac->addChild($manager, $user);
        $rbac->addChild($user, $guest);

        $rbac->assign($user,  \app\models\user\UserRecord::findOne(['username' => 'JoeUser'])->id);
        $rbac->assign($manager, \app\models\user\UserRecord::findOne(['username' => 'AnnieManager'])->id);
        $rbac->assign($admin, \app\models\user\UserRecord::findOne(['username' => 'RobAdmin'])->id);
    }

    public function safeDown()
    {
        $manager = \Yii::$app->authManager;
        $manager->removeAll();
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170707_100355_insert_role_hierarchy cannot be reverted.\n";

        return false;
    }
    */
}
