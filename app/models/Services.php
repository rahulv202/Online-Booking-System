<?php

namespace App\Models;

use App\Core\Model;

class Services extends Model
{
    protected $table = 'services';
    private static $instance_obj;
    public static function getInstance()
    {
        if (self::$instance_obj === null) {
            self::$instance_obj = new self();
        }
        return self::$instance_obj;
    }
}
