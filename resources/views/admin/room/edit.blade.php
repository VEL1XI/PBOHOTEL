@extends('layouts.adminlte')
@section('content')
<div class="card shadow-lg" style="border-radius:24px; border:2px solid #d4af37; background:#fff;">
    <div class="card-header" style="background:#00008b; color:#fff; font-weight:bold; border-radius:22px 22px 0 0; letter-spacing:1px;">
      <h3 class="card-title" style="font-size:1.3rem; letter-spacing:1px;">
        <i class="fas fa-bed" style="color:#d4af37; margin-right:8px;"></i>
        ROOM EDIT
      </h3>
      <div class="card-tools"></div>
    </div>
    <div class="card-body" style="padding:2rem;">
        <form action="{{ route('room.update', $data->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="type_id" style="color:#00008b; font-weight:600;">Type</label>
                    <select name="type_id" id="type_id" class="form-control @error('type_id') is-invalid @enderror" value="{{ old('type_id') }}" required autocomplete="type_id" autofocus style="border-radius:16px; border:1.5px solid #d4af37;">
                        @foreach ($typeRooms as $type)
                            <option {{ ($type->id == $data->type_id) ? 'selected' : '' }} value="{{ $type->id }}">{{ $type->name }}</option>
                        @endforeach
                    </select>
                    @error('type_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group col-md-6">
                    <label for="number" style="color:#00008b; font-weight:600;">Number</label>
                    <input id="number" value="{{ $data->number }}" name="number" type="text" class="form-control @error('number') is-invalid @enderror" value="{{ old('number') }}" required autocomplete="number" autofocus style="border-radius:16px; border:1.5px solid #d4af37;">
                    @error('number')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label for="status" style="color:#00008b; font-weight:600;">Status</label>
                <select name="status" id="status" class="form-control @error('status') is-invalid @enderror" value="{{ old('status') }}" required autocomplete="status" autofocus style="border-radius:16px; border:1.5px solid #d4af37;">
                    <option {{ $data->status == "a" ? 'selected' : ''}} value="a">Available</option>
                    <option {{ $data->status == "r" ? 'selected' : ''}} value="r">Reserve</option>
                    <option {{ $data->status == "o" ? 'selected' : ''}} value="o">Occupied</option>
                    <option {{ $data->status == "os" ? 'selected' : ''}} value="os">Out of Service</option>
                </select>
                @error('status')
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