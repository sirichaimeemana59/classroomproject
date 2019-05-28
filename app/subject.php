<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class subject extends Model
{
    protected $primaryKey = 'id_subject';
    protected $table = 'subjects';
    protected $fillable = ['user_create,name_subject_th,name_subject_en,amount,time_start,time_stop,day,code_subject'];
    public $timestamps = true;

    public function join_teacher ()
    {
        return $this->hasOne('App\teacher','id_teacher','user_create');
    }

    public function join_subjects_transection ()
    {
        return $this->hasMany('App\subjects_transection','id_subject','code_subject');
    }

    public function join_examination ()
    {
        return $this->hasOne('App\examination','id_subject','id_subject');
    }
}
