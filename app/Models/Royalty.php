<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Royalty extends Model
{
    use HasFactory;
    protected $fillable = [
        'period',
        'unity',
        'sale',
        'profit',
        'royalty',
        'tax',
        'project_id'
    ];
}