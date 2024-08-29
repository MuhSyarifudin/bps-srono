<script>

@if ($sektor_id == 1)
$(document).ready(function() {
var ctx = $('#myPieChart');
var myPieChart = new Chart(ctx, {
type: 'pie', // jenis chart: pie
data: {
    labels: [
        @foreach ( $komoditas_sayuran as $each )
        '{{ $each->komoditas }}',
        @endforeach],
    datasets: [{
        label: '# of Votes',
        data: [
            @foreach ( $komoditas_sayuran as $each )
            '{{ $each->jumlah }}',
            @endforeach],
        backgroundColor: [
            @foreach ( $komoditas_sayuran as $each )
            '{{ $each->warna }}',
            @endforeach
        ],
        borderColor: [
            @foreach ( $komoditas_sayuran as $each )
            '{{ $each->warna }}',
            @endforeach
        ],
        borderWidth: 1
    }]
},
options: {
    devicePixelRatio: 4,
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
    labels: [
        @foreach ($komoditas_buah as $each )
            '{{ $each->komoditas }}',
            @endforeach
    ],
    datasets: [{
        label: '# of Votes',
        data: [
            @foreach ($komoditas_buah as $each )
                '{{ $each->jumlah }}',
            @endforeach
        ],
        backgroundColor: [
            @foreach ($komoditas_buah as $each )
            '{{ $each->warna }}',
            @endforeach
        ],
        borderColor: [
            @foreach ($komoditas_buah as $each )
            '{{ $each->warna }}',
            @endforeach
        ],
        borderWidth: 1
    }]
},
options: {
    devicePixelRatio: 4,
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
var ctx = $('#myPieChart3');
var myPieChart = new Chart(ctx, {
type: 'pie', // jenis chart: pie
data: {
    labels: [
        @foreach ($komoditas_biofarmaka as $each )
            '{{ $each->komoditas }}',
            @endforeach
    ],
    datasets: [{
        label: '# of Votes',
        data: [
            @foreach ($komoditas_biofarmaka as $each )
                '{{ $each->jumlah }}',
            @endforeach
        ],
        backgroundColor: [
            @foreach ($komoditas_biofarmaka as $each )
            '{{ $each->warna }}',
            @endforeach
        ],
        borderColor: [
            @foreach ($komoditas_biofarmaka as $each )
            '{{ $each->warna }}',
            @endforeach
        ],
        borderWidth: 1
    }]
},
options: {
    devicePixelRatio: 4,
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
var ctx = $('#myPieChart4');
var myPieChart = new Chart(ctx, {
type: 'pie', // jenis chart: pie
data: {
    labels: [
        @foreach ($komoditas_tanaman_hias as $each )
            '{{ $each->komoditas }}',
            @endforeach
    ],
    datasets: [{
        label: '# of Votes',
        data: [
            @foreach ($komoditas_tanaman_hias as $each )
                '{{ $each->jumlah }}',
            @endforeach
        ],
        backgroundColor: [
            @foreach ($komoditas_tanaman_hias as $each )
            '{{ $each->warna }}',
            @endforeach
        ],
        borderColor: [
            @foreach ($komoditas_tanaman_hias as $each )
            '{{ $each->warna }}',
            @endforeach
        ],
        borderWidth: 1
    }]
},
options: {
    devicePixelRatio: 4,
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
                        label += context.raw + ' tangkai';
                    }
                    return label;
                }
            }
        }
    }
}
});
});

@elseif ($sektor_id == 2)

    
$(document).ready(function() {
    var ctx = $('#myPieChart5');
    var myPieChart = new Chart(ctx, {
        type: 'pie', // jenis chart: pie
        data: {
    labels: [
        @foreach ( $komoditas_rempah as $each )
        '{{ $each->komoditas }}',
        @endforeach],
    datasets: [{
        label: '# of Votes',
        data: [
            @foreach ( $komoditas_rempah as $each )
            '{{ $each->jumlah }}',
            @endforeach],
        backgroundColor: [
            @foreach ( $komoditas_rempah as $each )
            '{{ $each->warna }}',
            @endforeach
        ],
        borderColor: [
            @foreach ( $komoditas_rempah as $each )
            '{{ $each->warna }}',
            @endforeach
        ],
        borderWidth: 1
    }]
},
options: {
    devicePixelRatio: 4,
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
    var ctx = $('#myPieChart6');
    var myPieChart = new Chart(ctx, {
    type: 'pie', // jenis chart: pie
    data: {
    labels: [
        @foreach ( $komoditas_kelapa as $each )
        '{{ $each->komoditas }}',
        @endforeach],
        datasets: [{
            label: '# of Votes',
            data: [
                @foreach ( $komoditas_kelapa as $each )
                '{{ $each->jumlah }}',
                @endforeach],
                backgroundColor: [
                    @foreach ( $komoditas_kelapa as $each )
                    '{{ $each->warna }}',
            @endforeach
        ],
        borderColor: [
            @foreach ( $komoditas_kelapa as $each )
            '{{ $each->warna }}',
            @endforeach
        ],
        borderWidth: 1
    }]
},
options: {
    devicePixelRatio: 4,
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
var ctx = $('#myPieChart7');
var myPieChart = new Chart(ctx, {
    type: 'pie', // jenis chart: pie
    data: {
        labels: [
            @foreach ( $komoditas_tembakau as $each )
            '{{ $each->komoditas }}',
            @endforeach],
            datasets: [{
                label: '# of Votes',
        data: [
            @foreach ( $komoditas_tembakau as $each )
            '{{ $each->jumlah }}',
            @endforeach],
            backgroundColor: [
                @foreach ( $komoditas_tembakau as $each )
                '{{ $each->warna }}',
                @endforeach
            ],
            borderColor: [
            @foreach ( $komoditas_tembakau as $each )
            '{{ $each->warna }}',
            @endforeach
        ],
        borderWidth: 1
    }]
},
options: {
    devicePixelRatio: 4,
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
    var ctx = $('#myPieChart8');
var myPieChart = new Chart(ctx, {
    type: 'pie', // jenis chart: pie
    data: {
        labels: [
            @foreach ( $komoditas_tanaman_pangan_industri as $each )
        '{{ $each->komoditas }}',
        @endforeach],
        datasets: [{
            label: '# of Votes',
            data: [
                @foreach ( $komoditas_tanaman_pangan_industri as $each )
            '{{ $each->jumlah }}',
            @endforeach],
            backgroundColor: [
                @foreach ( $komoditas_tanaman_pangan_industri as $each )
            '{{ $each->warna }}',
            @endforeach
        ],
        borderColor: [
            @foreach ( $komoditas_tanaman_pangan_industri as $each )
            '{{ $each->warna }}',
            @endforeach
        ],
        borderWidth: 1
    }]
},
options: {
    devicePixelRatio: 4,
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
@endif

$(document).ready(function() {
    var ctx = document.getElementById('myBarChart').getContext('2d');
    var myBarChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Sumbersari', 'Kepundungan ', 'Kebaman', 'Sukonatar', 'Bagorejo', 'Rejoagung','Wonosobo','Sukomaju','Parijatah Wetan','Parijatah Kulon'],
        datasets: [
            {
                label: 'Laki - laki',
                data: [4761, 3347, 7930, 2675, 6194, 4901, 6869, 4318, 4476, 3523],
                backgroundColor: 'rgba(51, 140, 184)',
                borderColor: 'rgba(51, 140, 184)',
                borderWidth: 1
            },
            {
                label: 'Perempuan',
                data: [5078, 3253, 8185, 2589, 6277, 4786, 6944, 4408, 4354, 3471],
                backgroundColor: 'rgba(230, 25, 83)',
                borderColor: 'rgba(230, 25, 83)',
                borderWidth: 1
            }
        ]
    },
    options: {
        devicePixelRatio: 4,
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});

});

$(document).ready(function() {
    var ctx = $('#jumlahSekolahChart')[0].getContext('2d');
    var jumlahSekolahChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['TK Negeri', 'TK Swasta', 'SD Negeri', 'SD Swasta'],
            datasets: [
                {
                    label: '2021/2022',
                    data: [0, 50, 43, 1],
                    backgroundColor: 'rgba(54, 162, 235, 1)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                },
                {
                    label: '2022/2023',
                    data: [0, 50, 43, 1],
                    backgroundColor: 'rgba(255, 99, 132, 1)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1
                }
            ]
        },
        options: {
            devicePixelRatio: 4,
            scales: {
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Jumlah Sekolah'
                    }
                },
                x: {
                    title: {
                        display: true,
                        text: 'Jenis Sekolah'
                    }
                }
            },
            plugins: {
                title: {
                    display: true,
                    text: 'Jumlah Sekolah di Kecamatan Srono per Periode'
                },
                tooltip: {
                    enabled: true
                }
            }
        }
    });
});


//untuk smooth scroll
$(document).ready(function() {
    $(window).scroll(function() {
        if ($(this).scrollTop() > 100) {
            $('#pushToTopBtn').fadeIn();
        } else {
            $('#pushToTopBtn').fadeOut();
        }
    });

    $('#pushToTopBtn').click(function() {
        $('html, body').animate({scrollTop: 0}, 800);
    });
});

$(document).ready(function(){
            $('a[href*="#"]').on('click', function(event) {
                if (this.hash !== "") {
                    event.preventDefault();
                    var hash = this.hash;

                    $('html, body').animate({
                        scrollTop: $(hash).offset().top
                    }, 800, function(){
                        window.location.hash = hash;
                    });
                }
            });
        });

</script>  
