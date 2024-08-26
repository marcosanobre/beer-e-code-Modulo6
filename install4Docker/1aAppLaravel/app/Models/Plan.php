<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Plan extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'short_description',
        'price',
        'cod'
    ];

    public function signatures()
    {
        return $this->hasMany( Signature::class );
    }

    // Usando ATTRIBUTES para formatar dados

    protected function name(): Attribute
    {
        return Attribute::make(
           get: fn ($value) => ucfirst($value),
           set: fn ($value) => strtolower($value),
        );
    }

    protected function cod(): Attribute
    {
        return Attribute::make(
           get: fn ($value) => strtoupper($value),
           set: fn ($value) => strtolower($value),
        );
    }

    protected function fullname(): Attribute
    {
        return Attribute::make(
           get: fn ($value, $attributes) => $attributes['cod'].' - '.$attributes['name']
        );
    }

}
