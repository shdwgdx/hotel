<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DateBooked extends Model
{
    use HasFactory;
    protected $table = 'date_booked';
    protected $guarded = [];
}