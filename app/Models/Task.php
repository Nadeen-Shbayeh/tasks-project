<?php

namespace App\Models;
use App\Models\User;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'name',
        'description',
        'status',
        'end_date',
    ];

    protected $casts = [
        'status' => 'boolean',
        'end_date' => 'datetime',
    ];

  

    public function users()
    {
        return $this->belongsToMany(User::class);
    }


}