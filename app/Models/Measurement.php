<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Measurement extends Model
{
    use HasFactory;

    protected $table = 'measurements';

    protected $fillable = [
        'client_id',
        'epaule', 'taille_t', 'taille_b', 'dos', 'bassin_t', 'bassin_b', 'poitrine', 'fesse', 'cuisses', 'l_taille', 'longueur', 'l_total', 'fond', 'braquette', 'l_manche', 'pied', 't_manche', 'col', 'nb_poches_t', 'nb_poches_b', 'cv', 'cd'
    ];

    function client()
    {
        return $this->belongsTo(App\Models\Client::class);
    }
}
