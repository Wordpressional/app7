<?php
namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Elemdist extends Eloquent {

    protected $connection = 'mongodb';
    protected $collection = 'elemdists';

}