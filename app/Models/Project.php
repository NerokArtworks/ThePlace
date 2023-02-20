<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'titulo',
        'description',
        'fecha',
        'imagen',
        'user_id',
    ];

    public function own() {
        return $this->belongsTo(User::class);
    }

    public function saves() {
        return $this->belongsToMany(User::class, 'saved_projects');
    }
}
