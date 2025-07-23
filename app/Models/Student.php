<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $table = 'student';
    protected $primaryKey = 'student_id';
    public $timestamps = false;

    protected $fillable = [
        'full_name',
        'email',
        'age',
        'gender',
        'department_id',
    ];

    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id', 'department_id');
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'student_course', 'student_id', 'course_id')->withPivot('enrollment_date');
    }
} 