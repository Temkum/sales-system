<?php

namespace App\Http\Livewire\Admin;

use App\Models\Client;
use App\Models\Measurement;
use Livewire\Component;

class AddMeasurement extends Component
{
    public $client_id, $title;
    public $epaule, $taille_t, $taille_b, $dos, $bassin_t, $bassin_b, $poitrine, $fesse, $cuisses, $l_taille, $longueur, $l_total, $fond, $braquette, $l_manche, $pied, $t_manche, $col, $nb_poches_t, $nb_poches_b, $cv, $cd;

    public function render()
    {
        $clients = Client::all();
        return view('livewire.admin.add-measurement', ['clients' => $clients])->extends('base');
    }

    function mount()
    {
        $clients = Client::all();
    }

    function save()
    {
        $this->validate([
            'title' => 'required',
            'client_id' => 'required',
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
            'title' => $this->title,
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

        $this->resetFields();

        notyf()->addSuccess(__("Measurements added successfully!"));
    }

    function resetFields(): void
    {
        $this->title = '';
        $this->client_id = '';
        $this->epaule = '';
        $this->taille_t = '';
        $this->taille_b = '';
        $this->dos = '';
        $this->bassin_t = '';
        $this->bassin_b = '';
        $this->poitrine = '';
        $this->fesse = '';
        $this->cuisses = '';
        $this->l_taille = '';
        $this->longueur = '';
        $this->l_total = '';
        $this->fond = '';
        $this->braquette = '';
        $this->l_manche = '';
        $this->pied = '';
        $this->t_manche = '';
        $this->col = '';
        $this->nb_poches_t = '';
        $this->nb_poches_b = '';
        $this->cv = '';
        $this->cd = '';
    }
}
