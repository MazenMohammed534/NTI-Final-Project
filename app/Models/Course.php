<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $table = 'courses';
    protected $primaryKey = 'course_id';
    public $timestamps = false;

    protected $fillable = [
        'name',
        'department_id',
        'teacher_id',
    ];

    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id', 'department_id');
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'teacher_id', 'teacher_id');
    }

    public function students()
    {
        return $this->belongsToMany(Student::class, 'student_course', 'course_id', 'student_id')->withPivot('enrollment_date');
    }
} 