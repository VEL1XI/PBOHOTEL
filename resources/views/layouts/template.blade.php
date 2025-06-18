<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" href="image/favicon.png" type="image/png">
        <title>Hotel Holly</title>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{ asset('template/vendors/linericon/style.css') }}">
        <link rel="stylesheet" href="{{ asset('template/css/font-awesome.min.css') }}">
        <link rel="stylesheet" href="{{ asset('template/vendors/owl-carousel/owl.carousel.min.css') }}">
        <link rel="stylesheet" href="{{ asset('template/vendors/bootstrap-datepicker/bootstrap-datetimepicker.min.css') }}">
        <link rel="stylesheet" href="{{ asset('template/vendors/nice-select/css/nice-select.css') }}">
        <link rel="stylesheet" href="{{ asset('template/vendors/owl-carousel/owl.carousel.min.css') }}">
        <link rel="stylesheet" href="{{ asset('template/css/bootstrap.css') }}">
        {{-- <link rel="stylesheet" href="{{ asset('css/all.css') }}"> --}}
        {{-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous"> --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.7.0/css/all.min.css">

        <!-- main css -->
        <link rel="stylesheet" href="{{ asset('template/css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('template/css/responsive.css') }}">

        <style>
            .is-invalid { border-color: #dc3545; }
            .is-invalid ~ .invalid-feedback { display: block !important; }
        </style>
    </head>
    <body>
        <!--================Header Area =================-->
        <header class="header_area">
            <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #00008b">
                <!-- Brand and toggle get grouped for better mobile display -->
                <a class="navbar-brand logo_h font-weight-bold ml-5" href="{{ route('landing') }}">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo" class="rounded" width="50px" height="50px" class="mr-2">
                    <span class="ml-3">
                        HOTEL HOLLY
                    </span>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                    <ul class="nav navbar-nav menu_nav ml-auto mr-5">

                        <li class="nav-item"><a class="nav-link text-white" href="{{ route('landing') }}">Home</a></li>
                        <li class="nav-item"><a class="nav-link text-white" href="#facilities">Fasilitas</a></li>
                        <li class="nav-item"><a class="nav-link text-white" href="#about">Tentang Kami</a></li>
                        @guest
                            <li class="nav-item"><a class="nav-link text-white" href="{{ route('login') }}"><i class="fas fa-sign-out-alt"></i> Login/Register</a></li>
                        @else
                            <li class="nav-item submenu dropdown">
                                <a class="nav-link text-white dropdown-toggle" href="#" role="button" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <i class="fas fa-user"></i> {{ Auth::user()->name }}
                                </a>

                                <ul class="dropdown-menu">
                                    
                                    @if (Auth::user()->role == "customer")

                                        <li class="nav-item">
                                            <a role="button" class="nav-link text-dark" href="#" data-target="#modalprofile" data-toggle="modal">
                                                <i class="fas fa-user"></i>
                                                Profile
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link text-dark" href="{{ route('customer.transactions') }}">
                                                <i class="fas fa-exchange-alt"></i>
                                                Transaksi
                                            </a>
                                        </li>
                                    @endif

                                    <li class="nav-item">
                                        <a class="nav-link text-dark" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                            <i class="fas fa-sign-out-alt"></i> {{ __('Keluar') }}
                                        </a>
                                    </li>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </nav>
        </header>
        <!--================Header Area =================-->
        @yield('content')
       <footer class="footer-area section_gap" style="background: linear-gradient(120deg, #000428 60%, #004e92 100%); color: #fff; padding-top: 60px; padding-bottom: 30px; border-top-left-radius: 40px; border-top-right-radius: 40px; box-shadow: 0 -4px 32px rgba(0,0,0,0.12);">
            <div class="container">
                <div class="row mb-5">
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="single-footer-widget">
                            <h6 class="footer_title" style="color: #d4af37; font-weight: bold; letter-spacing: 1px;">Tentang Kami</h6>
                            <p style="color: #e0e0e0;">Kami bukan sekadar tempat menginap<br>kami adalah rumah kedua bagi para pencinta kenyamanan dan keindahan. Dengan sentuhan modern dan fasilitas ramah lingkungan, kami menghadirkan pengalaman menginap yang hangat, tenang, dan berkesan. Datang sebagai tamu, pulang sebagai keluarga.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="single-footer-widget">
                            <h6 class="footer_title" style="color: #d4af37; font-weight: bold; letter-spacing: 1px;">Newsletter</h6>
                            <p style="color: #e0e0e0;">Dapatkan Kabar Menarik dari Kami!<br>Jangan lewatkan promo eksklusif, tips perjalanan, dan berita terbaru dari Hotel Holly</p>
                            <form class="form-inline mt-3">
                                <input class="form-control mr-2" type="email" placeholder="Email Anda" style="border-radius: 20px 0 0 20px; border: none; padding: 10px 18px; min-width: 180px;">
                                <button class="btn" type="submit" style="background: #d4af37; color: #000; border-radius: 0 20px 20px 0; font-weight: bold; padding: 10px 22px;">Langganan</button>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 mb-4">
                        <div class="single-footer-widget instafeed">
                            <h6 class="footer_title" style="color: #d4af37; font-weight: bold; letter-spacing: 1px;">Kontak</h6>
                            <ul class="list-unstyled" style="padding-left:0; margin-bottom:0;">
                                <li class="mb-3 d-flex align-items-center">
                                    <span style="background:#d4af37; color:#00008b; border-radius:50%; width:36px; height:36px; display:flex; align-items:center; justify-content:center; margin-right:12px;">
                                        <i class="fa fa-map-marker"></i>
                                    </span>
                                    <span style="color:#e0e0e0;">Jl. Holly Raya No. 123, Indonesia</span>
                                </li>
                                <li class="mb-3 d-flex align-items-center">
                                    <span style="background:#d4af37; color:#00008b; border-radius:50%; width:36px; height:36px; display:flex; align-items:center; justify-content:center; margin-right:12px;">
                                        <i class="fa fa-envelope"></i>
                                    </span>
                                    <span style="color:#e0e0e0;">info@hotelholly.com</span>
                                </li>
                                <li class="mb-3 d-flex align-items-center">
                                    <span style="background:#d4af37; color:#00008b; border-radius:50%; width:36px; height:36px; display:flex; align-items:center; justify-content:center; margin-right:12px;">
                                        <i class="fa fa-phone"></i>
                                    </span>
                                    <span style="color:#e0e0e0;">(021) 1234-5678</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="border_line" style="border-top: 1.5px solid #d4af37; margin-bottom: 18px;"></div>
                <div class="row footer-bottom d-flex justify-content-between align-items-center">
                    <p class="col-lg-8 col-sm-12 footer-text m-0" style="color: #e0e0e0;">
                        Copyright &copy;<script>document.write(new Date().getFullYear());</script>
                        <span style="color:#d4af37; font-weight:bold;">Hotel Holly</span> All rights reserved
                    </p>
                    <div class="col-lg-4 col-sm-12 footer-social text-lg-right text-center">
                        <a href="#" style="color:#d4af37; font-size: 1.4rem; margin: 0 8px;"><i class="fa fa-facebook"></i></a>
                        <a href="#" style="color:#d4af37; font-size: 1.4rem; margin: 0 8px;"><i class="fa fa-twitter"></i></a>
                        <a href="#" style="color:#d4af37; font-size: 1.4rem; margin: 0 8px;"><i class="fa fa-instagram"></i></a>
                        <a href="#" style="color:#d4af37; font-size: 1.4rem; margin: 0 8px;"><i class="fa fa-youtube"></i></a>
                    </div>
                </div>
            </div>
        </footer>
        <!-- open modal -->
        @if (Auth::check() && Auth::user()->role == "customer")
        <!-- Modal Edit Profile -->
        <div class="modal fade" id="modalprofile" tabindex="-1" role="dialog" aria-labelledby="modalProfileLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content" style="border-radius: 12px;">
                <div class="modal-header border-0 pb-0">
                    <h5 class="modal-title" id="modalProfileLabel">Edit Profile</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    <!-- Avatar -->
                    <div class="mx-auto mb-2" style="width:70px; height:70px; background:#2ecc40; border-radius:50%; display:flex; align-items:center; justify-content:center; font-size:2rem; color:#fff;">
                    {{ Auth::user()->initials ?? '' }}
                    </div>
                    <div style="font-weight:500; font-size:1.2rem;">{{ Auth::user()->name }}</div>
                    <div style="color:#888; margin-bottom:18px;">{{ Auth::user()->email }}</div>
                    <!-- Form -->
                    <form action="javascript:void(0);" method="POST" id="formProfile">
                    @csrf
                    <div class="form-group text-left">
                        <label for="profileName">Name</label>
                        <input type="text" class="form-control" id="profileName" name="name" value="{{ Auth::user()->customer->name ?? '' }}">
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group text-left">
                        <label for="profileAddress">Address</label>
                        <input type="text" class="form-control" id="profileAddress" name="address" value="{{ Auth::user()->customer->address ?? '' }}">
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group text-left">
                        <label for="profileGender">Gender</label>
                        <select class="form-control" id="profileGender" name="gender">
                            <option value="male" {{ (Auth::user()->customer->gender ?? '') == 'male' ? 'selected' : '' }}>Male</option>
                            <option value="female" {{ (Auth::user()->customer->gender ?? '') == 'female' ? 'selected' : '' }}>Female</option>
                            <option value="other" {{ (Auth::user()->customer->gender ?? '') == 'other' ? 'selected' : '' }}>Other</option>
                        </select>
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group text-left">
                        <label for="profileJob">Job</label>
                        <input type="text" class="form-control" id="profileJob" name="job" value="{{ Auth::user()->customer->job ?? '' }}">
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group text-left">
                        <label for="profileBirthdate">Birthdate</label>
                        <input type="date" class="form-control" id="profileBirthdate" name="birthdate" value="{{ Auth::user()->customer->birthdate ?? '' }}">
                        <div class="invalid-feedback"></div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block" style="background:#00008b; border:none; border-radius:8px; font-weight:bold;">Simpan</button>
                </form>
                </div>
                </div>
            </div>
            </div>

        @endif
        
        <!-- close modal -->


        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="{{ asset('template/js/jquery-3.2.1.min.js') }}"></script>
        <script src="{{ asset('template/js/popper.js') }}"></script>
        <script src="{{ asset('template/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('template/vendors/owl-carousel/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('template/js/jquery.ajaxchimp.min.js') }}"></script>
        <script src="{{ asset('template/js/mail-script.js') }}"></script>
        <script src="{{ asset('template/vendors/bootstrap-datepicker/bootstrap-datetimepicker.min.js') }}"></script>
        <script src="{{ asset('template/vendors/nice-select/js/jquery.nice-select.js') }}"></script>
        <script src="{{ asset('template/js/mail-script.js') }}"></script>
        <script src="{{ asset('template/js/stellar.js') }}"></script>
        <script src="{{ asset('template/vendors/lightbox/simpleLightbox.min.js') }}"></script>
        <script src="{{ asset('template/js/custom.js') }}"></script>
        @yield('script')
        <script>
            setTimeout(function() {
                $('.alert').fadeOut('fast');
            }, 3000); // <-- time in milliseconds
        </script>

        @if (Auth::check() && Auth::user()->role == "customer")
         <script type="text/javascript">
            $(document).ready(function(){
                $("#formSubmit").on
            });

                const ajaxRequest = (url, method, data, dataType) => {
                    return $.ajax({
                        url: url,
                        type: method,
                        data: data,
                        dataType: dataType,
                        success: function(response) {
                            if (response.status === 'success') {
                                $('#modalprofile').modal('hide');
                                location.reload();
                            } else {
                                $.each(response.errors, function(key, value) {
                                    $('#' + key).addClass('is-invalid');
                                    $('#' + key).after('<div class="invalid-feedback">' + value + '</div>');
                                });
                            }
                        },
                        error: function(xhr) {
                            if(xhr.status === 422) {
                                var errors = xhr.responseJSON.errors;
                                $.each(errors, function(field, messages) {
                                    var input = $('#formProfile [id="profile'+field.charAt(0).toUpperCase() + field.slice(1)+'"]');
                                    input.addClass('is-invalid');
                                    if(input.next('.invalid-feedback').length === 0) {
                                        input.after('<div class="invalid-feedback">'+messages[0]+'</div>');
                                    }
                                });
                            } else {
                                alert('Terjadi kesalahan. Silakan coba lagi.');
                            }
                        }
                    });
                }
            
        </script>
        @endif
        <script>
        $(document).ready(function(){
            $('#formProfile').on('submit', function(e){
                e.preventDefault();

        // Bersihkan error sebelumnya
        $('#formProfile .form-control').removeClass('is-invalid');
        $('#formProfile .invalid-feedback').text('');

        $.ajax({
            url: "{{ route('customer.save') }}",
            type: "POST",
            data: $(this).serialize(),
            dataType: "json",
            success: function(response) {
                if (response.status === 'success') {
                    $('#modalprofile').modal('hide');
                    location.reload();
                }
            },
            error: function(xhr) {
                if(xhr.status === 422) {
                    var errors = xhr.responseJSON.errors;
                    $.each(errors, function(field, messages) {
                        var input = $('#formProfile [name="'+field+'"]');
                        input.addClass('is-invalid');
                        input.next('.invalid-feedback').text(messages[0]);
                    });
                } else {
                    alert('Terjadi kesalahan. Silakan coba lagi.');
                }
            }
        });
    });
});
</script>
    </body>
</html>
