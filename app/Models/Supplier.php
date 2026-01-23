<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'name',
        'address',
        'logo',
        'contact_info',            // Stores the nested JSON (Persons + Numbers)
        'is_consignment_provider', // Boolean flag
        'default_term_days',       // Integer (e.g., 30, 60)
        'is_active',
    ];

    /**
     * The attributes that should be cast to native types.
     * This automates the JSON <-> Array conversion.
     */
    protected $casts = [
        'contact_info' => 'array',              // <--- The magic line for JSON
        'is_consignment_provider' => 'boolean',
        'is_active' => 'boolean',
        'default_term_days' => 'integer',
    ];
}