<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facturas extends Model
{
    use HasFactory;
    protected $fillable = ['cita_id', 'fecha', 'importe'];

    public function cita()
    {
        return $this->belongsTo(Citas::class);
    }
}
