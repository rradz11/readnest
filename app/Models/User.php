<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $fillable = ['name', 'email', 'password', 'role_id'];

    // Relasi: Pengguna memiliki satu peran
    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class);
    }

    // Relasi: Pengguna bisa menjadi satu penulis
    public function author(): HasOne
    {
        return $this->hasOne(Author::class);
    }
}
