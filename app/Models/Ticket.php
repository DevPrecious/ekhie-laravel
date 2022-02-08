<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function event(){
        return $this->belongsTo(Event::class);
    }

    // public function orders(){
    //     return $this->belongsTo(Orders::class);
    // }
}
