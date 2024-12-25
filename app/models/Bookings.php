<?php

namespace App\Models;

use App\Core\Model;

class Bookings extends Model
{
    protected $table = 'bookings';
    private static $instance_obj;

    public static function getInstance()
    {
        if (self::$instance_obj === null) {
            self::$instance_obj = new self();
        }
        return self::$instance_obj;
    }
}
