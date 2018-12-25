<?php
namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Elemuser extends Eloquent {

    protected $connection = 'mongodb';
    protected $collection = 'elemusers';

}