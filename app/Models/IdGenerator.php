<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IdGenerator extends Model
{
    protected $table = 'id_generators';

    protected $fillable = [
        'prefix',
        'index',
        'length',
        'remark',
        'created_at',
        'updated_at'
    ];

    use HasFactory;
}
