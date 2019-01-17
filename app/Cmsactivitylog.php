<?php
namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Cmsactivitylog extends Eloquent {

    protected $connection = 'mongodb';
    protected $collection = 'cmsactivitylogs';

}