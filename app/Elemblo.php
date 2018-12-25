<?php
namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Elemblo extends Eloquent {

    protected $connection = 'mongodb';
    protected $collection = 'elemblos';

}