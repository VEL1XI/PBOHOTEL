@extends('layouts.app')

@section('content')
<div class="container" style="min-height:80vh;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg" style="border-radius: 24px; border: 2px solid #d4af37; background: #fff;">
                <div class="card-header text-center" style="background: #00008b; color: #fff; font-weight: bold; border-radius: 22px 22px 0 0; letter-spacing: 1px; font-size: 1.3rem;">
                    <i class="fas fa-lock" style="color:#d4af37; margin-right:8px;"></i>
                    {{ __('Konfirmasi Password') }}
                </div>

                <div class="card-body" style="padding:2rem;">
                    <div style="color:#00008b; font-size:1.08rem; font-weight:500; margin-bottom:18px;">
                        {{ __('Silakan konfirmasi password Anda sebelum melanjutkan.') }}
                    </div>

                    <form method="POST" action="{{ route('password.confirm') }}">
                        @csrf

                        <div class="mb-4 row align-items-center">
                            <label for="password" class="col-md-4 col-form-label text-md-end" style="color:#00008b; font-weight:500;">{{ __('Password') }}</label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" style="border-radius:18px; border:1.5px solid #d4af37;">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn" style="background: #d4af37; color:#000; font-weight:bold; border-radius: 20px; padding: 8px 28px; box-shadow:0 4px 16px rgba(0,0,0,0.08);">
                                    {{ __('Konfirmasi Password') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}" style="color:#00008b; font-weight:bold;">
                                        {{ __('Lupa Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection