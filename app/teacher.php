<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class teacher extends Model
{
    protected $primaryKey = 'id_teacher';
    protected $table = 'teacher';
    protected $fillable = ['name_teacher,lastname_teacher,brithdate,tell,address,photo'];
    public $timestamps = true;
}
