@extends('layouts.adminlte')
@section('content')
<div class="card shadow-lg" style="border-radius:24px; border:2px solid #d4af37; background:#fff;">
    <div class="card-header" style="background:#00008b; color:#fff; font-weight:bold; border-radius:22px 22px 0 0; letter-spacing:1px;">
      <h3 class="card-title" style="font-size:1.4rem; letter-spacing:1px;">
        <i class="fas fa-door-open" style="color:#d4af37; margin-right:8px;"></i>
        ROOM TYPE ADD
      </h3>
      <div class="card-tools"></div>
    </div>
    <div class="card-body" style="padding:2rem;">
        <form action="{{ route('roomtype.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="name" style="color:#00008b; font-weight:600;">Name</label>
                    <input id="name" name="name" type="text" class="form-control @error('name') is-invalid @enderror"  value="{{ old('name') }}" required autocomplete="name" autofocus style="border-radius:16px; border:1.5px solid #d4af37;">
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group col-md-6">
                    <label for="facilities" style="color:#00008b; font-weight:600;">Facilities</label>
                    @foreach ($roomFacilities as $item)
                        <div class="form-check" style="margin-bottom:4px;">
                            <input class="form-check-input" type="checkbox" name="facilities[]" value="{{ $item->facility_name }}" id="{{$item->id}}">
                            <label class="form-check-label" for="{{ $item->id }}" style="color:#000;">
                                {{$item->facility_name}}
                            </label>
                        </div>
                        @error('facilities')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    @endforeach
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="price" style="color:#00008b; font-weight:600;">Price</label>
                    <input id="price" name="price" type="text" class="form-control @error('price') is-invalid @enderror" value="{{ old('price') }}" required autocomplete="price" autofocus style="border-radius:16px; border:1.5px solid #d4af37;">
                    @error('price')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group col-md-6">
                    <label for="foto" style="color:#00008b; font-weight:600;">Foto</label>
                    <input id="foto" name="foto" type="file" class="form-control @error('foto') is-invalid @enderror"  value="{{ old('foto') }}" required autocomplete="foto" autofocus style="border-radius:16px; border:1.5px solid #d4af37;">
                    @error('foto')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label for="information" style="color:#00008b; font-weight:600;">Information</label>
                <textarea name="information" class="form-control @error('information') is-invalid @enderror" id="information" rows="3" required autocomplete="information" autofocus style="border-radius:16px; border:1.5px solid #d4af37;">{{ old('information') }}</textarea>
                @error('information')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group float-right row mb-0">
                <div class="col-md-6">
                    <button type="submit" class="btn btn-primary" style="background:#d4af37; color:#000; font-weight:bold; border-radius:16px; padding:8px 28px; border:none;">
                        {{ __('Post') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection