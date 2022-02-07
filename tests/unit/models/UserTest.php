<?php

declare(strict_types=1);

namespace tests\unit\models;

//use Micro\fixtures\UserFixture;
use Micro\models\user\User;

class UserTest extends \Codeception\Test\Unit
{
    /**
     * @var \tests\UnitTester
     */
    protected $tester;

    /*
    public function _before()
    {
        $this->tester->haveFixtures([
            'user' => [
                'class' => UserFixture::class,
                'dataFile' => codecept_data_dir() . '/models/user/user.php'
            ]
        ]);
    }
*/

    public function testSum(): void
    {
        expect_that($model = new User());

        $this->tester->assertEquals($model->sum(1, 3), 4, 'Checking 3+1=4');
        //expect($model->sum(1, 3))->equals(4);

        //expect_not($model->sum(1, 3) == 5);
        $this->tester->assertNotEquals($model->sum(1, 3), 5, 'Checking 3+1!=5');

        //expect_not($model);
    }
}
