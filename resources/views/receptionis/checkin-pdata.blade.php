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
            <form action="{{ route('receptionis.checkin.pdata.post') }}" method="post">
                @csrf
                <div class="row">
                    <div class="form-group col-md-6">
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
                    <div class="form-group col-md-6">
                        <label for="name" style="color:#00008b; font-weight:500;">Name</label>
                        <input id="name" name="name" type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required autocomplete="name" autofocus style="border-radius:18px; border:1.5px solid #d4af37;">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label for="address" style="color:#00008b; font-weight:500;">Address</label>
                    <textarea name="address" class="form-control @error('address') is-invalid @enderror" id="address" rows="3" required autocomplete="address" autofocus style="border-radius:18px; border:1.5px solid #d4af37;">{{ old('address') }}</textarea>
                    @error('address')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="row">
                    <div class="form-group col-md-4">
                        <label style="color:#00008b; font-weight:500;">Gender</label>
                        <div class="form-radio ml-2">
                            <input class="form-radio-input" type="radio" name="gender" value="male" id="male">
                            <label class="form-radio-label" for="male">Laki-laki</label>
                        </div>
                        <div class="form-radio ml-2">
                            <input class="form-radio-input" type="radio" name="gender" value="female" id="female">
                            <label class="form-radio-label" for="female">Perempuan</label>
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="job" style="color:#00008b; font-weight:500;">Job</label>
                        <input id="job" name="job" type="text" class="form-control @error('job') is-invalid @enderror" value="{{ old('job') }}" required autocomplete="job" autofocus style="border-radius:18px; border:1.5px solid #d4af37;">
                        @error('job')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group col-md-4">
                        <label for="birthdate" style="color:#00008b; font-weight:500;">Birthdate</label>
                        <input id="birthdate" name="birthdate" type="date" class="form-control @error('birthdate') is-invalid @enderror" value="{{ old('birthdate') }}" required autocomplete="birthdate" autofocus style="border-radius:18px; border:1.5px solid #d4af37;">
                        @error('birthdate')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
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
                        <th>Nomor Kamar</th>
                        <th>Type Kamar</th>
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
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->roomNumber->number }}</td>
                            <td>{{ $item->room->roomType->name }}</td>
                            <td>{{ $item->many_room }}</td>
                            <td>{{ $item->check_in . ' - ' . $item->check_out}}</td>
                            <td>{{ $item->created_at->diffForHumans() }}</td>
                            <td>
                                <a href="{{ route('receptionis.pdata.checkout', $item->id) }}" class="btn btn-sm btn-danger" style="border-radius:18px; font-weight:bold;" onclick="return confirm('Lakukan Checkout pada transaksi {{ $item->user->name }}?')">Check Out</a>
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