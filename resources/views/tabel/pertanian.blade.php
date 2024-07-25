@extends('layouts.main')
@push('css')
<link rel="stylesheet" href="{{ url('/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ url('/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ url('/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endpush
@section('content')
<div class="content-wrapper">
    <div class="card card-outline card-info">
        <div class="card-header">
            <div class="card-title">
            <h2>Sektor Pertanian</h2>
            </div>
            <div class="card-body">
                <div class="row container-fluid">
                    <div class="col-md-2">
                        <label for="periode">Periode : </label>
                        <form action="{{ route('index.sektor.pertanian') }}" style="width: 150px">
                            <select name="periode" id="periode" onchange="this.form.submit()" class="form-control">
                                <option value="">Pilih Periode</option>
                                @foreach ($periode as $item )
                                <option value="{{ $item->id }}" {{ $periode_id == $item->id ? "selected" : "" }}>{{ $item->periode }}</option>
                                @endforeach
                            </select>
                        </form>
                    </div>
                    <div class="col-md-10">
                        <a href="{{ route('tambah.sektor.pertanian') }}" class="btn btn-md btn-primary" style="float: right"><i class="fas fa-plus"></i> Tambah</a>
                    </div>
                </div>
                <table class="table table-bordered table-stripped" id="myTable">
                    <thead>
                        <th width="25" class="text-center">
                            No.
                        </th>
                        <th>
                            Komoditas
                        </th>
                        <th>
                            Jumlah
                        </th>
                        <th>
                            Jenis
                        </th>
                        <th>
                            Warna
                        </th>
                        <th class="text-center">
                            Aksi
                        </th>
                    </thead>
                    <tbody>
                        @foreach ($komoditas_sektor_pertanian as $key => $item)
                        <tr>
                            <th>{{ $key + 1 }}.</th>
                            <td>{{ $item->komoditas }}</td>
                            <td>{{ $item->jumlah }} {{ $item->jenis->id !== 4 ? 'Kg' : 'Tangkai' }}</td>
                            <td>{{ ucwords($item->jenis->jenis) }}</td>
                            <td width="120"><div style="width: 200px;height: 20px;background-color: {{ $item->warna }}"></div></td>
                            <td class="text-center">
                                <a href="{{ route('edit.sektor.pertanian',['id'=>$item->id]) }}" class="btn btn-sm btn-primary">Edit</a>
                                <a href="{{ route('hapus.sektor.pertanian',['id'=>$item->id,'periode'=>$item->periode_id]) }}" class="btn btn-sm btn-danger">Hapus</a>
                            </td>
                        </tr>    
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script src="{{ url('/assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ url('/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ url('/assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ url('/assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ url('/assets/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ url('/assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ url('/assets/plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ url('/assets/plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ url('/assets/plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ url('/assets/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ url('/assets/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ url('/assets/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
 <script>
    $(function () {
        $("#myTable").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
 </script>

@endpush