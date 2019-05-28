<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Summernote extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'summernotes';
    protected $fillable = ['content,id_subject'];
    public $timestamps = true;
}
