<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $table = 'teacher';
    protected $primaryKey = 'teacher_id';
    public $timestamps = false;

    protected $fillable = [
        'full_name',
        'email',
        'phone',
        'department_id',
    ];

    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id', 'department_id');
    }

    public function courses()
    {
        return $this->hasMany(Course::class, 'teacher_id', 'teacher_id');
    }
} 