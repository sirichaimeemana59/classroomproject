<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class register_courses extends Model
{
    protected $primaryKey = 'id_courses';
    protected $table = 'register_courses';
    protected $fillable = ['id_subject,user_create,user_approve,status,code_subject'];
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

    public function join_subjects_transection ()
    {
        return $this->hasMany('App\subjects_transection','id_subject','code_subject');
    }

    public function join_subject_name ()
    {
        return $this->hasOne('App\subject','code_subject','code_subject');
    }
}
