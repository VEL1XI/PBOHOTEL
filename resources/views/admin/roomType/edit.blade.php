@extends('layouts.adminlte')
@section('content')
<div class="card shadow-lg" style="border-radius:24px; border:2px solid #d4af37; background:#fff;">
    <div class="card-header" style="background:#00008b; color:#fff; font-weight:bold; border-radius:22px 22px 0 0; letter-spacing:1px;">
      <h3 class="card-title" style="font-size:1.4rem; letter-spacing:1px;">
        <i class="fas fa-door-open" style="color:#d4af37; margin-right:8px;"></i>
        ROOM TYPE EDIT
      </h3>
      <div class="card-tools"></div>
    </div>
    <div class="card-body" style="padding:2rem;">
        <form action="{{ route('roomtype.update', $data->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <div class="form-group">
                <label for="name" style="color:#00008b; font-weight:600;">Name</label>
                <input id="name" value="{{ $data->name }}" name="name" type="text" class="form-control @error('name') is-invalid @enderror" required autocomplete="name" autofocus style="border-radius:16px; border:1.5px solid #d4af37;">
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="facilities" style="color:#00008b; font-weight:600;">Facilities</label>
                @foreach ($roomFacilities as $item)
                    <div class="form-check" style="margin-bottom:4px;">
                        <input class="form-check-input" type="checkbox" {{ in_array($item->facility_name, $data->facilities) ? 'checked' : ''}} name="facilities[]" value="{{ $item->facility_name }}" id="{{$item->id}}">
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
            <div class="form-group">
                <label for="price" style="color:#00008b; font-weight:600;">Price</label>
                <input id="price" value="{{ $data->price }}" name="price" type="text" class="form-control @error('price') is-invalid @enderror" required autocomplete="price" autofocus style="border-radius:16px; border:1.5px solid #d4af37;">
                @error('price')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="foto" style="color:#00008b; font-weight:600;">Foto</label><br>
                <img src="{{ asset('images/tipekamar/'.$data->foto) }}" width="150px" style="border-radius:12px; border:1.5px solid #d4af37; box-shadow:0 2px 8px rgba(0,0,0,0.07); margin-bottom:10px;" alt="">
                <input id="foto" name="foto" type="file" class="form-control @error('foto') is-invalid @enderror" autocomplete="foto" autofocus style="border-radius:16px; border:1.5px solid #d4af37;">
                @error('foto')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="information" style="color:#00008b; font-weight:600;">Information</label>
                <textarea name="information" class="form-control @error('information') is-invalid @enderror" id="information" rows="3" required autocomplete="information" autofocus style="border-radius:16px; border:1.5px solid #d4af37;">{{ old('information') }}{{ $data->information }}</textarea>
                @error('information')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group float-right row mb-0">
                <div class="col-md-6">
                    <button type="submit" class="btn btn-success" style="border-radius:16px; font-weight:bold; padding:8px 28px;">
                        {{ __('Update') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection