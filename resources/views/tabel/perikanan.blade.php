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
                        <form action="{{ route('index.sektor.pertanian') }}" style="width: 150px;margin-bottom: 20px">
                            <select name="periode" id="periode" onchange="this.form.submit()" class="form-control">
                                <option value="">Pilih Periode</option>
                                @foreach ($periode as $item )
                                <option value="{{ $item->id }}" {{ $periode_id == $item->id ? "selected" : "" }}>{{ $item->periode }}</option>
                                @endforeach
                            </select>
                        </form>
                    </div>
                    <div class="col-md-10">
                        {{-- <a href="{{ route('tambah.sektor.pertanian') }}" class="btn btn-md btn-primary" style="float: right"><i class="fas fa-plus"></i> Tambah</a> --}}
                        <button type="button" class="btn btn-md btn-primary float-right" data-toggle="modal" data-target="#modal-tambah">
                            <i class="fas fa-plus"></i> Tambah
                        </button>
                        @php
                            $periode_id = request()->get('periode');
                        @endphp
                        <div class="modal fade" id="modal-tambah">
                            <div class="modal-dialog modal-lg">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h4 class="modal-title">Tambah Komoditas Pertanian</h4>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('simpan.sektor.pertanian') }}?periode={{ $periode_id }}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label for="komoditas">Nama Komoditas : </label>
                                            <input type="text" id="komoditas" name="komoditas" class="form-control @error('komoditas')
                                            is-invalid                     
                                            @enderror">
                                            @error('komoditas')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="periode">Periode : </label>
                                            <select name="periode" id="periode" class="form-control @error('periode')
                                            is-invalid                        
                                            @enderror">
                                                <option value="">Pilih Periode</option>
                                                @foreach ($periode as $item)
                                                <option value="{{ $item->id }}" {{ $item->id == $periode_id ? 'selected' : '' }}>{{ $item->periode }}</option>
                                                @endforeach
                                            </select>
                                            @error('periode')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="jenis">Jenis Komoditas : </label>
                                            <select name="jenis" id="jenis" class="form-control @error('jenis')
                                                is-invalid
                                            @enderror">
                                                <option value="">Pilih Jenis Komoditas</option>
                                                <option value="1">Sayuran</option>
                                                <option value="2">Buah</option>
                                                <option value="3">Biofarmaka</option>
                                                <option value="4">Tanaman Hias</option>
                                            </select>
                                            @error('jenis')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="jumlah">Jumlah Komoditas : </label>
                                            <input type="number" name="jumlah" id="jumlah" class="form-control @error('jumlah')
                                                is-invalid
                                            @enderror">
                                            @error('jumlah')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div>
                                            <label for="warna">Warna Diagram : </label>
                                            <input type="color" name="warna" class="form-control @error('warna')
                                            is-invalid                        
                                            @enderror" id="warna" style="width: 120px;height:40px">
                                            @error('warna')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="modal-footer justify-content-between">
                                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                          <button type="submit" class="btn btn-primary">Save changes</button>
                                        </div>
                                      </form>
                                </div>
                              </div>
                              <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                          </div>
                          <!-- /.modal -->
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
                            <td width="120"><div style="width: 200px;height: 20px;background-color: {{ $item->warna }}"></div>
                                <div class="modal fade" id="modal-edit-{{ $item->id }}">
                                    <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h4 class="modal-title">Edit Komoditas Pertanian</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>
                                        <div class="modal-body">
                                            
                                            <form action="{{ route('update.sektor.pertanian', ['id' => $item->id]) }}?periode={{ $periode_id }}" method="POST">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="komoditas">Nama Komoditas : </label>
                                                    <input type="text" id="komoditas" name="komoditas" value="{{ $item->komoditas }}" class="form-control @error('komoditas')
                                                    is-invalid                     
                                                    @enderror">
                                                    @error('komoditas')
                                                        <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="jenis">Jenis Komoditas : </label>
                                                    <select name="jenis" id="jenis" class="form-control @error('jenis')
                                                        is-invalid
                                                    @enderror">
                                                        <option value="">Pilih Jenis Komoditas</option>
                                                        <option value="1">Sayuran</option>
                                                        <option value="2">Buah</option>
                                                        <option value="3">Biofarmaka</option>
                                                        <option value="4">Tanaman Hias</option>
                                                    </select>
                                                    @error('jenis')
                                                        <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="jenis">Jenis Komoditas : </label>
                                                    <select name="jenis" id="jenis" class="form-control @error('jenis')
                                                        is-invalid
                                                    @enderror">
                                                        <option value="">Pilih Jenis Komoditas</option>
                                                        <option value="1" {{ $item->jenis_id == 1 ? "selected" : "" }}>Sayuran</option>
                                                        <option value="2" {{ $item->jenis_id == 2 ? "selected" : "" }}>Buah</option>
                                                        <option value="3" {{ $item->jenis_id == 3 ? "selected" : "" }}>Biofarmaka</option>
                                                        <option value="4" {{ $item->jenis_id == 4 ? "selected" : "" }}>Tanaman Hias</option>
                                                    </select>
                                                    @error('jenis')
                                                        <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="jumlah">Jumlah Komoditas : </label>
                                                    <input type="number" name="jumlah" id="jumlah" value="{{ $item->jumlah }}" class="form-control @error('jumlah')
                                                        is-invalid
                                                    @enderror">
                                                    @error('jumlah')
                                                        <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                                <div>
                                                    <label for="warna">Warna Diagram : </label>
                                                    <input type="color" name="warna" value="{{ $item->warna }}" class="form-control @error('warna')
                                                    is-invalid                        
                                                    @enderror" id="warna" style="width: 120px;height:40px">
                                                    @error('warna')
                                                        <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                                </div>
                                                <div class="modal-footer justify-content-between">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>
                                <!-- /.modal -->
                            </td>
                            <td class="text-center">
                                {{-- <a href="{{ route('edit.sektor.pertanian',['id'=>$item->id]) }}" class="btn btn-sm btn-primary">Edit</a> --}}
                                <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-edit-{{ $item->id }}">Edit</button>
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