<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    protected $table = 'testimonials';

    protected $fillable = [
        'brand_name',
        'client_name',
        'client_position',
        'message',
        'photo'
    ];
}
