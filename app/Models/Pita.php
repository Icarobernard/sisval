<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pita extends Model
{
    use HasFactory;

    protected $fillable = [
        'maintenance',
        'tax',
        'period',
        'npt',
        'contribution',
        'volume',
        'investment',
        'project_id',
        'concession',
        'pmargem',
        'pvolume',
        'pinvestimento'
    ];
}