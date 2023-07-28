<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleApartment extends Model
{
    use HasFactory;

    protected $fillable=[
        'name',
        'micro_district_id',
        'orient_id',
        'price',
        'num_rooms',
        'type',
        'description',
        'phone',
        'telegram',
      ];
}
