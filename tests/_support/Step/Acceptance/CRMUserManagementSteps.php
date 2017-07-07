<?php
namespace Step\Acceptance;

class CRMUserManagementSteps extends CRMGuestSteps
{
    public $username = 'RobAdmin';
    public $password = 'Imitate #14th syndrome of apathy';

    public function amInListUsersUi()
    {
        $I = $this;
        $I->seeCurrentUrlEquals('/users/');
    }

    public function clickOnRegisterNewUserButton()
    {
        $I = $this;
        $I->click('Create User Record');
    }

    public function seeIAmInAddUserUi()
    {
        $I = $this;
        $I->seeCurrentUrlEquals('/users/create');
    }

    public function imagineUser()
    {
        $faker = \Faker\Factory::create();
        return [
            'UserRecord[username]' => $faker->userName,
            'UserRecord[password]' => $faker->password
        ];
    }

    public function fillUserDataForm($fieldsData)
    {
        $I = $this;
        foreach ($fieldsData as $key => $value)
        {
            $I->fillField($key, $value);
        }
    }

    public function submitUserDataForm()
    {
        $I = $this;
        $I->click('Create');
    }
}