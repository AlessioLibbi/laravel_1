<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Event extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'date', 'price', 'city', 'address', 'description'];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
    public function user() {
        return $this->belongsTo(Event::class);
    }
    public function subscribers() {
        return $this->belongsToMany(User::class);
    }
}
