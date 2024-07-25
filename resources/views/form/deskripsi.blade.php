@extends('layouts.main')

@section('content')

<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12">
          <div class="card card-outline card-info">
            <div class="card-header">
              <h2 class="card-title">
                Deskripsi Website
              </h2>
            </div>
            <div class="card-body">
              <form action="{{ route('simpan.deskripsi') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <textarea id="summernote" spellcheck="false" cols="20" rows="20" name="deskripsi">
                  {{ $deskripsi->deskripsi }}
                </textarea>
                <div class="form-group">
                  <input type="file" class="form-control" id="InputPoster" name="poster">
                </div>
                <div class="form-group">
                  <div class="col-md-2">
                    <input type="submit" class="btn btn-md btn-primary w-100" value="Simpan">
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
    </div>
</div>
@endsection