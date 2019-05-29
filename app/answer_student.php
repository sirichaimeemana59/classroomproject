<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class answer_student extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'answer_student';
    protected $fillable = ['code,user_create,id_exm,id_ans,ans,id_subject'];
    public $timestamps = true;

    public function join_student ()
    {
        return $this->hasOne('App\student','id_student','user_create');
    }
}
