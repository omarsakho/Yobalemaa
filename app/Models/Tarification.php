<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarification extends Model
{
    use HasFactory;

    protected $fillable = [
        'numero',
        'prix',
        'date_paiement',
        'moyen_paiement',
        'location_id'
    ];

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function generateInvoice()
    {
        // Logique de génération de facture
    }

    protected static function boot()
    {
        parent::boot();

        static::saving(function ($tarification) {
            if ($tarification->id) {
                return;
            }

            if (Tarification::where('location_id', $tarification->location_id)->exists()) {
                throw new \Exception('Une tarification existe déjà pour cette location.');
            }
        });
    }

}
