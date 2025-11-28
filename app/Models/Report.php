<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Report extends Model
{
    use HasFactory;

    protected $table = 'reports';

    protected $fillable = [
        'title',
        'filters',
        'file_path',
        'file_type',
        'record_count',
        'user_id',
        'generated_at',
        'expires_at',
        'status',
    ];

    protected $casts = [
        'filters' => 'array',
        'generated_at' => 'datetime',
        'expires_at' => 'datetime',
    ];
}