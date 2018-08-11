<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cform extends Model
{
    
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cformname',
        'htmlelements',
        'cshortcode',
        'cstatus',
        'cispublic'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        
        'deleted_at'
    ];


}
