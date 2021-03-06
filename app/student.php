<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class student extends Model
{
    protected $primaryKey = 'id_student';
    protected $table = 'student';
    protected $fillable = ['name_student,lastname_student,brithdate,tell,address,photo,email'];
    public $timestamps = true;

    public function join_user ()
    {
        return $this->hasOne('App\User','code','code');
    }
}
