<?php
namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Elempart extends Eloquent {

    protected $connection = 'mongodb';
    protected $collection = 'elemparts';

}