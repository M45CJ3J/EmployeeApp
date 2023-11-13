<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $fillable = ['fname','lname','address','age','birth_date','hired_date','department_id','division','img_path'];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}
