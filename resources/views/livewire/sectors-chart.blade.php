<div>
    <div>
        <label for="sector">Pilih Sektor:</label>
        <select id="sector" wire:model="selectedSektor">
            <option value="">Pilih Sektor</option>
            @foreach($sectors as $sector)
                <option value="{{ $sector->id }}">{{ $sector->nama_sektor }}</option>
            @endforeach
        </select>
    </div>

    <div>
        <label for="periode">Pilih Periode:</label>
        <select id="periode" wire:model="selectedPeriode">
            <option value="">Pilih Periode</option>
            @foreach($periodes as $periode)
                <option value="{{ $periode->id }}">{{ $periode->periode }}</option>
            @endforeach
        </select>
    </div>

    <div>
        @if($chartData)
            <canvas id="myChart"></canvas>
        @endif
    </div>

    @if($chartData)
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            document.addEventListener('livewire:load', function () {
                var ctx = document.getElementById('myChart').getContext('2d');
                var chartData = @json($chartData);
                new Chart(ctx, {
                    type: 'pie',  // Mengubah tipe chart menjadi 'pie'
                    data: chartData,
                    options: {
                        responsive: true,
                        plugins: {
                            legend: {
                                position: 'top',
                            },
                            tooltip: {
                                callbacks: {
                                    label: function(tooltipItem) {
                                        return tooltipItem.label + ': ' + tooltipItem.raw;
                                    }
                                }
                            }
                        }
                    }
                });
            });

            document.addEventListener('livewire:update', function () {
                var ctx = document.getElementById('myChart').getContext('2d');
                var chartData = @json($chartData);
                new Chart(ctx, {
                    type: 'pie',  // Mengubah tipe chart menjadi 'pie'
                    data: chartData,
                    options: {
                        responsive: true,
                        plugins: {
                            legend: {
                                position: 'top',
                            },
                            tooltip: {
                                callbacks: {
                                    label: function(tooltipItem) {
                                        return tooltipItem.label + ': ' + tooltipItem.raw;
                                    }
                                }
                            }
                        }
                    }
                });
            });
        </script>
    @endif
</div>
