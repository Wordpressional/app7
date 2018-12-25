<?php
namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Elemac extends Eloquent {

    protected $connection = 'mongodb';
    protected $collection = 'elemacs';

}