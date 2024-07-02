<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title>BPS SRONO</title>
        
        @include('include.head')
        @livewireStyles
    </head>
    <body class="antialiased">
        <div>
            @include('navbar.navbar')
            <div class="container">
                <div class="geograph row">
                    <div class="col-md-5 py-5">
                        @cleanString($deskripsi->deskripsi)
                    </div>
                    <div class="col-md-5 px-6">
                        <img src="{{ asset('peta-srono.png') }}" alt="" class="map p-5">
                    </div>
                </div>
            </div>
            <div class="container-fluid populasi-container">
                <div class="container">
                    <div class="populasi row">
                        <div class="col-md-12">
                            <center>
                                <h2 id="populasi" class="heading mt-4">POPULASI</h2><br>
                                <h5>Tahun : 2022</h5>
                            </center>
                        </div>
                        <div class="col-md-10">
                            <canvas id="myBarChart" width="800" height="400"></canvas>
                        </div>
                        <div class="col-md-5">
                            <center>
                            <p><b>Laki - laki <br> 48.994</b></p>
                            </center>
                        </div>
                        <div class="col-md-5">
                            <center>
                            <p><b> Perempuan <br> 49.345</b></p>
                        </center>
                        </div>
                    </div>
            </div>
            </div>
            <div class="container">
                <div class="col-md-12">
                    <center>
                        <h2 class="heading mt-4" id="komoditas">KOMODITAS</h2>
                    </center>
                </div>
                <div class="col-md-12">
                    <center>
                        <form id="periodeForm" action="{{ route('tampilkan.per.periode') }}">
                            <div class="col-md-3">
                                <h5>
                                    Periode : 
                                </h5>
                            </div>
                            <div class="col-md-3">
                                <select class="form-control" name="periode" onchange="submitFormWithPeriode(this)">
                                    <option value="" >Pilih Periode</option>
                                    @foreach ($periode as $each)
                                    <option value="{{ $each->id }}" {{ $periode_id == $each->id ? 'selected' : '' }}>{{ $each->periode }}</option>                                        
                                    @endforeach
                                </select>
                            </div>
                        </form>
                    </center>
                </div>
                <div class="col-md-12">
                    <center>
                        <h4 class="mt-5">Sektor Pertanian</h4>
                    </center>
                </div>
                <div class="komoditas row">
                    <div class="col-md-5" style="align-content: center">
                        <center>
                            <h4>Sayuran (kg)</h4>
                        </center>
                        @if ($komoditas_sayuran->isEmpty())
                        <center>
                            <p>tidak ada data.</p>
                        </center>
                        @else
                        <canvas id="myPieChart" width="400" height="200"></canvas>
                        @endif
                    </div>
                    <div class="col-md-5" style="align-content: center">
                        <center>
                            <h4>Buah (kg)</h4>
                        </center>
                        @if($komoditas_buah->isEmpty())
                        <center>
                            <p>tidak ada data.</p>
                        </center>
                        @else 
                        <canvas id="myPieChart2" width="400" height="200"></canvas>
                        @endif
                    </div>
                </div>
                <div class="komoditas row mt-5">
                    <div class="col-md-5">
                        <center>
                            <h4>Biofarmaka (kg)</h4>
                        </center>
                        @if ($komoditas_biofarmaka->isEmpty())
                        <center>
                            <p>tidak ada data.</p>
                        </center>
                        @else
                        <canvas id="myPieChart3" width="400" height="200"></canvas>
                        @endif
                    </div>
                    <div class="col-md-5">
                        <center>
                            <h4>Tanaman Hias (tangkai)</h4>
                        </center>
                        @if ($komoditas_tanaman_hias->isEmpty())
                        <center>
                            <p>tidak ada data.</p>
                        </center>
                        @else
                        <canvas id="myPieChart4" width="400" height="200"></canvas>
                        @endif
                    </div>
                </div>

            </div>
            <button id="pushToTopBtn" title="Go to top">
                    <i class="fa-solid fa-arrow-up"></i>        
            </button>

        </div>
        @include('include.bottomBody2')
    </body>
</html>
