<?php

declare(strict_types=1);

namespace Micro\models\user;

use Micro\override\BaseActiveRecord;

class User extends BaseActiveRecord
{
    /**
     * @return string the name of the table associated with this ActiveRecord class
     */
    public static function tableName(): string
    {
        return '{{%users}}';
    }

    /**
     * addition two number.
     */
    public function sum(int|float $a, int|float $b): int|float
    {
        return $a + $b;
    }
}
