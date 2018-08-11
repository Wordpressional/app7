<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Illuminate\Database\Eloquent\SoftDeletes;

class Form extends Model
{
    
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'formname',
        'htmlcontent',
        'shortcode',
        'status',
        'ispublic'
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
