<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class examination_transection extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'examination_transection';
    protected $fillable = ['code,proposition_th,choice_th,choice_en,status'];
    public $timestamps = true;

}
