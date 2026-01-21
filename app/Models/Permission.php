<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $fillable = ['name', 'label', 'group_name'];

    // Relationship: A Permission belongs to many Roles
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
}