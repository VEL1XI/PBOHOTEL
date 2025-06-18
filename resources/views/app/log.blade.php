@php
   if(Auth::user()->role === 'admin') {
      $layoutDirectory = 'layouts.adminlte';
   } elseif (Auth::user()->role === 'resepsionis') {
      $layoutDirectory = 'layouts.app';
   }
@endphp

@extends($layoutDirectory)
@section('content')
<div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="card shadow-lg" style="border-radius:24px; border:2px solid #d4af37; background:#fff;">
            <div class="card-header" style="background:#00008b; color:#fff; font-weight:bold; border-radius:22px 22px 0 0; letter-spacing:1px; font-size:1.3rem;">
                <h2 style="margin-bottom:0;">
                    <center>
                        <i class="fas fa-history" style="color:#d4af37; margin-right:8px;"></i>
                        Log Activities
                    </center>
                </h2>
            </div>
            <div class="card-body" style="padding:2rem;">
                <div class="col-md-12">
                    <table id="log" class="table table-hover shadow" style="width:100%; background:#fff; border-radius:18px; overflow:hidden; border:2px solid #d4af37;">
                        <thead>
                            <tr class="text-center" style="background:#00008b; color:#fff;">
                                <th>No</th>
                                <th>Log</th>
                                <th>Transaction ID</th>
                                <th>Executor ID</th>
                                <th>Date Time</th>
                            </tr>
                        </thead>
                        <tbody>
                                @foreach ($datas as $item)
                                    <tr class="text-center" style="background:#fffbe6; color:#000;">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->log }}</td>
                                        <td>{{ $item->transaction_id }}</td>
                                        <td>{{ $item->executor_id }}</td>
                                        <td>{{ $item->created_at }}</td>
                                    </tr>
                                @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@section('js')
<script>
    $(function() {
        $("#log").DataTable({
            "responsive": true,
            "paging" : false,
            "buttons": ["copy", "csv", "excel", "pdf", "print"]
        }).buttons().container().appendTo('#facilityList_wrapper .col-md-6:eq(0)');
    });
</script>
@endsection
@section('script')
<script src="{{ asset('js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('js/jszip.min.js') }}"></script>
<script src="{{ asset('js/pdfmake.min.js') }}"></script>
<script src="{{ asset('js/vfs_fonts.js') }}"></script>
<script src="{{ asset('js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('js/buttons.print.min.js') }}"></script>
<script>
    $(function() {
        $("#log").DataTable({
            "responsive": true,
            "paging" : false,
            "dom": 'Bfrtip',
            "buttons": ["copy", "csv", "excel", "pdf", "print"]
        });
    });
</script>
@endsection
@endsection