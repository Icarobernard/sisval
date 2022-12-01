<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fcd extends Model
{
    use HasFactory;
    protected $fillable = [
        'period',
        'unity',
        'sale',
        'tir',
        'payback',
        'tma',
        'rate',
        'project_id'
    ];
}