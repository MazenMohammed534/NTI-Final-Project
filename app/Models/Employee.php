<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $table = 'employee';
    protected $primaryKey = 'employee_id';
    public $timestamps = false;

    protected $fillable = [
        'full_name',
        'position',
        'email',
        'phone',
        'hire_date',
    ];
} 