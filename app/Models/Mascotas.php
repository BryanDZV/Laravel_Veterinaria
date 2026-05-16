<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Mascotas extends Model
{
    use HasFactory;


    protected $fillable = ['nombre', 'chip', 'telefono_dueno', 'tipo'];
    public function citas(): HasMany
    {
        return $this->hasMany(Citas::class, 'mascota_id');
    }
}
