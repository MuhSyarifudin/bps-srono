<script>
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

function submitFormWithPeriode(selectElement) {
var form = document.getElementById('periodeForm');
var selectedValue = selectElement.value;
var routeTemplate = "{{ route('tampilkan.per.periode', ['periode' => ':periode']) }}";
var actionUrl = routeTemplate.replace(':periode', selectedValue) + "#komoditas";
form.action = actionUrl;
form.submit();
}

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
