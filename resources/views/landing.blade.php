@extends('layouts.template')
@section('content')
        <!--================Banner Area =================-->
        <section class="banner_area" id="home">
            <div class="booking_table d_flex align-items-center">
            	<div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
				<div class="container">
					<div class="banner_content text-center">
						<h2>Hotel Holly</h2>
						<p style="font-size: 20px;">Nyaman dan sehat, aman di hati, ramah di kantong<br>Hotel Holly, pilihan terbaik untuk setiap momen menginap Anda</p>
						<a href="#types" class="btn theme_btn button_hover" style="background-color: #00008b">Pesan Sekarang</a>
					</div>
				</div>
            </div>
            <div class="hotel_booking_area position" style="background-color: #00008b">
                <div class="container" >
                    <div class="hotel_booking_table" style="background-color: #00008b">
                        <div class="col-md-12">
                            <center>

                                <h2>Liburan Lebih Nyaman<br> Hanya di Hotel Holly</h2>
                            </center>
                        </div>

                    </div>
                </div>
            </div>
        </section>
        <!--================Banner Area =================-->

        <!--================ Accomodation Area  =================-->
        <section class="accomodation_area section_gap" id="types" style="background: linear-gradient(120deg, #fff 60%, #f0f4ff 100%); padding: 70px 0;">
            <div class="container">
                <div class="section_title text-center mb-5">
                    <h2 class="title_color" style="font-size:2.5rem; font-weight:bold; letter-spacing:2px;">
                         Tipe Kamar 
                    </h2>
                    <p style="color:#888; font-size:1.1rem;">Pilihan kamar mewah dengan fasilitas terbaik untuk pengalaman menginap tak terlupakan</p>
                </div>
                <div class="row mb_30 justify-content-center">
                    @foreach ($roomTypes as $item)
                    <div class="col-lg-4 col-md-6 mb-4 d-flex align-items-stretch">
                        <div class="card shadow w-100" style="border-radius: 24px; background: #fff; border: 2px solid #d4af37;">
                            <a href="{{ route('detail.room', $item->id) }}">
                                <img src="{{ asset('images/tipekamar/'.$item->foto) }}" class="card-img-top" alt="..." style="border-top-left-radius:24px; border-top-right-radius:24px; height:260px; object-fit:cover;">
                            </a>
                            <div class="card-body text-center px-4 py-4">
                                <a href="{{ route('detail.room', $item->id) }}">
                                    <h4 class="sec_h4 mb-2" style="font-weight:bold; color:#00008b;">{{ $item->name }}</h4>
                                </a>
                                <a href="{{ route('detail.room', $item->id) }}">
                                    <h5 style="color:#d4af37; font-size:1.4rem; font-weight:bold;">
                                        @currency($item->price)<small style="color:#888;">/night</small>
                                    </h5>
                                </a>
                                <p style="color:#555; margin-bottom:18px;">Kamar Tersedia : <span style="font-weight:bold; color:#00008b;">{{ $item->getTotalRooms->count() }}</span></p>
                                <a href="{{ route('detail.room', $item->id) }}" class="btn custom-book-btn" style="background: #00008b; color:#fff; font-weight:bold; border-radius: 30px; padding: 10px 32px; box-shadow:0 4px 16px rgba(0,0,0,0.08);">
                                    Book Now
                                </a>
                                <style>
                                    .custom-book-btn:hover, .custom-book-btn:focus {
                                        background: #d4af37 !important;
                                        color: #000 !important;
                                        transition: background 0.3s, color 0.3s;
                                    }
                                </style>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!--================ Accomodation Area  =================-->


    <!--================ Facilities Area  =================-->
    <section class="facilities_area section_gap" id="facilities" style="background: linear-gradient(135deg, #00008b 60%, #ffffff 100%); padding: 60px 0;">
        <div class="container">
            <div class="section_title text-center mt-5">
                <h2 class="title_w" style="color: #fff;">Fasilitas Hotel</h2>
                <p style="color: #e0e0e0;">Fasilitas Ramah Lingkungan untuk Anda yang Cinta Alam</p>
            </div>
            <div class="row justify-content-center">
                @foreach ($hotelFacilities as $item)
                <div class="col-lg-4 col-md-6 mb-4 d-flex align-items-stretch">
                    <div class="card shadow-lg border-0 w-100" style="background: #fff; border-radius: 18px;">

                        <div class="card-body text-center">
                            <h4 class="sec_h4" style="color: #00008b;">{{ $item->facility_name }}</h4>
                            <p style="color: #333;">{{ $item->detail }}</p>
                        </div>

                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
        <!--================ Facilities Area  =================-->

        <!--================ About History Area  =================-->
        <section class="about_history_area section_gap" id="about">
        <div class="container">
            <div class="row align-items-center flex-row-reverse">
                <div class="col-md-6 mb-4 mb-md-0">
                    <div class="card shadow-lg border-0" style="background: #fff; border-radius: 18px;">
                        <div class="card-body p-5">
                            <h2 class="title" style="color: #00008b; font-weight: bold;">Tentang Kami</h2>
                            <hr style="border-top: 2px solid #00008b; width: 60px; margin-left: 0;">
                            <p style="color: #333; font-size: 1.1rem;">
                                Hotel Holly merupakan hotel berbintang yang mengutamakan kenyamanan, pelayanan prima, dan pengalaman menginap yang tak terlupakan bagi setiap tamu. Terletak di lokasi strategis, Hotel Holly menawarkan berbagai tipe kamar mewah yang sesuai dengan kebutuhan wisatawan maupun pelaku bisnis. Kami menyediakan fasilitas lengkap seperti kolam renang, Warung Kopi Hotel, Mushola dan Resepsionis Ramah, dll. Dengan desain interior modern dan nuansa yang hangat, Hotel Holly adalah pilihan sempurna untuk tempat beristirahat maupun mengadakan kegiatan bisnis. Nikmati kenyamanan dan kemewahan dengan pelayanan terbaik hanya di Hotel Holly.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 text-center">
                    <img class="img-fluid rounded shadow" src="{{ asset('template/image/about_bg.jpg') }}" alt="img" style="max-width: 90%; border: 6px solid #00008b;">
                </div>
            </div>
        </div>
    </section>
        <!--================ About History Area  =================-->



@endsection
