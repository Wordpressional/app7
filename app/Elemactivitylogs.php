<?php
namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Elemactivitylog extends Eloquent {

    protected $connection = 'mongodb';
    protected $collection = 'elemactivitylogs';

}