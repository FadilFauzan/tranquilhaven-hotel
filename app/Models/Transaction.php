<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;


    protected $guarded = ['id'];
    protected $with = ['category', 'author']; // Debug n+1 problem (eager load)

    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}
