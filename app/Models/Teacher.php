<?php

namespace App\Models;

use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Teacher extends Authenticatable implements HasMedia
{
    use HasFactory, SoftDeletes, InteractsWithMedia, Notifiable;

    protected $guard = 'teacher';

    protected $fillable = [
        'name',
        'nip',
        'address',
        'gender',
        'no_telp',
        'email',
        'password',
        'class_id'
    ];

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
}
