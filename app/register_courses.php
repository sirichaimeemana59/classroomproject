<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class register_courses extends Model
{
    protected $primaryKey = 'id_courses';
    protected $table = 'register_courses';
    protected $fillable = ['id_subject,user_create,user_approve,status'];
    public $timestamps = true;

    public function join_teacher ()
    {
        return $this->hasOne('App\teacher','id_teacher','user_create');
    }

    public function join_subject ()
    {
        return $this->hasOne('App\subject','id_subject','id_subject');
    }

    public function join_student ()
    {
        return $this->hasOne('App\student','id_student','user_create');
    }
}
