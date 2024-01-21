<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    use HasFactory;

    protected $fillable = [
        'vendor_id',
        'vendor_name',
        'vendor_address',
        'remark',
        'created_at',
        'updated_at',
    ];
}
