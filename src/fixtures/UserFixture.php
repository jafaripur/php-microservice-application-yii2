<?php

namespace Micro\fixtures;

use Micro\override\BaseActiveFixture;

class UserFixture extends BaseActiveFixture
{
    public $modelClass = \Micro\models\user\User::class;
}
