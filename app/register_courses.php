<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class register_courses extends Model
{
    protected $primaryKey = 'id_courses';
    protected $table = 'register_courses';
    protected $fillable = ['id_subject,user_create,user_approve,status'];
    public $timestamps = true;
}
