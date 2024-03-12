<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permis extends Model
{
    use HasFactory;

    protected $fillable = [
        'numero',
        'categorie',
        'dateObtention',
        'dateExpiration',
        'restriction',
    ];

    // Méthode de validation pour assurer l'unicité du permis
    public static function boot()
    {
        parent::boot();

        static::saving(function ($model) {
            if (self::where('numero', $model->numero)
                     ->where('categorie', $model->categorie)
                     ->where('dateObtention', $model->dateObtention)
                     ->where('dateExpiration', $model->dateExpiration)
                     ->exists()) {
                throw new \Exception('Ce permis existe déjà.');
            }
        });
    }
}
