@extends('layouts.template')

@section('content')
<section class="accomodation_area section_gap mt-5" style="background: #f8f9fa; padding: 60px 0;">
  <div class="container">
    <div class="row">
      <div class="col-md-12 mb-4">
        <div class="section-heading">
          <h2 style="font-weight:bold; color:#00008b; letter-spacing:1px; font-size:2.2rem; text-shadow:0 2px 8px rgba(0,0,0,0.06);">
            <center>
               Pembayaran Kamar 
            </center>
          </h2>
        </div>
      </div>

      <div class="col-md-12">
        <div class="table-responsive mb-4">
          <table class="table table-hover shadow" style="background:#fff; border-radius:18px; overflow:hidden;">
            <thead>
              <tr class="text-center" style="background:#00008b; color:#fff;">
                <th>Nomor Kamar</th>
                <th>Type Kamar</th>
                <th>Jumlah Pesanan</th>
                <th>Total Malam</th>
                <th>Harga Permalam</th>
                <th>Total Harga</th>
              </tr>
            </thead>
            <tbody>
              <tr class="text-center" style="background:#fffbe6; color:#000;">
                <td style="vertical-align:middle;">{{ $nomorKamar }}</td>
                <td style="vertical-align:middle;">{{ $dataType->name }}</td>
                <td style="vertical-align:middle;">{{ $jumlahPesanan }}</td>
                <td style="vertical-align:middle;">{{ $totalMalam }}</td>
                <td style="vertical-align:middle;">@currency($dataType->price)</td>
                <td style="vertical-align:middle; font-weight:bold; color:#d4af37;">@currency($totalHarga)</td>
              </tr>
            </tbody>
          </table>
        </div>

        <div>
          <button type="button" class="btn" style="background: #d4af37; color:#000; font-weight:bold; border-radius: 30px; padding: 10px 32px; box-shadow:0 4px 16px rgba(0,0,0,0.08);" data-toggle="modal" data-target="#payType">
            Bayar Sekarang
          </button>
          <div class="modal fade" id="payType" tabindex="-1" role="dialog" aria-labelledby="payTypeLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content" style="border-radius:18px;">
                <div class="modal-header" style="background:#00008b; color:#fff; border-radius:18px 18px 0 0;">
                  <h5 class="modal-title" id="payTypeLabel" style="font-weight:bold;">Pilih Metode Pembayaran</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:#fff;">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form action="{{ route('customer.pay.transaction', $transaction->id) }}" method="post">
                  @csrf
                  <div class="modal-body" style="background:#fff;">
                    <div class="form-row mb-3">
                      <select name="pay_type" id="pay_type" class="form-control col-md-12 @error('pay_type') is-invalid @enderror" required autocomplete="pay_type" autofocus style="border-radius:20px; border:1.5px solid #d4af37;">
                        <option value="dana">DANA</option>
                        <option value="ovo">OVO</option>
                        <option value="gopay">GOPAY</option>
                        <option value="mandiriva">Mandiri VA</option>
                        <option value="briva">BRI VA</option>
                        <option value="bcava">BCA VA</option>
                      </select>
                      @error('pay_type')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </div>
                  <div class="modal-footer" style="background:#f8f9fa; border-radius:0 0 18px 18px;">
                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal" style="border-radius:20px;">Tutup</button>
                    <button type="submit" class="btn btn-sm" style="background: #d4af37; color:#000; font-weight:bold; border-radius:20px;">Bayar</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</section>
@endsection
