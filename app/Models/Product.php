<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Event;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'price', 'materials', 'weight', 'description'];

    public function event() {
        return $this->belongsTo(Event::class);
    }
}
