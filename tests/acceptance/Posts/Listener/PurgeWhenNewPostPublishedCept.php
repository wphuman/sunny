<?php

declare(strict_types=1);

use TypistTech\Sunny\AcceptanceTester;

$I = new AcceptanceTester($scenario);
$I->wantToTest('purge initiated when new post published');

$I->loginAsAdmin();
$I->amOnAdminPage('post-new.php');

$I->amGoingTo('publish a new post');
$I->fillField('post_title', 'Foo');
$I->click('#publish');

$I->wantToTest('purge initiated notice shows with post type of `Post`');
$I->see('Sunny: Purge initiated.');
$I->see('Reason: Post');
