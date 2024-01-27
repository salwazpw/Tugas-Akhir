<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TenderDetail extends Model
{
    protected $table = 'tender_details';

    protected $fillable = [
        'tender_id',
        'vendor_id',
        'score',
        'date',
        'status',
        'remark',
        'created_at',
        'updated_at'
    ];

    use HasFactory;
}
