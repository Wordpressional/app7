<?php
namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Mycollection extends Eloquent {

    protected $connection = 'mongodb';
    protected $collection = 'mycollections';

}