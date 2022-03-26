<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'school_id', 'order'];
    protected $hidden   = ['school_id', 'created_at', 'updated_at', 'deleted_at'];

    public function school(){
        return $this->hasOne(School::class, 'id', 'school_id');
    }
}
