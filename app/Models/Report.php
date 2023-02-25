<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Report extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'violation_id',
        'teacher_id',
    ];

    public function violation()
    {
        return $this->belongsTo(Violation::class);
    }

    public function students()
    {
        return $this->belongsToMany(Student::class, 'student_report', 'report_id', 'student_id');
    }
}
