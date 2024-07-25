@extends('layouts.main')

@section('content')

<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12">
          <div class="card card-outline card-info">
            <div class="card-header">
              <h2 class="card-title">
                Edit Data Sektor Pertanian
              </h2>
            </div>
            <div class="card-body">
              <form action="{{ route('update.sektor.pertanian',['id'=>$komoditas->id]) }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="komoditas">Nama Komoditas : </label>
                    <input type="text" id="komoditas" name="komoditas" value="{{ $komoditas->komoditas }}" class="form-control @error('komoditas')
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
                        <option value="{{ $item->id }}" {{ $komoditas->periode_id == $item->id ? "selected" : "" }}>{{ $item->periode }}</option>
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
                        <option value="1" {{ $komoditas->jenis_id == 1 ? "selected" : "" }}>Sayuran</option>
                        <option value="2" {{ $komoditas->jenis_id == 2 ? "selected" : "" }}>Buah</option>
                        <option value="3" {{ $komoditas->jenis_id == 3 ? "selected" : "" }}>Biofarmaka</option>
                        <option value="4" {{ $komoditas->jenis_id == 4 ? "selected" : "" }}>Tanaman Hias</option>
                    </select>
                    @error('jenis')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="jumlah">Jumlah Komoditas : </label>
                    <input type="number" name="jumlah" id="jumlah" value="{{ $komoditas->jumlah }}" class="form-control @error('jumlah')
                        is-invalid
                    @enderror">
                    @error('jumlah')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="warna">Warna Diagram : </label>
                    <input type="color" name="warna" value="{{ $komoditas->warna }}" class="form-control @error('warna')
                    is-invalid                        
                    @enderror" id="warna" style="width: 120px;height:40px">
                    @error('warna')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                  <div class="col-md-4">
                    <input type="submit" class="btn btn-md btn-primary mt-4" value="Simpan">
                    <a href="{{ route('index.sektor.pertanian') }}" class="btn btn-md btn-dark mt-4">Kembali</a>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
    </div>
</div>
@endsection