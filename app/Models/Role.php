<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = ['name', 'label'];

    // Relationship: A Role has many Permissions
    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }

    // Relationship: A Role belongs to many Users
    public function users()
    {
        return $this->hasMany(User::class);
    }
}