<?php 
$I = new \Step\Acceptance\CRMUserManagementSteps($scenario);
$I->wantTo('check that login and logout work');

$I->amGoingTo('Register new User');

$I->amOnPage('/users/');
$I->amInListUsersUi();
$I->clickOnRegisterNewUserButton();
$I->seeIAmInAddUserUi();
$user = $I->imagineUser();
$I->fillUserDataForm($user);
$I->submitUserDataForm();

$I = new \Step\Acceptance\CRMUserSteps($scenario);
$I->amGoingTo('login');

$I->seeLink('login');
$I->click('login');
$I->seeIAmInLoginFormUi();
$I->fillLoginForm($user);
$I->submitLoginForm();

$I->seeIAmAtHomepage();
$I->dontSeeLink('login');
$I->seeUsername($user);
$I->seeLink('logout');

$I->amGoingTo('logout from arbitrary page');
$I->amInQueryCustomerUi();
$I->click('logout');

$I->seeIAmAtHomepage();
$I->dontSeeUsername($user);
$I->dontSeeLink('logout');
$I->seeLink('login');
