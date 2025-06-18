@extends('layouts.template')

@section('content')
<section class="accomodation_area section_gap mt-5" style="background: #f8f9fa; padding: 60px 0;">
<div class="container">
    <div class="col-md-12">
        <div class="section-heading">
            <h2 style="font-weight:bold; color:#00008b; letter-spacing:1px; font-size:2.2rem; text-shadow:0 2px 8px rgba(0,0,0,0.06);">
                <center>
                    <span style="color: #d4af37;">& #128179;</span> Invoice {{ ucfirst($pay->type) }}
                </center>
            </h2>
        </div>
    </div>
    <center>
        {!! QrCode::size(200)->generate($pay->url) !!}
        <br>
        <span style="font-size:1.1rem; color:#00008b; font-weight:600;">No : {{ $pay->nomor }}</span>
        <div class="table-responsive mt-3">
            <table class="table table-hover shadow" style="background:#fff; border-radius:18px; overflow:hidden; max-width:350px; margin:auto; border:2px solid #d4af37;">
                <thead>
                    <tr class="text-center" style="background:#00008b; color:#fff;">
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="text-center" style="background: #fffbe6; color: #000;">
                        <td style="font-weight:bold; color:#d4af37; font-size:1.2rem;">@currency($totalHarga)</td>
                    </tr>
                </tbody>
            </table>
        </div>
        @if(app('router')->getRoutes()->match(app('request')->create(URL::previous()))->getName() == 'customer.transactions')
            <div class="btn-group mt-4">
                <a href="{{ url()->previous() }}" class="btn btn-sm btn-warning" style="border-radius:18px; font-weight:bold;">Back</a>
                <button type="button" class="btn btn-sm btn-success" style="border-radius:18px; font-weight:bold;" data-toggle="modal" data-target="#uploadProof">
                    Upload Bukti
                </button>
            </div>
        @else
        <div class="mt-4 col-md-3">
            <div class="btn-group">
                <a href="{{ route('landing') }}" class="btn btn-sm btn-warning" style="border-radius:18px; font-weight:bold;">Back To Home</a>
                <a class="btn btn-sm btn-success text-white" style="border-radius:18px; font-weight:bold;" data-toggle="modal" data-target="#uploadProof">
                    Upload Proof
                </a>
            </div>
        </div>
        @endif
    </center>
    <div class="modal fade" id="uploadProof" tabindex="-1" role="dialog" aria-labelledby="uploadProofLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="border-radius:18px;">
                <div class="modal-header" style="background:#00008b; color:#fff; border-radius:18px 18px 0 0;">
                    <h5 class="modal-title" id="uploadProofLabel">Upload your payment proof</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:#fff;">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('upload.proof') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="payment_id" value="{{ $idPayment }}">
                    <div class="modal-body" style="background:#fff;">
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="foto">Proof Image</label>
                                <input id="foto" name="foto" type="file" class="form-control @error('foto') is-invalid @enderror" value="{{ old('foto') }}" required autocomplete="foto" autofocus style="border-radius:18px; border:1.5px solid #d4af37;">
                                @error('foto')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer" style="background:#f8f9fa; border-radius:0 0 18px 18px;">
                        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal" style="border-radius:18px;">Close</button>
                        <button type="submit" class="btn btn-sm btn-primary" style="border-radius:18px; font-weight:bold;">Pay</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</section>
@endsection
@section('script')
    <script>
        document.getElementById('store')?.storeID?.onchange = function() {
            var newaction = this.value;
            document.getElementById('store').action = newaction;
        };
    </script>
@endsection