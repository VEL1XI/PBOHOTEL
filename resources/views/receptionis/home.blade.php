@extends('layouts.app')
@section('content')
<div class="container" style="min-height:80vh;">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-lg" style="border-radius: 24px; border: 2px solid #d4af37; background: #fff;">
                <div class="card-header text-center" style="background: #00008b; color: #fff; font-weight: bold; border-radius: 22px 22px 0 0; letter-spacing: 1px; font-size: 1.4rem;">
                    <i class="fas fa-user-tie" style="color:#d4af37; margin-right:8px;"></i>
                    {{ __('Dashboard Receptionis') }}
                </div>
                <div class="card-body" style="padding:2rem;">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert" style="border-radius: 12px;">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div style="color:#00008b; font-size:1.15rem; font-weight:600;">
                        {{ __('You are logged in as Receptionis!') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection