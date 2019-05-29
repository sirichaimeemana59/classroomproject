<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class score_student extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'score_students';
    protected $fillable = ['score,id_teacher,id_student,code,id_ans,id_question,id_subject'];
    public $timestamps = true;
}
