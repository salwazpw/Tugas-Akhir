<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Criteria extends Model
{
    use HasFactory;

    protected $table = 'criteria_masters';

    protected $fillable = [
        'criteria_code',
        'criteria_name',
        'criteria_type',
        'uom',
        'remark',
        'created_at',
        'updated_at',
    ];
}
