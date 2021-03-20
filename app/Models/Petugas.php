<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
class Petugas extends Authenticatable
{
    use HasFactory,Notifiable,SoftDeletes;
    protected $table = 'petugas';
    protected $guard = 'petugas';
    protected $guarded = [];
    public function petugas()
    {
        return $this->hasMany(Petugas::class, 'id_petugas', 'id');
    }
}

