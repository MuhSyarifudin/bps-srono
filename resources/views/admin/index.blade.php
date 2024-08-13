@extends('layouts.main')

@section('content')
<div class="content-wrapper" id="content">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <form action="{{ route('update.periode.dashboard') }}">
            <select name="periode" id="periode" class="form-control float-right" style="width: 100px" onchange="this.form.submit()">
              @foreach ($periode as $item)
              <option value="{{ $item->id }}" {{ $item->active == 1 ? 'selected' : '' }}>{{ $item->periode }}</option>
              @endforeach
            </select>
          </form>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{ $jumlah_seluruh_komoditas/1000 }} ton</h3>

                <p><b>Komoditas Pertanian</b></p>
              </div>
              <div class="icon">
                <ion-icon name="cube-outline"></ion-icon>
              </div>
              <a href="{{ route('index.sektor.pertanian') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>0</h3>

                <p>Sektor Perkebunan</p>
              </div>
              <div class="icon">
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>0</h3>

                <p>Sektor Perkebunan</p>
              </div>
              <div class="icon">
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>0</h3>

                <p>Pendidikan</p>
              </div>
              <div class="icon">
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <canvas id="lineChart" width="400" height="200"></canvas>
@endsection
@push('scripts')
    <script>
        // Mendefinisikan label dan data
        const labels = Utils.months({count: 7});
        const data = {
          labels: labels,
          datasets: [{
            label: 'My First Dataset',
            data: [65, 59, 80, 81, 56, 55, 40],
            fill: false,
            borderColor: 'rgb(75, 192, 192)',
            tension: 0.1
          }]
        };

            $(document).ready(function() {
        // Asumsikan ada elemen canvas dengan id 'myChart'
        var ctx = $('#lineChart');

        // Membuat chart menggunakan Chart.js
        var myChart = new Chart(ctx, {
          type: 'line',
          data: data,
          options: {
            devicePixelRatio: 4,
            responsive: true,
            title: {
              display: true,
              text: 'Custom Chart Title'
            }
          }
        });
      });
    </script>
@endpush