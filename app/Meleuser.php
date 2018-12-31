<?php
namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Meleuser extends Eloquent {

    protected $connection = 'mongodb';
    protected $collection = 'meleusers';

}