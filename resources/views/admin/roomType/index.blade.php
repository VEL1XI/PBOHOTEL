@extends('layouts.adminlte')
@section('content')
<div class="card shadow-lg" style="border-radius:24px; border:2px solid #d4af37; background:#fff;">
    <div class="card-header" style="background:#00008b; color:#fff; font-weight:bold; border-radius:22px 22px 0 0; letter-spacing:1px;">
      <h3 class="card-title" style="font-size:1.4rem; letter-spacing:1px;">
        <i class="fas fa-door-open" style="color:#d4af37; margin-right:8px;"></i>
        ROOM TYPE LIST
      </h3>
      <div class="card-tools">
          <a href="{{ route('roomtype.create') }}" class="btn btn-sm" style="background:#d4af37; color:#000; font-weight:bold; border-radius:16px; margin-left:12px;">
            <i class="fas fa-plus"></i> Add
          </a>
      </div>
    </div>
    <div class="card-body" style="padding:2rem;">
        <table id="facilityList" class="table table-hover shadow" style="width:100%; background:#fff; border-radius:18px; overflow:hidden; border:2px solid #d4af37;">
            <thead>
                <tr class="text-center" style="background:#00008b; color:#fff;">
                    <th>No</th>
                    <th>Name</th>
                    <th>Information</th>
                    <th>Foto</th>
                    <th>Price</th>
                    <th>Facilities</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($datas as $dt)
                    <tr class="text-center" style="background:#fffbe6; color:#000;">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $dt->name }}</td>
                        <td>{{ $dt->information }}</td>
                        <td>
                            <img src="{{ asset('images/tipekamar/'.$dt->foto) }}" width="100px" style="border-radius:12px; border:1.5px solid #d4af37; box-shadow:0 2px 8px rgba(0,0,0,0.07);" alt="">
                        </td>
                        <td style="color:#d4af37; font-weight:bold;">{{ $dt->price }}</td>
                        <td>{{ $dt->facilities }}</td>
                        <td>
                            <div class="btn-group">
                                <a href="{{ route('roomtype.edit', $dt->id) }}" class="btn btn-sm btn-warning" style="border-radius:14px; font-weight:bold;">Edit</a>
                                <a href="{{ route('roomtype.delete', $dt->id) }}" onclick="return confirm('Yakin?')" class="btn btn-sm btn-danger" style="border-radius:14px; font-weight:bold;">Delete</a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
  </div>

  @section('js')
    <script>
        $(function() {
            $("#facilityList").DataTable({
                "responsive": true,
                "paging" : false,
                "buttons": ["copy", "csv", "excel", "pdf", "print"]
            }).buttons().container().appendTo('#facilityList_wrapper .col-md-6:eq(0)');
        });
    </script>
  @endsection
@endsection