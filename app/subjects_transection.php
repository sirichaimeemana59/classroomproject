<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class subjects_transection extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'subjects_transection';
    protected $fillable = ['id_subject,user_create,time_start,time_stop,day'];
    public $timestamps = true;

    public function join_subjects ()
    {
        return $this->hasOne('App\subject','code_subject','id_subject');
    }
}
