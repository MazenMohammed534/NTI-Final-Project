<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $table = 'department';
    protected $primaryKey = 'department_id';
    public $timestamps = false;

    protected $fillable = [
        'name',
    ];

    public function students()
    {
        return $this->hasMany(Student::class, 'department_id', 'department_id');
    }

    public function teachers()
    {
        return $this->hasMany(Teacher::class, 'department_id', 'department_id');
    }

    public function courses()
    {
        return $this->hasMany(Course::class, 'department_id', 'department_id');
    }
} 