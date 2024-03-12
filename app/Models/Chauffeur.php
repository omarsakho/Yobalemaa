<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chauffeur extends Model
{
    use HasFactory;

    protected $fillable = [
        'prenom',
        'nom',
        'experience',
        'permis_id',
    ];

    public function contrat()
    {
        return $this->hasOne(Contrat::class);
    }

    public function permis()
    {
        return $this->belongsTo(Permis::class);
    }

    public function voitures()
    {
        return $this->hasMany(Vehicule::class);
    }

    public static function boot()
    {
        parent::boot();

        static::saving(function ($model) {

            // Vérifier si le permis est unique pour ce chauffeur
            if (self::where('permis_id', $model->permis_id)->exists()) {
                throw new \Exception('Ce permis est déjà utilisé par un autre chauffeur.');
            }
        });
    }
}
