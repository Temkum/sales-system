<div>
  <div class="mb-3">
    <label for="html3-text-input" class="form-label">{{ __('Measurements') }}</label>
    <table class="table table-sm table-borderless">
      <thead>
        <th class="center-text">Haut</th>
        <th class="center-text">Bas</th>
      </thead>
      <tbody>
        <form wire:submit.prevent="save">
          @csrf
          <tr>
            <td>
              <div class="input-group input-group-sm">
                <span class="input-group-text sm">{{ __('Epaule') }}</span>
                <input type="text" class="form-control form-control-sm" aria-label="Epaule" wire:model="epaule" />
              </div>
              @error('epaule')
                <span class="text-danger error">{{ __('This field is required') }}</span>
              @enderror
            </td>
            <td>
              <div class="input-group input-group-sm">
                <span class="input-group-text sm">{{ __('Taille') }}</span>
                <input type="text" class="form-control form-control-sm" aria-label="Taille" wire:model="taille_b" />
              </div>
              @error('taille_b')
                <span class="text-danger error">{{ __('This field is required') }}</span>
              @enderror
            </td>
          </tr>
          <tr>
            <td>
              <div class="input-group input-group-sm">
                <span class="input-group-text sm">{{ __('Dos') }}</span>
                <input type="text" class="form-control form-control-sm" aria-label="Dos" wire:model="dos" />
              </div>
              @error('dos')
                <span class="text-danger error">{{ __('This field is required') }}</span>
              @enderror
            </td>
            <td>
              <div class="input-group input-group-sm">
                <span class="input-group-text sm">{{ __('Bassin') }}</span>
                <input type="text" class="form-control form-control-sm" aria-label="Bassin" wire:model="bassin_b" />
              </div>
              @error('bassin_b')
                <span class="text-danger error">{{ __('This field is required') }}</span>
              @enderror
            </td>
          </tr>
          <tr>
            <td>
              <div class="input-group input-group-sm">
                <span class="input-group-text sm">{{ __('Poitrin') }}</span>
                <input type="text" class="form-control form-control-sm" aria-label="Poitrin" wire:model="poitrine" />
              </div>
              @error('poitrine')
                <span class="text-danger error">{{ __('This field is required') }}</span>
              @enderror
            </td>
            <td>
              <div class="input-group input-group-sm">
                <span class="input-group-text sm">{{ __('Fesse') }}</span>
                <input type="text" class="form-control form-control-sm" aria-label="Fesse" wire:model="fesse" />
              </div>
              @error('fesse')
                <span class="text-danger error">{{ __('This field is required') }}</span>
              @enderror
            </td>
          </tr>
          <tr>
            <td>
              <div class="input-group input-group-sm">
                <span class="input-group-text sm">{{ __('Taille') }}</span>
                <input type="text" class="form-control form-control-sm" aria-label="Taille" wire:model="taille_t" />
              </div>
              @error('taille_t')
                <span class="text-danger error">{{ __('This field is required') }}</span>
              @enderror
            </td>
            <td>
              <div class="input-group input-group-sm">
                <span class="input-group-text sm">{{ __('Cuisses') }}</span>
                <input type="text" class="form-control form-control-sm" aria-label="Cuisses" wire:model="cuisses" />
              </div>
              @error('cuisses')
                <span class="text-danger error">{{ __('This field is required') }}</span>
              @enderror
            </td>
          </tr>
          <tr>
            <td>
              <div class="input-group input-group-sm">
                <span class="input-group-text sm">{{ __('L. Taille') }}</span>
                <input type="text" class="form-control form-control-sm" aria-label="L. Total"
                  wire:model="l_taille" />
              </div>
              @error('l_taille')
                <span class="text-danger error">{{ __('This field is required') }}</span>
              @enderror
            </td>
            <td>
              <div class="input-group input-group-sm">
                <span class="input-group-text sm">{{ __('Longueur') }}</span>
                <input type="text" class="form-control form-control-sm" aria-label="Longueur"
                  wire:model="longueur" />
              </div>
              @error('longueur')
                <span class="text-danger error">{{ __('This field is required') }}</span>
              @enderror
            </td>
          </tr>
          <tr>
            <td>
              <div class="input-group input-group-sm">
                <span class="input-group-text sm">{{ __('L. Total') }}</span>
                <input type="text" class="form-control form-control-sm" aria-label="L. Total" wire:model="l_total" />
              </div>
              @error('l_total')
                <span class="text-danger error">{{ __('This field is required') }}</span>
              @enderror
            </td>
            <td>
              <div class="input-group input-group-sm">
                <span class="input-group-text sm">{{ __('Fond') }}</span>
                <input type="text" class="form-control form-control-sm" aria-label="Fond" wire:model="fond" />
              </div>
              @error('fond')
                <span class="text-danger error">{{ __('This field is required') }}</span>
              @enderror
            </td>
          </tr>
          <tr>
            <td>
              <div class="input-group input-group-sm">
                <span class="input-group-text sm">{{ __('Bassin') }}</span>
                <input type="text" class="form-control form-control-sm" aria-label="Bassin" wire:model="bassin_t" />
              </div>
              @error('bassin_t')
                <span class="text-danger error">{{ __('This field is required') }}</span>
              @enderror
            </td>
            <td>
              <div class="input-group input-group-sm">
                <span class="input-group-text sm">{{ __('Braquette') }}</span>
                <input type="text" class="form-control form-control-sm" aria-label="Braquette"
                  wire:model="braquette" />
              </div>
              @error('braquette')
                <span class="text-danger error">{{ __('This field is required') }}</span>
              @enderror
            </td>
          </tr>
          <tr>
            <td>
              <div class="input-group input-group-sm">
                <span class="input-group-text sm">{{ __('L. Manche') }}</span>
                <input type="text" class="form-control form-control-sm" aria-label="L. Manche"
                  wire:model="l_manche" />
              </div>
              @error('l_manche')
                <span class="text-danger error">{{ __('This field is required') }}</span>
              @enderror
            </td>
            <td>
              <div class="input-group input-group-sm">
                <span class="input-group-text sm">{{ __('Pied') }}</span>
                <input type="text" class="form-control form-control-sm" aria-label="Pied" wire:model="pied" />
              </div>
              @error('pied')
                <span class="text-danger error">{{ __('This field is required') }}</span>
              @enderror
            </td>
          </tr>
          <tr>
            <td>
              <div class="input-group input-group-sm">
                <span class="input-group-text sm">{{ __('T. Manche') }}</span>
                <input type="text" class="form-control form-control-sm" aria-label="T. Manche"
                  wire:model="t_manche" />
              </div>
              @error('t_manche')
                <span class="text-danger error">{{ __('This field is required') }}</span>
              @enderror
            </td>
            <td>
              <div class="input-group input-group-sm">
                <span class="input-group-text sm">{{ __('Nombre de poches') }}</span>
                <input type="text" class="form-control form-control-sm" aria-label="Nombre de poches"
                  wire:model="nb_poches_b" />
              </div>
              @error('nb_poches_b')
                <span class="text-danger error">{{ __('This field is required') }}</span>
              @enderror
            </td>
          </tr>
          <tr>
            <td>
              <div class="input-group input-group-sm">
                <span class="input-group-text sm">{{ __('CV') }}</span>
                <input type="text" class="form-control form-control-sm" aria-label="CV" wire:model="cv" />
              </div>
              @error('cv')
                <span class="text-danger error">{{ __('This field is required') }}</span>
              @enderror
            </td>
            <td>
              <div class="input-group input-group-sm">
                <span class="input-group-text sm">{{ __('CD') }}</span>
                <input type="text" class="form-control form-control-sm" aria-label="CD" wire:model="cd" />
              </div>
              @error('cd')
                <span class="text-danger error">{{ __('This field is required') }}</span>
              @enderror
            </td>
          </tr>
          <tr>
            <td>
              <div class="input-group input-group-sm">
                <span class="input-group-text sm">{{ __('Col') }}</span>
                <input type="text" class="form-control form-control-sm" aria-label="Col" wire:model="col" />
              </div>
              @error('col')
                <span class="text-danger error">{{ __('This field is required') }}</span>
              @enderror
            </td>
            <td></td>
          </tr>
          <tr>
            <td colspan="2">
              <div class="input-group input-group-sm">
                <span class="input-group-text sm">{{ __('Nombre de poches') }}</span>
                <input type="text" class="form-control form-control-sm" aria-label="Nombre de poches"
                  wire:model="nb_poches_t" />
              </div>
              @error('nb_poches_t')
                <span class="text-danger error">{{ __('This field is required') }}</span>
              @enderror
            </td>
            <td></td>
          </tr>
          <tr>
            <td>
              <button class="btn btn-success">{{ __('Add') }}</button>
            </td>
          </tr>
        </form>
      </tbody>
    </table>
  </div>
</div>
