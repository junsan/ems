<?php

namespace App\Models;

use App\Models\City;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class State extends Model
{
    use HasFactory;

    protected $fillable = ['country_id', 'name'];

    public function country() {
        return $this->belongsTo(Country::class, 'country_id');
    }

    public function cities() {
        return $this->hasMany(City::class, 'state_id');
    }
}
