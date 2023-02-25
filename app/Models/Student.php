<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Student extends Authenticatable implements HasMedia
{
    use HasFactory, InteractsWithMedia, SoftDeletes, Notifiable;

    protected $fillable = [
        'name',
        'nis',
        'address',
        'gender',
        'no_telp',
        'email',
        'password',
        'class_id',
        'point'
    ];

    protected $guard = 'student';

    protected $hidden = [
        'password',
    ];

    public function setPasswordAttribute($value){
        $this->attributes['password'] = bcrypt($value);
    }

    public function class()
    {
        return $this->belongsTo(ClassRoom::class);
    }

    public function reports()
    {
        return $this->belongsToMany(Report::class, 'student_report', 'student_id', 'report_id');
    }
}
