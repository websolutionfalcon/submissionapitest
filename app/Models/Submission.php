<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Submission extends Model
{
    use HasFactory;

    protected $table = 'submissions';

    protected $fillable = [
        'name',
        'email',
        'message',
    ];

    public $timestamps = [
        'created_at',
        'updated_at',
    ];
}
