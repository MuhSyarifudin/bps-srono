@extends('layouts.main')
@section('content')
<div class="content-wrapper">
    <div class="card">
        <div class="card-header">
            <div class="card-title">
            <h2>Sektor Pertanian</h2>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-stripped" id="myTable">
                    <thead>
                        <th>
                            No
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
                        <th>
                            Aksi
                        </th>
                    </thead>
                    <tbody>
                        @foreach ($komoditas_sektor_pertanian as $key => $item)
                        <tr>
                            <th>{{ $key + 1 }}.</th>
                            <td>{{ $item->komoditas }}</td>
                            <td>{{ $item->jumlah }}</td>
                            <td>{{ ucwords($item->jenis->jenis) }}</td>
                            <td width="120"><div style="width: 200px;height: 20px;background-color: {{ $item->warna }}"></div></td>
                            <td class="text-center">
                                <a href="#" class="btn btn-sm btn-primary">Edit</a>
                                <a href="#" class="btn btn-sm btn-danger">Hapus</a>
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