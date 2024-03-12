<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicule extends Model
{
    use HasFactory;

    protected $fillable = [
        'marque',
        'modele',
        'date',
        'kilometrage',
        'statut',
        'nbre_de_place',
        'image',
        'categorie',
        'chauffeur_id',
        'prix_par_heure',
    ];
 

    public function conducteur()
    {
        return $this->belongsTo(Chauffeur::class);
    }

    public function locations()
    {
        return $this->hasMany(Location::class);
    }

    public function calculerPrixLocation($dureeEnHeures)
    {
        $prixTotal = $dureeEnHeures * $this->prix_par_heure;

        return $prixTotal;
    }
}
