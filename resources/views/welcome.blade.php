<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.2/js/bootstrap.min.js">
        <link rel="stylesheet" href="{{ url('assets/bootstrap-4.6.2-dist/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ url('assets/fontawesome-free-6.5.2-web/css/all.min.css') }}">
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <!-- Styles -->
        <style>
            *{
                font-family: inter,sans-serif;
                margin: 0px auto;
            }
            .logo {
                width: 86px;
                height: 108px;
                margin-left: 17px;
            }
            .navbar {
                width: 100%;
                height: 117px;
                color: white;
                background-image: linear-gradient(#039E25,#0d5f1f);
            }
            .heading {
                font-weight: 800;
                text-shadow: 0.3px 0.3px black;
            }
            .populasi {
                height: 651px;
                background-color: rgb(231, 229, 229);
            }
            .populasi-container {
                background-color: rgb(231, 229, 229);
            }
            .geograph {
                width: 100%;
                height: 651px;
                background-color: white;
                font-weight: 500;
                text-shadow: 0.3px 0.3px black;
            }
            .komoditas {
                height: 651px;
                background-color: white;
            }
            .map {
                width: 525px;
                height: 479px;
            }
            ul > li {
                padding: 10px;
                display: inline;
            }
            ul > li:hover {
                background-color: #23B90B;
                border-bottom: 8px solid rgb(123, 255, 118);
            }
            ul > li > a {
                color: white;
                text-shadow: 2px 2px black;
            }
            ul > li > a:hover {
                text-decoration: none;
                text-shadow: 2px 2px black;
                color: beige;
            }
            #pushToTopBtn {
            display: none; /* Sembunyikan tombol pada awalnya */
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 99;
            cursor: pointer;
            padding: 10px;
            color: black;
            border-radius: 80px;
            font-size: 22pt;
            border: none;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            text-align: center;
        }
        #pushToTopBtn:hover {
            background-color: white;
            color: black;
        }
        /* CSS untuk ikon panah */
        .fa-arrow-up {
            margin-right: 5px;
        }
</style>
    </head>
    <body class="antialiased">
        <div>
            <div class="navbar navbar-menu" id="navbar-menu">
                <img src="{{ asset('logo.png') }}" class="logo mr-1" alt="">
                <div class="col-md-8 ml-0 mt-5">
                    <ul style="list-style: none;font-weight: 600;display: inline;">
                        <li><a href="#">HOME</a></li>
                        <li><a href="#populasi">POPULASI</a></li>
                        <li><a href="#komoditas">KOMODITAS</a></li>
                    </ul>
                </div>
            </div>
            <div class="container">
                <div class="geograph row">
                    <div class="col-md-5 py-5">
                        <h2 class="heading">KECAMATAN SRONO</h2><br>
                        <p><b>Kecamatan Srono memiliki letak geografis yang strategis dengan pemandangan alam yang indah. Berbatasan dengan beberapa kecamatan lain di Kabupaten Banyuwangi, Srono memiliki akses yang baik ke berbagai daerah di sekitarnya. Wilayahnya terdiri dari dataran rendah dan beberapa area pertanian yang subur.</b></p>
                        <h3><b>Luas Daerah</b></h3>
                        <p><b>Pada Tahun 2022, Luas daerah yang dimiliki Kecamatan 
                            Srono saat ini 100,77 km<sup>2</sup> yang dibagi ke 10 desa. 
                        Sumbersari 12,12 Km<sup>2</sup>, Kepundungan 10,6 Km<sup>2</sup>, Kebaman 12,64 Km<sup>2</sup>, Sukonatar 8,33 Km<sup>2</sup>, Bagorejo 9.27 Km<sup>2</sup>, Rejoagung 9,73 Km<sup>2</sup>, Wonosobo 15,59 Km<sup>2</sup>, Sukomaju 7,85 Km<sup>2</sup>, Parijatah Wetan 7,51 Km<sup>2</sup>, Parijatah Kulon 7,67 Km<sup>2</sup> </b></p>
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
                                <h2 id="populasi" class="heading mt-4">POPULASI</h2>
                                {{-- <p><b> di Kecamatan Srono dari 10 desa 
                                    berjumlah 98 339, yang terdiri dari laki-laki 
                                    berjumlah 48 994 dan perempuan 49 345</b></p> --}}
                            </center>
                        </div>
                        <div class="col-md-5">
                            <center>
                                <img src="{{ asset('men.svg') }}" alt="svg">
                            <br><p><b>Laki - laki <br> 48.994</b></p>
                            </center>
                        </div>
                        <div class="col-md-5"><center>
                            <img src="{{ asset('women.svg') }}" alt="svg">
                            <p><b> Perempuan <br> 49.345</b></p></center>
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
                        <form action="">
                            <div class="col-md-3">
                                <h5>
                                    Periode : 
                                </h5>
                            </div>
                            <div class="col-md-3">
                                <select class="form-control">
                                    <option value="">2020</option>
                                    <option value="">2021</option>
                                    <option value="">2022</option>
                                    <option value="">2023</option>
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
                <div class="komoditas row mt-5">
                    <div class="col-md-5">
                        <center>
                            <h4>Sayuran (kuintal)</h4>
                        </center>
                        <canvas id="myPieChart" width="400" height="200"></canvas>
                    </div>
                    <div class="col-md-5">
                        <center>
                            <h4>Buah - buahan (kuintal)</h4>
                        </center>
                        <canvas id="myPieChart2" width="400" height="200"></canvas>
                    </div>
                </div>
                
                <div class="komoditas row mt-5">
                    <div class="col-md-5">
                        <center>
                            <h4>Sayuran (kuintal)</h4>
                        </center>
                        <canvas id="myPieChart" width="400" height="200"></canvas>
                    </div>
                    <div class="col-md-5">
                        <center>
                            <h4>Buah - buahan (kuintal)</h4>
                        </center>
                        <canvas id="myPieChart2" width="400" height="200"></canvas>
                    </div>
                </div>

            </div>
            <button id="pushToTopBtn" title="Go to top">
                    <i class="fa-solid fa-arrow-up"></i>        
            </button>

        </div>
        <script>
            $(document).ready(function() {
              $('a[href*="#"]').on('click', function(event) {
                event.preventDefault();
          
                $('html, body').animate({
                  scrollTop: $($(this).attr('href')).offset().top
                }, 600); // Duration of the animation in milliseconds
              });
            });

            $(document).ready(function() {
        var $carouselInner = $('.carousel-inner');
        var $carouselItems = $('.carousel-item');
        var totalItems = $carouselItems.length;
        var currentIndex = 0;

        $('#nextBtn').on('click', function() {
            currentIndex = (currentIndex + 1) % totalItems;
            updateCarousel();
        });

        $('#prevBtn').on('click', function() {
            currentIndex = (currentIndex - 1 + totalItems) % totalItems;
            updateCarousel();
        });

        function updateCarousel() {
            var offset = -currentIndex * 100;
            $carouselInner.css('transform', 'translateX(' + offset + '%)');
        }

        $(document).ready(function() {
    var ctx = $('#myPieChart');
    var myPieChart = new Chart(ctx, {
        type: 'pie', // jenis chart: pie
        data: {
            labels: ['Bawang Merah', 'Cabai Besar', 'Cabai Rawit', 'Bawang Putih', 'Kentang', 'Kubis', 'Kacang Panjang', 'Tomat'],
            datasets: [{
                label: '# of Votes',
                data: [6623, 4900, 8382, 0, 0, 0, 0, 0],
                backgroundColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)',
                    'rgba(255, 159, 64, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)',
                    'rgba(255, 159, 64, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            let label = context.label || '';
                            if (label) {
                                label += ': ';
                            }
                            if (context.raw !== null) {
                                label += context.raw + ' kg';
                            }
                            return label;
                        }
                    }
                }
            }
        }
    });
});



    $(document).ready(function() {
    var ctx = $('#myPieChart2');
    var myPieChart = new Chart(ctx, {
        type: 'pie', // jenis chart: pie
        data: {
            labels: ['Semangka', 'Melon'],
            datasets: [{
                label: '# of Votes',
                data: [115, 0],
                backgroundColor: [
                    'rgba(255, 99, 132, 1)', // Solid color for Semangka
                    'rgba(54, 162, 235, 1)'  // Solid color for Melon
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)', // Same solid color for Semangka border
                    'rgba(54, 162, 235, 1)'  // Same solid color for Melon border
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            let label = context.label || '';
                            if (label) {
                                label += ': ';
                            }
                            if (context.raw !== null) {
                                label += context.raw + ' kg';
                            }
                            return label;
                        }
                    }
                }
            }
        }
    });
});


    });


     // jQuery code for handling the button behavior
     $(document).ready(function() {
            // Show or hide the button based on scroll position
            $(window).scroll(function() {
                if ($(this).scrollTop() > 100) {
                    $('#pushToTopBtn').fadeIn();
                } else {
                    $('#pushToTopBtn').fadeOut();
                }
            });

            // Smooth scroll to top when button is clicked
            $('#pushToTopBtn').click(function() {
                $('html, body').animate({scrollTop: 0}, 800);
            });
        });
          </script>
    </body>
</html>
