<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $fillable = [
        'prenom',
        'nom',
        'age',
        'tel',
        'email',
        'adresse',
        'lieu_depart',
        'lieu_arrivee',
        'heure_debut',
        'heure_fin',
        'vehicule_id',
        'client_id',
        'prix_total',
        'validated',
        'distance',
    ];

    protected $casts = [
        'validated' => 'boolean',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function vehicule()
    {
        return $this->belongsTo(Vehicule::class, 'vehicule_id');
    }

    public function tarification()
    {
        return $this->hasOne(Tarification::class);
    }
}
