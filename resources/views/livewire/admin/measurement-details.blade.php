@extends('base')

@section('content')
  <div class="card">
    <div class="card-header d-flex justify-content-between">
      <h3 class="mb-0">{{ __('Measurement details') }}</h3>
      <a href="{{ route('measurements') }}" class="btn btn-outline-primary btn-sm">{{ __('Back') }}</a>
    </div>
    <div class="card-body">
      <div class="col-lg-5 col-md-6">
        <div class="mt-3">
          <div class="">
            <div class="mb-3 d-flex justify-content-between">
              <span><b>{{ $measurement->title }}</b></span>
              <a href="{{ route('measure.edit', ['measurement_id' => $measurement->id]) }}"
                class="btn btn-sm btn-info">{{ __('Edit') }}</a>
            </div>
            <table class="table table-sm table-responsive table-borderless border">
              <thead class="border-bottom">
                <th>Haut</th>
                <th>Bas</th>
              </thead>
              <tbody>
                <tr>
                  <td>Epaule {{ $measurement->epaule }}</td>
                  <td>Taille {{ $measurement->taille_b }}</td>
                </tr>
                <tr>
                  <td>Dos {{ $measurement->dos }}</td>
                  <td>Bassin {{ $measurement->bassin_b }}</td>
                </tr>
                <tr>
                  <td>Poitrine {{ $measurement->poitrin }}</td>
                  <td>Fesses {{ $measurement->fesse }}</td>
                </tr>
                <tr>
                  <td>Taille {{ $measurement->taille_t }}</td>
                  <td>Cuisses {{ $measurement->cuisses }}</td>
                </tr>
                <tr>
                  <td>L. Taille {{ $measurement->taille_t }}</td>
                  <td>Longueur {{ $measurement->longueur }}</td>
                </tr>
                <tr>
                  <td>L. Total {{ $measurement->l_total }}</td>
                  <td>Fond {{ $measurement->fond }}</td>
                </tr>
                <tr>
                  <td>Bassin {{ $measurement->bassin_t }}</td>
                  <td>Braquette {{ $measurement->braquette }}</td>
                </tr>
                <tr>
                  <td>L. Manche {{ $measurement->l_manche }}</td>
                  <td>Pied {{ $measurement->pied }}</td>
                </tr>
                <tr>
                  <td>T. Manche {{ $measurement->t_manche }}</td>
                  <td>Nombre de poches {{ $measurement->nb_poches_b }}</td>
                </tr>
                <tr>
                  <td>CV {{ $measurement->cv }}</td>
                  <td>CD {{ $measurement->cd }}</td>
                </tr>
                <tr>
                  <td>Col {{ $measurement->col }}</td>
                  <td></td>
                </tr>
                <tr>
                  <td>Nombre de poches {{ $measurement->nb_poches_t }}</td>
                  <td></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
