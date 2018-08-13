<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Illuminate\Database\Eloquent\SoftDeletes;

class General extends Model
{
    protected $table;

   public function setTable($table)
    {
        $this->table = $table;
        return $this->table;
        //return $this->table;
    }


}
