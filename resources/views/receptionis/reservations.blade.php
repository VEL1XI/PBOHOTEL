@extends('layouts.app')

@section('content')
<div class="container-fluid px-3">
    <div class="row">
      <div class="col-md-12">
        <div class="card shadow-lg" style="border-radius: 24px; border: 2px solid #d4af37; background: #fff;">
            <div class="card-header" style="background: #00008b; color: #fff; border-radius: 22px 22px 0 0;">
                <h2 style="font-weight:bold; letter-spacing:1px; font-size:2rem; margin-bottom:0;">
                    <center>
                        <i class="fas fa-list-alt" style="color:#d4af37; margin-right:8px;"></i>
                        Daftar Transaksi
                    </center>
                </h2>
            </div>
            <div class="card-body" style="padding:2rem;">
                <div class="col-md-12">
                    <table id="transaction" class="table table-hover shadow" style="width:100%; background:#fff; border-radius:18px; overflow:hidden;">
                        <thead>
                            <tr class="text-center" style="background:#00008b; color:#fff;">
                                <th>No</th>
                                <th>Customer Name</th>
                                <th>Phone Number</th>
                                <th>Type Kamar</th>
                                <th>Jumlah Pesanan</th>
                                <th>Check in - Check out</th>
                                <th>Tanggal Pemesanan</th>
                                <th>Harga Permalam</th>
                                <th>Total Harga</th>
                                <th>Status Transaksi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($datas as $item)
                            <tr class="text-center" style="background:#fffbe6; color:#000;">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->user->name }}</td>
                                <td>{{ $item->user->phone }}</td>
                                <td>{{ $item->room->roomType->name }}</td>
                                <td>{{ $item->many_room }}</td>
                                <td>{{ $item->check_in . ' - ' . $item->check_out}}</td>
                                <td>{{ $item->created_at->diffForHumans() }}</td>
                                <td>@currency($item->room->roomType->price)</td>
                                <td style="font-weight:bold; color:#d4af37;">@currency($item->payment->price)</td>
                                <td>
                                    <span style="font-weight:bold; color:
                                        @if($item->status == 'verified') #28a745
                                        @elseif($item->status == 'canceled' || $item->status == 'failed' || $item->status == 'rejected') #dc3545
                                        @elseif($item->status == 'process') #ffc107
                                        @else #00008b
                                        @endif
                                    ">
                                        {{ Str::ucfirst($item->status) }}
                                    </span>
                                </td>
                                <td>
                                    @if ($item->status == 'canceled')
                                        <span class="text-danger font-weight-bold">Transaction Canceled</span>
                                    @elseif ($item->status == 'failed')
                                        <span class="text-danger font-weight-bold">Transaction Failed</span>
                                    @elseif ($item->status == 'process')
                                        <a class="btn btn-sm btn-primary" data-toggle="modal" data-target="#{{ 'haha'.$item->id }}" style="border-radius:18px; font-weight:bold;">Proof</a>
                                        <div class="modal fade" id="{{ 'haha'.$item->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content" style="border-radius:18px;">
                                                    <div class="modal-header" style="background:#00008b; color:#fff; border-radius:18px 18px 0 0;">
                                                        <h4 class="modal-title" id="myModalLabel">Proof Image</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:#fff;">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <center>
                                                            <img width="400px" src="{{ asset('images/bukti/'.$item->payment->bukti) }}" alt="">
                                                        </center>
                                                    </div>
                                                    <div class="modal-footer" style="background:#f8f9fa; border-radius:0 0 18px 18px;">
                                                        <a onclick="return confirm('Change the status to Verified?')" class="btn btn-sm btn-success" href="{{ route('receptionis.toverified', $item->id) }}" style="border-radius:18px; font-weight:bold;">Verified</a>
                                                        <a onclick="return confirm('Change the status to Rejected?')" class="btn btn-sm btn-danger" href="{{ route('receptionis.torejected', $item->id) }}" style="border-radius:18px; font-weight:bold;">Reject</a>
                                                        <button type="button" class="btn btn-sm btn-secondary float-right" data-dismiss="modal" style="border-radius:18px;">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @elseif ($item->status == 'verified')
                                        <span class="text-success font-weight-bold">Transaction Success</span>
                                    @elseif ($item->status == 'rejected')
                                        <span class="text-danger font-weight-bold">Rejected</span>
                                    @elseif($item->status == 'waiting for payment')
                                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="{{ '#uploadProof'.$item->id }}" style="border-radius:18px; font-weight:bold;">
                                            Upload Proof
                                        </button>
                                    @elseif($item->status == 'checked in')
                                        <span class="text-success font-weight-bold">Checked In on {{ $item->updated_at }}</span>
                                    @elseif($item->status == 'checked out')
                                        <span class="text-success font-weight-bold">Checked Out on {{ $item->updated_at }}</span>
                                    @endif

                                    <!-- MODAL UPLOAD BUKTI -->
                                    <div class="modal fade" id="{{ 'uploadProof'.$item->id }}" tabindex="-1" role="dialog" aria-labelledby="uploadProofLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content" style="border-radius:18px;">
                                                <div class="modal-header" style="background:#00008b; color:#fff; border-radius:18px 18px 0 0;">
                                                    <h5 class="modal-title" id="uploadProofLabel">Upload your payment proof</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:#fff;">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="{{ route('receptionis.upload.proof') }}" method="post" enctype="multipart/form-data">
                                                    @csrf
                                                    <input type="hidden" name="payment_id" value="{{ $item->id }}">
                                                    <div class="modal-body" style="background:#fff;">
                                                        <div class="form-row">
                                                            <div class="form-group col-md-12">
                                                                <label for="foto">Proof Image</label>
                                                                <input id="foto" name="foto" type="file" class="form-control @error('foto') is-invalid @enderror"  value="{{ old('foto') }}" required autocomplete="foto" autofocus style="border-radius:18px; border:1.5px solid #d4af37;">
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
                                                        <button type="submit" class="btn btn-sm btn-primary" style="border-radius:18px; font-weight:bold;">Send</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
      </div>
    </div>
</div>
@endsection
@section('script')
<script src="{{ asset('js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('js/jszip.min.js') }}"></script>
<script src="{{ asset('js/pdfmake.min.js') }}"></script>
<script src="{{ asset('js/vfs_fonts.js') }}"></script>
<script src="{{ asset('js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('js/buttons.print.min.js') }}"></script>
<script>
    $(function() {
        $("#transaction").DataTable({
            "responsive": true,
            "paging" : false,
            "dom": 'Bfrtip',
            "buttons": ["copy", "csv", "excel", "pdf", "print"]
        });
    });
</script>
@endsection