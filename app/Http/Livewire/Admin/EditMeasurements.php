<?php

namespace App\Http\Livewire\Admin;

use App\Models\Client;
use App\Models\Measurement;
use Livewire\Component;

class EditMeasurements extends Component
{
    public $measurement_id;
    public $client_id;
    public $clients;
    public $epaule, $taille_t, $taille_b, $dos, $bassin_t, $bassin_b, $poitrine, $fesse, $cuisses, $l_taille, $longueur, $l_total, $fond, $braquette, $l_manche, $pied, $t_manche, $col, $nb_poches_t, $nb_poches_b, $cv, $cd;

    function mount($measurement_id)
    {
        
        $this->measurement_id = $measurement_id;
        $measurement = Measurement::find($measurement_id);
 
        $this->clients = Client::all();

        $this->client_id = $measurement->client_id;
        $this->epaule = $measurement->epaule;
        $this->taille_t = $measurement->taille_t;
        $this->taille_b = $measurement->taille_b;
        $this->dos = $measurement->dos;
        $this->bassin_t = $measurement->bassin_t;
        $this->bassin_b = $measurement->bassin_b;
        $this->poitrine = $measurement->poitrine;
        $this->fesse = $measurement->fesse;
        $this->cuisses = $measurement->cuisses;
        $this->l_taille = $measurement->l_taille;
        $this->longueur = $measurement->longueur;
        $this->l_total = $measurement->l_total;
        $this->fond = $measurement->fond;
        $this->braquette = $measurement->braquette;
        $this->l_manche = $measurement->l_manche;
        $this->pied = $measurement->pied;
        $this->t_manche = $measurement->t_manche;
        $this->col = $measurement->col;
        $this->nb_poches_t = $measurement->nb_poches_t;
        $this->nb_poches_b = $measurement->nb_poches_b;
        $this->cv = $measurement->cv;
        $this->cd = $measurement->cd;
    }

    public function render(Client $client)
    {
        return view('livewire.admin.edit-measurements', ['client' => $client])->extends('base');
    }

    function update()
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

        $record = Measurement::find($this->measurement_id);
        // dd($record);
        
        $record->client_id = $this->client_id;
        $record->epaule = $this->epaule;
        $record->taille_t = $this->taille_t;
        $record->taille_b = $this->taille_b;
        $record->dos = $this->dos;
        $record->bassin_t = $this->bassin_t;
        $record->bassin_b = $this->bassin_b;
        $record->poitrine = $this->poitrine;
        $record->fesse = $this->fesse;
        $record->cuisses = $this->cuisses;
        $record->l_taille = $this->l_taille;
        $record->longueur = $this->longueur;
        $record->l_total = $this->l_total;
        $record->fond = $this->fond;
        $record->braquette = $this->braquette;
        $record->l_manche = $this->l_manche;
        $record->pied = $this->pied;
        $record->t_manche = $this->t_manche;
        $record->col = $this->col;
        $record->nb_poches_t = $this->nb_poches_t;
        $record->nb_poches_b = $this->nb_poches_b;
        $record->cv = $this->cv;
        $record->cd = $this->cd;
        $record->save();

        notyf()
            ->position('x', 'center')
            ->position('y', 'top')
            ->addSuccess("Measurements updated successfully!");

            return redirect('admin/measurement/' . $record->id);
    }
}