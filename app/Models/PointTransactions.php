<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PointTransactions extends Model
{
    use HasFactory;

    protected $table = 'tb_poin_fandi';
    protected $guarded = [];
}