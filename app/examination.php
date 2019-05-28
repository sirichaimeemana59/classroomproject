<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class examination extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'examination';
    protected $fillable = ['code,proposition_th,proposition_en,user_create,photo,id_subject,title_base_en,title_base_th'];
    public $timestamps = true;

    public function join_teacher ()
    {
        return $this->hasOne('App\teacher','id_teacher','user_create');
    }


    public function join_examination_transection ()
    {
        return $this->hasMany('App\examination_transection','code','code');
    }

    public function join_subject ()
    {
        return $this->hasOne('App\subject','id_subject','id_subject');
    }
}
