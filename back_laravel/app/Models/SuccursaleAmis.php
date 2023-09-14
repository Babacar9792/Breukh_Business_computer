<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SuccursaleAmis extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'succursale_id',
        'ami_id'
    ];
}
