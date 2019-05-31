<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class group_student extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'group_student';
    protected $fillable = ['id_subject,id_student,code'];
    public $timestamps = true;

    public function join_student ()
    {
        return $this->hasOne('App\student','id_student','id_student');
    }

    public function join_subject ()
    {
        return $this->hasOne('App\subject','id_subject','id_subject');
    }
}
