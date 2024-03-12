<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contrat extends Model
{
    use HasFactory;

    protected $fillable = [
        'numero',
        'dateDebut',
        'dateFin',
        'salaire',
        'chauffeur_id',
    ];

    public function chauffeur()
    {
        return $this->belongsTo(Chauffeur::class);
    }

    // Méthode de validation pour assurer l'unicité du contrat
    public static function boot()
    {
        parent::boot();

        static::saving(function ($model) {
            if (self::where('numero', $model->numero)
                     ->where('dateDebut', $model->dateDebut)
                     ->where('dateFin', $model->dateFin)
                     ->exists()) {
                throw new \Exception('Ce contrat existe déjà.');
            }
        });
    }
}
