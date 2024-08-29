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
                <h3>{{ $jumlah_komoditas_pertanian }}</h3>

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
                <h3>{{ $jumlah_komoditas_perkebunan }}</h3>

                <p>Sektor Perkebunan</p>
              </div>
              <div class="icon">
              </div>
              <a href="{{ route('index.sektor.perkebunan') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{ $jumlah_komoditas_perikanan }}</h3>

                <p>Sektor Perikanan</p>
              </div>
              <div class="icon">
              </div>
              <a href="{{ route('index.sektor.perikanan') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{ $jumlah_komoditas_peternakan }}</h3>

                <p>Sektor Peternakan</p>
              </div>
              <div class="icon">
              </div>
              <a href="{{ route('index.sektor.peternakan') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        
      </div><!-- /.container-fluid -->
    </section>
    <section class="col-lg-7 connectedSortable ui-sortable">
      <!-- Custom tabs (Charts with tabs)-->
      <div class="card" style="position: relative; left: 0px; top: 0px;">
        <div class="card-header ui-sortable-handle" style="cursor: move;">
          <h3 class="card-title">
            <i class="fas fa-chart-pie mr-1"></i>
            Komoditas Sektor
          </h3>
          <div class="card-tools">
          </div>
        </div><!-- /.card-header -->
        <div class="card-body">
          <div style="width: 100%; margin: auto;">
              <canvas id="myLineChart" style="height: 300px; display: block; width: 597px;" height="600" width="1194"></canvas>
          </div>
        </div><!-- /.card-body -->
      </div>
      <!-- /.card -->
      </div>
      <!-- /.card -->
    </section>

    
@endsection
@push('scripts')
    <script>
            $(document).ready(function(){
          const ctx = $('#myLineChart')[0].getContext('2d');

          const myLineChart = new Chart(ctx, {
              type: 'line',
              data: {
                  labels: [
                  @foreach ( $periode as $each )
                    {{ $each->periode }},
                  @endforeach    
                ],
                  datasets: [{
                      label: 'Pertanian',
                      data: [
                        @foreach ( $jumlah as $key => $value )
                        {{ $jumlah[$key] }},
                        @endforeach
                      ],
                      borderColor: 'rgba(75, 192, 192, 1)',
                      backgroundColor: 'rgba(75, 192, 192, 0.2)',
                      fill: true,
                      tension: 0.1,
                  },{
                    label: 'Perkebunan',
                      data: [
                        @foreach ( $jumlah1 as $key => $value )
                        {{ $jumlah1[$key] }},
                        @endforeach
                      ],
                      borderColor: 'rgba(0, 176, 47, 1)',
                      backgroundColor: 'rgba(38, 255, 96, 0.2)',
                      fill: true,
                      tension: 0.1,
                  },{
                    label: 'Perikanan',
                      data: [
                        @foreach ( $jumlah2 as $key => $value )
                        {{ $jumlah2[$key] }},
                        @endforeach
                      ],
                      borderColor: 'rgba(237, 174, 0, 1)',
                      backgroundColor: 'rgba(255, 216, 43, 0.2)',
                      fill: true,
                      tension: 0.1,
                    }]
              },
              options: {
                  responsive: true,
                  scales: {
                      x: {
                          beginAtZero: true
                      },
                      y: {
                          beginAtZero: true
                      }
                  }
              }
          });
      });
    </script>
@endpush