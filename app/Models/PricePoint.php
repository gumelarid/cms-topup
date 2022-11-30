<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PricePoint extends Model
{
    use HasFactory;
    protected $keyType = "string";
    protected $primary = "id";
    protected $guarded = [];
}
