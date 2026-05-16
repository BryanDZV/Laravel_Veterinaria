<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Citas extends Model
{
    use HasFactory;

    protected $fillable = ['fecha', 'hora', 'veterinario_id', 'mascota_id'];

    public function veterinario(): BelongsTo
    {
        return $this->belongsTo(User::class, 'veterinario_id');
    }
    public function mascota(): BelongsTo
    {
        return $this->belongsTo(Mascotas::class, 'mascota_id');
    }

    public function factura(): HasOne
    {
        return $this->hasOne(Facturas::class);
    }
}
