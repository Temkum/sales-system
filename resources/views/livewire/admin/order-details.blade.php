<div>
  <div class="card">
    <div class="card-header d-flex justify-content-between mb-4">
      <div class="search-box">
        <a href="{{ route('orders') }}" class="btn btn-secondary btn-sm">
          <i class="bx bx-arrow-back"></i>
          {{ __('Back') }}
        </a>
      </div>
    </div>
    <div class="card-body">
      <div class="row d-flex justify-content-evenly text-center h-30">
        <div class="col-md-5 border br-5" id="printData"
          style="width: 500px; border: solid .8px gray; padding: 1rem; border-radius: 5px;">
          <div class="modal-body text-start text-black p-4">
            <div class="info-section d-flex justify-content-between"
              style="display: flex; justify-content: space-between">
              <div class="client-info">
                <h5 class="modal-title text-uppercase" style="text-transform: uppercase; margin-bottom: 0px;">
                  {{ $order->name }}
                </h5>
                <div class="client-details mb-5" style="margin-bottom: 5px;">
                  <p class="address mb-1" style="margin-bottom: 0px; font-size: .8em;">
                    {{ $order->address }}</p>
                  <p class="address" style="margin-bottom: 0px; font-size: .8em;">{{ $order->phone }}
                  </p>
                </div>
              </div>
              <div class="logo">
                <img src="{{ asset('assets/img/icons/brands/asana.png') }}" alt="logo">
              </div>
            </div>

            <p class="mb-0" style="color: #35558a;">Payment summary</p>
            <hr class="mt-2 mb-4"
              style="height: 0; background-color: transparent; opacity: .75; border-top: 2px dashed #9e9e9e;">
            @foreach ($items as $item)
              @if (isset($item->product) && $item->product->prod_name)
                <p class="order-details d-flex" style="display: flex; justify-content: space-between;">
                  <span class="fw-bold mb-0" style="font-weight: bold; margin-bottom: 0px">
                    {{ $item->product->prod_name }}
                  </span>
                  <span class="amt d-flex gap-3" style="display: flex; gap: 3rem;">
                    <span>{{ $item->product_qty }}x</span>
                    <span class="text-muted mb-0"
                      style="color: #9e9e9e; margin-bottom: 0px;">{{ number_format($item->product_price, 2) }}XAF</span>
                  </span>
                </p>
              @else
                <p class="order-details d-flex" style="display: flex; justify-content: space-between;">
                  <span class="fw-bold mb-0" style="font-weight: bold; margin-bottom: 0px">
                    {{ $item->item_name ? $item->item_name : '' }}
                  </span>
                  <span class="amt d-flex gap-3" style="display: flex; gap: 3rem;">
                    <span>{{ $item->item_qty }}x</span>
                    <span class="text-muted mb-0"
                      style="color: #9e9e9e; margin-bottom: 0px;">{{ number_format($item->item_price, 2) }}XAF</span>
                  </span>
                </p>
              @endif
            @endforeach
            <div class="d-flex justify-content-between pb-1"
              style="display: flex; justify-content: space-between; padding-bottom: 1px">
              <p class="small"></p>
              <p class="small">{{ number_format($order->price, 2) }}</p>
            </div>

            <div class="d-flex justify-content-between" style="display: flex; justify-content: space-between">
              <p class="fw-bold"></p>
              <p class="fw-bold">
                <span class="amt d-flex gap-3" style="display: flex; gap: 3rem;">
                  <span>Total Paid</span>
                  <span class="mb-0 fs-20" style="font-weight: bold">{{ number_format($order->advance, 2) }} <i
                      class="text-muted fs-5" style="color: gray; font-size: .7em;">XAF</i></span>
                </span>
              </p>
            </div>
          </div>
          <div class="company-info text-muted d-flex"
            style="display: flex; 
                        color: gray; 
                         margin-bottom: 0px;
                         margin-right: 2rem;
                         font-size: .8em; ">
            <p class="mb-0" style="margin-bottom: 0px; margin-right: 1rem; font-size: .8em;">
              Pacho Design</p>
            <p class="mb-0" style="margin-bottom: 0px; margin-right: 2rem; font-size: .8em;">
            <p class="mb-0" style="margin-bottom: 0px; margin-right: 2rem; font-size: .8em;">+237
              679947838</p>
            <p class="mb-0">Douala, Cameroon</p>
          </div>
        </div>
        <div class="col-md-5 measurements">
          <table class="table table-sm table-responsive table-borderless border">
            <thead>
              <th>Haut</th>
              <th>Bas</th>
            </thead>
            <tbody>
              {{-- <th>Epaule</th>
              <th>Taille</th>
              <th>Dos</th>
              <th>Bassin</th>
              <th>Poitrine</th>
              <th>Fesse</th>
              <th>Cuisses</th>
              <th>L. Taille</th>
              <th>Longueur</th>
              <th>L. Total</th>
              <th>Fond</th>
              <th>Braquette</th>
              <th>L. Manche</th>
              <th>Pied</th>
              <th>T. Manche</th>
              <th>Col</th>
              <th>Nombre de poches</th> --}}
              @if ($order->measurements)
                <tr>
                  <td>Epaule {{ $order->measurements['epaule'] }}</td>
                  <td>Taille {{ $order->measurements['taille_b'] }}</td>
                </tr>
                <tr>
                  <td>Dos {{ $order->measurements['dos'] }}</td>
                  <td>Bassin {{ $order->measurements['bassin_b'] }}</td>
                </tr>
                <tr>
                  <td>Poitrine {{ $order->measurements['poitrin'] }}</td>
                  <td>Fesses {{ $order->measurements['fesse'] }}</td>
                </tr>
                <tr>
                  <td>Taille {{ $order->measurements['taille_t'] }}</td>
                  <td>Cuisses {{ $order->measurements['cuisses'] }}</td>
                </tr>
                <tr>
                  <td>L. Taille {{ $order->measurements['taille_t'] }}</td>
                  <td>Longueur {{ $order->measurements['longueur'] }}</td>
                </tr>
                <tr>
                  <td>L. Total {{ $order->measurements['l_total'] }}</td>
                  <td>Fond {{ $order->measurements['fond'] }}</td>
                </tr>
                <tr>
                  <td>Bassin {{ $order->measurements['bassin_t'] }}</td>
                  <td>Braquette {{ $order->measurements['braquette'] }}</td>
                </tr>
                <tr>
                  <td>L. Manche {{ $order->measurements['l_manche'] }}</td>
                  <td>Pied {{ $order->measurements['pied'] }}</td>
                </tr>
                <tr>
                  <td>T. Manche {{ $order->measurements['t_manche'] }}</td>
                  <td>Nombre de poches {{ $order->measurements['nb_poches_b'] }}</td>
                </tr>
                <tr>
                  <td>Col {{ $order->measurements['col'] }}</td>
                  <td></td>
                </tr>
                <tr>
                  <td>Nombre de poches {{ $order->measurements['nb_poches_t'] }}</td>
                  <td></td>
                </tr>
              @endif
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div class="card-footer text-center">
      <div class="btn btn-primary btn-sm" id="print_btn" onclick="event.preventDefault(); printReceiptContent()">
        Print
      </div>
    </div>
  </div>
</div>

@section('script')
  <script>
    function printReceiptContent(el) {
      var data =
        `<input type="button" id="printBtn" class="printBtn" value="Print Receipt" onclick="window.print()"
    style="display: block; width: 100%; border: none; background-color: #008b8b; color: white; padding:10px; cursor:pointer; margin-bottom: 15px;" />`;

      data += document.getElementById('printData').innerHTML;
      myReceipt = window.open('', 'myWin', 'left=500, top=130, width=600, height=600');

      myReceipt.screenX = 0;
      myReceipt.screenY = 0;
      myReceipt.document.write(data);
      myReceipt.document.title = 'Print Receipt';
      myReceipt.focus();

      setTimeout(() => {
        myReceipt.close();
      }, 8000)
    }
  </script>
@endsection
