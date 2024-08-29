<?php

namespace App\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class SectorsChart extends Component
{
    public $selectedSektor = '';
    public $selectedPeriode = '';
    public $sectors = [];
    public $periodes = [];
    public $chartData = [];

    public function mount()
    {
        $this->sectors = DB::table('sektor')->get();
        $this->periodes = DB::table('periode')->get();
    }

    public function updatedSelectedSektor()
    {
        $this->updateChartData();
    }

    public function updatedSelectedPeriode()
    {
        $this->updateChartData();
    }

    public function updateChartData()
    {
        if ($this->selectedSektor && $this->selectedPeriode) {
            $data = DB::table('komoditas')
                ->join('jenis_komoditas', 'komoditas.jenis_id', '=', 'jenis_komoditas.id')
                ->where('jenis_komoditas.sektor_id', $this->selectedSektor)
                ->where('komoditas.periode_id', $this->selectedPeriode)
                ->get(['komoditas.nama_komoditas', 'komoditas.jumlah', 'komoditas.warna']);

            $this->chartData = [
                'labels' => $data->pluck('nama_komoditas')->toArray(),
                'datasets' => [
                    [
                        'label' => 'Data',
                        'backgroundColor' => $data->pluck('warna')->toArray(),
                        'borderColor' => $data->pluck('warna')->toArray(),
                        'data' => $data->pluck('jumlah')->toArray(),
                    ]
                ]
            ];
        } else {
            $this->chartData = [];
        }
    }

    public function render()
    {
        return view('livewire.sectors-chart');
    }
}
