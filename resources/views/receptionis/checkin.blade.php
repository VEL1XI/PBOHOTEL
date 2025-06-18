@extends('layouts.app')
@section('content')
<div class="container">
    <div class="card shadow-lg" style="border-radius: 24px; border: 2px solid #d4af37; background: #fff;">
        @if (session('status'))
            <div class="alert alert-success" role="alert" style="border-radius: 12px;">
                {{ session('status') }}
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger" role="alert" style="border-radius: 12px;">
                {{ session('error') }}
            </div>
        @endif
        <div class="card-header" style="background: #00008b; color: #fff; font-weight: bold; border-radius: 22px 22px 0 0; letter-spacing: 1px; font-size: 1.3rem;">
            <i class="fas fa-user-check" style="color:#d4af37; margin-right:8px;"></i>
            Check In Customer
        </div>
        <div class="card-body" style="padding:2rem;">
            <form action="{{ route('receptionis.checkin.post') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="transaction_id" style="color:#00008b; font-weight:500;">Transaction ID</label>
                    <input list="transactions" id="transaction_id" name="transaction_id" type="text" class="form-control @error('transaction_id') is-invalid @enderror" value="{{ old('transaction_id') }}" required autocomplete="off" autofocus style="border-radius:18px; border:1.5px solid #d4af37;"/>
                    <datalist id="transactions">
                        @foreach ($transactions as $item)
                            <option value="{{ $item->id }}">{{ $item->user->name }}</option>
                        @endforeach
                    </datalist>
                    @error('transaction_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <button type="submit" class="btn" style="background: #d4af37; color:#000; font-weight:bold; border-radius: 20px; padding: 8px 28px; box-shadow:0 4px 16px rgba(0,0,0,0.08); float:right;">
                        {{ __('Post') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
    <div class="card shadow-lg mt-4" style="border-radius: 24px; border: 2px solid #d4af37; background: #fff;">
        <div class="card-header" style="background: #00008b; color: #fff; font-weight: bold; border-radius: 22px 22px 0 0; letter-spacing: 1px; font-size: 1.2rem;">
            <i class="fas fa-users" style="color:#d4af37; margin-right:8px;"></i>
            Checked In Customer
        </div>
        <div class="card-body" style="padding:2rem;">
            <table id="transaction" class="table table-hover shadow" style="width:100%; background:#fff; border-radius:18px; overflow:hidden;">
                <thead>
                    <tr class="text-center" style="background:#00008b; color:#fff;">
                        <th>No</th>
                        <th>Customer Name</th>
                        <th>Type Kamar</th>
                        <th>Nomor Kamar</th>
                        <th>Jumlah Pesanan</th>
                        <th>Check in - Check out</th>
                        <th>Tanggal Pemesanan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($datas as $item)
                        <tr class="text-center" style="background:#fffbe6; color:#000;">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->user->name }}</td>
                            <td>{{ $item->room->roomType->name }}</td>
                            <td>{{ $item->roomNumber->number }}</td>
                            <td>{{ $item->many_room }}</td>
                            <td>{{ $item->check_in . ' - ' . $item->check_out}}</td>
                            <td>{{ $item->created_at->diffForHumans() }}</td>
                            <td>
                                <a href="{{ route('receptionis.checkout', $item->id) }}" class="btn btn-sm btn-danger" style="border-radius:18px; font-weight:bold;" onclick="return confirm('Lakukan Checkout pada transaksi {{ $item->user->name }}?')">Check Out</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    $(function() {
        $("#transaction").DataTable({
            "responsive": true,
            "paging" : false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#facilityList_wrapper .col-md-6:eq(0)');
    });
</script>
@endsection