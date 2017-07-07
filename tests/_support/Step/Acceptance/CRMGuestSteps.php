<?php
namespace Step\Acceptance;

class CRMGuestSteps extends \AcceptanceTester
{
    public $username;
    public $password;

    public function __construct($scenario)
    {
        parent::__construct($scenario);

        if ($this->username and $this->password)
            $this->login($this->username, $this->password);
    }

    function login($username, $password)
    {
        $I = $this;
        $I->amOnPage('/site/login');
        $I->fillField('LoginForm[username]', $username);
        $I->fillField('LoginForm[password]', $password);
        $I->click('Login');
        sleep(1);
        $I->seeCurrentUrlEquals('/');
    }

    function logout()
    {
        $I = $this;
        $I->amOnPage('/');
        $I->click('logout');
    }

    public function seeIAmInLoginFormUi()
    {
        $I = $this;
        $I->seeCurrentUrlEquals('/site/login');
    }

    public function fillLoginForm($user)
    {
        $I = $this;
        $I->fillField('LoginForm[username]', $user['UserRecord[username]']);
        $I->fillField('LoginForm[password]', $user['UserRecord[password]']);
    }

    public function submitLoginForm()
    {
        $I = $this;
        $I->click('button[type=submit]');
        sleep(1);
    }

    public function seeIAmAtHomepage()
    {
        $I = $this;
        $I->seeCurrentUrlEquals('/');
    }

    public function seeUsername($user)
    {
        $I = $this;
        $I->see($user['UserRecord[username]']);
    }

    public function dontSeeUsername($user)
    {
        $I = $this;
        $I->dontSee($user['UserRecord[username]']);
    }
}