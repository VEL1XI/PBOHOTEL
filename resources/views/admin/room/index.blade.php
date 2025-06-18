@extends('layouts.adminlte')
@section('content')
<div class="card shadow-lg" style="border-radius:24px; border:2px solid #d4af37; background:#fff;">
    <div class="card-header" style="background:#00008b; color:#fff; font-weight:bold; border-radius:22px 22px 0 0; letter-spacing:1px;">
      <h3 class="card-title" style="font-size:1.3rem; letter-spacing:1px;">
        <i class="fas fa-bed" style="color:#d4af37; margin-right:8px;"></i>
        ROOM LIST
      </h3>
      <div class="card-tools">
          <a href="{{ route('room.create') }}" class="btn btn-sm" style="background:#d4af37; color:#000; font-weight:bold; border-radius:16px; margin-left:12px;">
            <i class="fas fa-plus"></i> Add
          </a>
      </div>
    </div>
    <div class="card-body" style="padding:2rem;">
        <table id="roomlist" class="table table-hover shadow" style="width:100%; background:#fff; border-radius:18px; overflow:hidden; border:2px solid #d4af37;">
            <thead>
                <tr class="text-center" style="background:#00008b; color:#fff;">
                    <th>No</th>
                    <th>Room Type</th>
                    <th>Number</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($datas as $data)
                    <tr class="text-center" style="background:#fffbe6; color:#000;">
                        <td>{{$loop->iteration}}</td>
                        <td>{{ $data->type_id }}</td>
                        <td>{{ $data->number }}</td>
                        <td>
                            @if ($data->status == 'v')
                                <span style="color:#28a745; font-weight:bold;">Available</span>
                            @elseif ($data->status == 'o')
                                <span style="color:#dc3545; font-weight:bold;">Occupied</span>
                            @elseif ($data->status == 'r')
                                <span style="color:#d4af37; font-weight:bold;">Reserved</span>
                            @elseif ($data->status == 'os')
                                <span style="color:#6c757d; font-weight:bold;">Out of Service</span>
                            @endif
                        </td>
                        <td>
                            <div class="btn-group">
                                <a href="{{ route('room.edit', $data->id) }}" class="btn btn-sm btn-warning" style="border-radius:14px; font-weight:bold;">Edit</a>
                                <a href="{{ route('room.delete', $data->id) }}" onclick="return confirm('Yakin?')" class="btn btn-sm btn-danger" style="border-radius:14px; font-weight:bold;">Delete</a>
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
        $(function () {
            $("#roomlist").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print"]
            }).buttons().container().appendTo('#roomlist_wrapper .col-md-6:eq(0)');
        });
    </script>
  @endsection
@endsection