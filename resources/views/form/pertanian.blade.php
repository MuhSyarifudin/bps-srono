@extends('layouts.main')

@section('content')

<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12">
          <div class="card card-outline card-info">
            <div class="card-header">
              <h2 class="card-title">
                Tambah Data Sektor Pertanian
              </h2>
            </div>
            <div class="card-body">
              <form action="{{ route('simpan.sektor.pertanian') }}" method="POST">
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
                        <option value="{{ $item->id }}">{{ $item->periode }}</option>
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
                <div class="form-group">
                  <div class="col-md-2">
                    <input type="submit" class="btn btn-md btn-primary w-100 mt-4" value="Simpan">
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
    </div>
</div>
@endsection