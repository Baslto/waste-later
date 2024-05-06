<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use Notifiable;

    protected $guard = 'admin';
    public $timestamps = false;

    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
    ];

    protected $attributes = [
        'markt_id' => 1,
    ];

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }

}


