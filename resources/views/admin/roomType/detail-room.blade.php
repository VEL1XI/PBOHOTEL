@extends('layouts.template')
@section('content')
<section class="accomodation_area section_gap mt-5" style="background: #f8f9fa; padding: 60px 0;">
    <div class="container">
        <div class="row">
            <div class="col-md-6 mb-4">
                <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner rounded shadow" style="border: 3px solid #d4af37;">
                        <div class="carousel-item active">
                            <img src="{{asset('images/kamar/' . $data->foto)}}" class="d-block w-100 rounded" alt="..." style="border-radius: 18px;">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="card shadow-lg mb-4">
                    <div class="card-header" style="background: #00008b; color: #fff; border-radius: 18px 18px 0 0; font-weight: bold; letter-spacing: 1px;">
                        Detail Kamar
                    </div>
                    <div class="card-body" style="background: #fff;">
                        <h5 class="mb-3" style="color:#00008b; font-weight:bold;">{{ $data->name }}</h5>
                        <ul class="list-unstyled mb-3" style="font-size:1.05rem;">
                            <li><span style="color:#d4af37;"><i class="fas fa-star"></i></span> <b>Fasilitas:</b> {{ $data->facilities }}</li>
                            <li><span style="color:#d4af37;"><i class="fas fa-bed"></i></span> <b>Kapasitas Kasur:</b> 2</li>
                            <li><span style="color:#d4af37;"><i class="fas fa-money-bill-wave"></i></span> <b>Harga Permalam:</b> @currency($data->price)</li>
                            <li><span style="color:#d4af37;"><i class="fas fa-door-open"></i></span> <b>Kamar Tersedia:</b> {{ $jumlahTersedia }}</li>
                        </ul>
                        <div style="color:#555;">
                            <b>Keterangan:</b>
                            <div class="ml-2" style="font-size:1rem;">{{ $data->information }}</div>
                        </div>
                    </div>
                </div>

                <div class="card shadow-lg">
                    <div class="card-header" style="background: #00008b; color: #fff; border-radius: 18px 18px 0 0; font-weight: bold;">
                        Form Booking
                    </div>
                    <div class="card-body" style="background: #fff;">
                        @auth
                        @if ($jumlahTersedia == 0)
                            <div class="form-group">
                                <label for="jumlah">Jumlah Pesanan</label>
                                <input type="text" class="form-control" disabled value="Full Book">
                            </div>
                        @else
                            <form action="{{ route('customer.book.now') }}" method="post">
                                @csrf
                                <input type="hidden" name="type_id" value="{{ $data->id }}">
                                <input type="hidden" name="stok" value="{{ $jumlahTersedia }}">

                                <div class="form-group">
                                    <label for="jumlah">Jumlah Pesanan</label>
                                    <input type="number" class="form-control" {{ $jumlahTersedia == 0 ? 'disabled' : ''  }} value="{{ $jumlahTersedia == 0 ? '0' : '1'  }}" min="1" max="{{ $jumlahTersedia }}" required name="jumlah" id="jumlah">
                                </div>
                                <div class="form-group">
                                    <label for="check_in">Check In</label>
                                    <input type="date" min='<?= date('Y-m-d'); ?>' class="form-control" value="{{old('check_in')}}" onchange="checkout()" required name="check_in" id="check_in">
                                </div>
                                <div class="form-group">
                                    <label for="check_out">Check Out</label>
                                    <input type="date" disabled min='<?= date('Y-m-d', strtotime('+1 day')); ?>' class="form-control" value="{{old('check_out')}}" required name="check_out" id="check_out">
                                </div>
                                <div class="mt-2">
                                    <button type="submit" class="btn" style="background: #d4af37; color:#000; font-weight:bold; border-radius: 30px; padding: 10px 32px; box-shadow:0 4px 16px rgba(0,0,0,0.08);">
                                        Book Now
                                    </button>
                                </div>
                            </form>
                        @endif
                        @else
                        <center>
                            <a href="{{ route('login') }}" class="btn btn-warning" style="font-weight:bold; border-radius: 30px;">Login First</a>
                        </center>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('script')
<script>
    function checkout(){
        var checkin = new Date($('#check_in').val());
        var dd = checkin.getDate()+1;
        var mm = checkin.getMonth()+1; //January is 0 so need to add 1 to make it 1!
        var yyyy = checkin.getFullYear();
        var lastDayOfMonth = new Date(yyyy, mm, 0);
        if(dd<10){
            dd='0'+dd
        }
        if(dd > lastDayOfMonth.getDate()){
            dd='01'
            mm+=1
        }
        if(mm<10){
            mm='0'+mm
        }

        today = yyyy+'-'+mm+'-'+dd;
        document.getElementById("check_out").setAttribute("min", today);
        document.getElementById("check_out").removeAttribute("disabled");
    }
</script>
@endsection