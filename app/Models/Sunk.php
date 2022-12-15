<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sunk extends Model
{
    use HasFactory;
    protected $fillable = [
        'period',
        'unity',
        'hours',
        'quantity',
        'description',
        'total',
        'project_id'
    ];
}
