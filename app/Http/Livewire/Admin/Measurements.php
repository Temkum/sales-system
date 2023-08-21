<?php

namespace App\Http\Livewire\Admin;

use App\Models\Client;
use App\Models\Measurement;
use Livewire\Component;

class Measurements extends Component
{
    public $epaule, $taille_t, $taille_b, $dos, $bassin_t, $bassin_b, $poitrine, $fesse, $cuisses, $l_taille, $longueur, $l_total, $fond, $braquette, $l_manche, $pied, $t_manche, $col, $nb_poches_t, $nb_poches_b, $cv, $cd;

    public $client_id = null;

    function mount()
    {
        $clients = Client::all();
    }

    public function render()
    {
        $clients = Client::all();
        return view('livewire.admin.measurements', ['clients' => $clients])->extends('base');
    }

    function save()
    {
        $this->validate([
            'client_id'    => 'required',
            'epaule' => 'required',
            'taille_t' => 'required',
            'taille_b' => 'required',
            'dos' => 'required',
            'bassin_t' => 'required',
            'bassin_b' => 'required',
            'poitrine' => 'required',
            'fesse' => 'required',
            'cuisses' => 'required',
            'l_taille' => 'required',
            'longueur' => 'required',
            'l_total' => 'required',
            'fond' => 'required',
            'braquette' => 'required',
            'l_manche' => 'required',
            'pied' => 'required',
            't_manche' => 'required',
            'col' => 'required',
            'nb_poches_t' => 'required',
            'nb_poches_b' => 'required',
            'cv' => 'required',
            'cd' => 'required'
        ]);

        Measurement::create([
            'client_id' => $this->client_id,
            'epaule' => $this->epaule,
            'taille_t' => $this->taille_t,
            'taille_b' => $this->taille_b,
            'dos' => $this->dos,
            'bassin_t' => $this->bassin_t,
            'bassin_b' => $this->bassin_b,
            'poitrine' => $this->poitrine,
            'fesse' => $this->fesse,
            'cuisses' => $this->cuisses,
            'l_taille' => $this->l_taille,
            'longueur' => $this->longueur,
            'l_total' => $this->l_total,
            'fond' => $this->fond,
            'braquette' => $this->braquette,
            'l_manche' => $this->l_manche,
            'pied' => $this->pied,
            't_manche' => $this->t_manche,
            'col' => $this->col,
            'nb_poches_t' => $this->nb_poches_t,
            'nb_poches_b' => $this->nb_poches_b,
            'cv' => $this->cv,
            'cd' => $this->cd,
        ]);

        $this->client_id = '';
        notyf()
            ->position('x', 'center')
            ->position('y', 'top')
            ->addSuccess("Measurements added successfully!");
    }
}
