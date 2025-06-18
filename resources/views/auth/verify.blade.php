@extends('layouts.app')

@section('content')
<div class="container" style="min-height: 80vh;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg" style="border-radius: 24px; border: 2px solid #d4af37; background: #fff;">
                <div class="card-header text-center" style="background: #00008b; color: #fff; font-weight: bold; border-radius: 22px 22px 0 0; letter-spacing: 1px; font-size: 1.3rem;">
                    <i class="fas fa-envelope-open-text" style="color:#d4af37; margin-right:8px;"></i>
                    {{ __('Verifikasi Alamat Email Anda') }}
                </div>

                <div class="card-body" style="padding:2rem;">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert" style="border-radius: 12px;">
                            {{ __('Link verifikasi baru telah dikirim ke email Anda.') }}
                        </div>
                    @endif

                    <div style="color:#00008b; font-size:1.08rem; font-weight:500; margin-bottom:10px;">
                        {{ __('Sebelum melanjutkan, silakan cek email Anda untuk link verifikasi.') }}
                    </div>
                    <div style="color:#555; margin-bottom:18px;">
                        {{ __('Jika Anda tidak menerima email tersebut,') }}
                    </div>
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn" style="background: #d4af37; color:#000; font-weight:bold; border-radius: 20px; padding: 8px 28px; box-shadow:0 4px 16px rgba(0,0,0,0.08);">
                            {{ __('Kirim Ulang Link Verifikasi') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection