<?php

namespace App\Models;

use App\Core\Model;


class Users extends Model
{
    protected $table = 'users';
    private static $instance_obj;
    public static function getInstance()
    {
        if (self::$instance_obj === null) {
            self::$instance_obj = new self();
        }
        return self::$instance_obj;
    }
}
