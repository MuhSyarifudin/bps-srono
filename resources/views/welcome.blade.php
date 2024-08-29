<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title>BPS SRONO</title>
        
        @include('include.head')
        <style>
             .dashed-border {
            border: 2px dashed black; /* Mengatur garis putus-putus dengan warna hitam */
            padding: 20px; /* Memberikan sedikit ruang di dalam div */
            width: 300px; /* Lebar div */
            text-align: center; /* Mengatur teks di tengah */
            }
        </style>
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
                        <img src="{{ asset(''.$deskripsi->image.'') }}" alt="" class="map p-5">
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
                <div class="d-flex justify-content-center">
                    <center>
                        <form id="periodeForm" action="{{ route('tampilkan.per.periode') }}#komoditas">
                            <div class="col-md-3">
                                <h5>
                                    Periode:
                                </h5>
                            </div>
                            <div class="form-row align-items-center">
                                    <div class="col-auto m-0">
                                        <select class="form-control" name="sektor">
                                            <option value="">Pilih Sektor</option>
                                            @foreach ($sektor as $each)
                                                <option value="{{ $each->id }}" {{ $sektor_id == $each->id ? 'selected' : '' }}>Sektor {{ ucwords($each->nama_sektor) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-auto m-0">
                                        <select class="form-control" name="periode">
                                            <option value="" >Pilih Periode</option>
                                            @foreach ($periode as $each)
                                            <option value="{{ $each->id }}" {{ $periode_id == $each->id ? 'selected' : '' }}>{{ $each->periode }}</option>                                        
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-auto m-0">
                                        <button class="btn btn-sm btn-primary" type="submit"><i class="fas fa-search"></i></button>
                                    </div>
                            </div>
                        </form>
                    </center>
                </div>
                <div class="col-md-12">
                @if ($sektor_id == 1)
                        <center>
                            <h4 class="mt-5">Sektor Pertanian</h4>
                        </center>
                    </div>
                    <div class="komoditas row">
                        <div class="col-md-5" style="align-content: center">
                            <center>
                                <h4>Sayuran (kg)</h4>
                            </center>
                            @if (komoditas_pertanian($periode_id,1)->isEmpty())
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
                            @if(komoditas_pertanian($periode_id,2)->isEmpty())
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
                            @if (komoditas_pertanian($periode_id,3)->isEmpty())
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
                            @if (komoditas_pertanian($periode_id,4)->isEmpty())
                            <center>
                                <p>tidak ada data.</p>
                            </center>
                            @else
                            <canvas id="myPieChart4" width="400" height="200"></canvas>
                            @endif
                        </div>
                @elseif ($sektor_id == 2)

                <center>
                    <h4 class="mt-5">Sektor Perkebunan</h4>
                </center>
            </div>
            <div class="komoditas row">
                <div class="col-md-5" style="align-content: center">
                    <center>
                        <h4>Rempah-rempah (kg)</h4>
                    </center>
                    @if (komoditas_perkebunan($periode_id,5)->isEmpty())
                    <center>
                        <p>tidak ada data.</p>
                    </center>
                    @else
                    <canvas id="myPieChart5" width="400" height="200"></canvas>
                    @endif
                </div>
                <div class="col-md-5" style="align-content: center">
                    <center>
                        <h4>Kelapa (kg)</h4>
                    </center>
                    @if(komoditas_perkebunan($periode_id,6)->isEmpty())
                    <center>
                        <p>tidak ada data.</p>
                    </center>
                    @else 
                    <canvas id="myPieChart6" width="400" height="200"></canvas>
                    @endif
                </div>
            </div>
            <div class="komoditas row mt-5">
                <div class="col-md-5">
                    <center>
                        <h4>Tembakau (kg)</h4>
                    </center>
                    @if (komoditas_perkebunan($periode_id,7)->isEmpty())
                    <center>
                        <p>tidak ada data.</p>
                    </center>
                    @else
                    <canvas id="myPieChart7" width="400" height="200"></canvas>
                    @endif
                </div>
                <div class="col-md-5">
                    <center>
                        <h4>Tanaman Pangan & Industri (kg)</h4>
                    </center>
                    @if (komoditas_perkebunan($periode_id,8)->isEmpty())
                    <center>
                        <p>tidak ada data.</p>
                    </center>
                    @else
                    <canvas id="myPieChart8" width="400" height="200"></canvas>
                    @endif
                </div>

                @elseif ($sektor_id == 3)

                <center>
                    <h4 class="mt-5">Sektor Perikanan</h4>
                </center>
            </div>
            <div class="komoditas row">
                <div class="col-md-5" style="align-content: center">
                    <center>
                        <h4>Rempah-rempah (kg)</h4>
                    </center>
                    @if (komoditas_perikanan($periode_id,9)->isEmpty())
                    <center>
                        <p>tidak ada data.</p>
                    </center>
                    @else
                    <canvas id="myPieChart5" width="400" height="200"></canvas>
                    @endif
                </div>
                <div class="col-md-5" style="align-content: center">
                    <center>
                        <h4>Kelapa (kg)</h4>
                    </center>
                    @if(komoditas_perikanan($periode_id,10)->isEmpty())
                    <center>
                        <p>tidak ada data.</p>
                    </center>
                    @else 
                    <canvas id="myPieChart6" width="400" height="200"></canvas>
                    @endif
                </div>
            </div>
            <div class="komoditas row mt-5">
                <div class="col-md-5">
                    <center>
                        <h4>Tembakau (kg)</h4>
                    </center>
                    @if (komoditas_perikanan($periode_id,11)->isEmpty())
                    <center>
                        <p>tidak ada data.</p>
                    </center>
                    @else
                    <canvas id="myPieChart7" width="400" height="200"></canvas>
                    @endif
                </div>
                <div class="col-md-5">
                    <center>
                        <h4>Tanaman Pangan & Industri (kg)</h4>
                    </center>
                    @if (komoditas_perikanan($periode_id,12)->isEmpty())
                    <center>
                        <p>tidak ada data.</p>
                    </center>
                    @else
                    <canvas id="myPieChart8" width="400" height="200"></canvas>
                    @endif
                </div>

                @elseif ($sektor_id == 4)

                <center>
                    <h4 class="mt-5">Sektor Peternakan</h4>
                </center>
            </div>
            <div class="komoditas row">
                <div class="col-md-5" style="align-content: center">
                    <center>
                        <h4>Ternak (ekor)</h4>
                    </center>
                    @if (komoditas_peternakan($periode_id,13)->isEmpty())
                    <center>
                        <p>tidak ada data.</p>
                    </center>
                    @else
                    <canvas id="myPieChart5" width="400" height="200"></canvas>
                    @endif
                </div>
                <div class="col-md-5" style="align-content: center">
                    <center>
                        <h4>Unggas (ekor)</h4>
                    </center>
                    @if(komoditas_peternakan($periode_id,14)->isEmpty())
                    <center>
                        <p>tidak ada data.</p>
                    </center>
                    @else 
                    <canvas id="myPieChart6" width="400" height="200"></canvas>
                    @endif
                </div>
            </div>
            </div>
                @else
                <div class="komoditas d-flex">
                    <div class="align-self-center"><h4 class=" dashed-border my-5">Belum pilih Sektor !</h4></div>
                </div>
                @endif
                </div>
            </div>
            <div class="container-fluid penduduk-container">
                <div class="col-md-10 pt-4 penduduk">
                    <center>
                        <h2 class="heading" id="pendidikan" >PENDIDIKAN</h2>
                    </center>
                </div>
                <div class="col-md-12">
                    <canvas id="jumlahSekolahChart" width="600" height="400"></canvas>
                </div>
            </div>
            <button id="pushToTopBtn" title="Go to top">
                    <i class="fa-solid fa-arrow-up"></i>        
            </button>

        </div>
        @include('include.bottomBody2')
    </body>
</html>
