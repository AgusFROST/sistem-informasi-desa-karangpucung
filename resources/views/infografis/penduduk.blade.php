@extends('layouts.frontend')

@section('main')

@include('partials.frontend.menuInfografis')

<section id="penduduk" class="penduduk mt-5">
    <div class="row">
        <div class="col-lg-6">
            <h2 class="h1 text-danger fw-bold text-uppercase">Demografi Penduduk</h2>
            <p class="lead">Memberikan informasi lengkap mengenai karakteristik demografi penduduk suatu wilayah.
                Mulai
                dari jumlah penduduk, usia, jenis kelamin, tingkat pendidikan, pekerjaan, agama, dan aspek penting
                lainnya yang menggambarkan komposisi populasi secara rinci.
            </p>
        </div>
        <div class="col-lg-6">
            <img src="/assets/img/infografis/pen1.png" class="img-fluid" alt="Demografi Penduduk">
        </div>
    </div>
</section>

<section id="jumlahPenduduk" class="jumlah-penduduk mt-5">
    <h2 class="h1 text-danger fw-bold">Jumlah Penduduk dan Kepala Keluarga</h2>
    <div class="row row-cols-1 row-cols-md-2 g-4">
        @foreach ($admp as $adm)
        <div class="col">
            <div class="card mb-3">
                <div class="row g-0">
                    <div class="col-md-4 d-flex justify-content-center align-items-center">
                        <img src="/assets/img/infografis/icon-total-penduduk.svg" class="img-fluid" width="50%">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h2>Total Penduduk</h2>
                            <p class="fs-2">
                                <span class="text-danger">
                                    {{ $adm->penduduk }}
                                </span>
                                Jiwa
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card mb-3">
                <div class="row g-0">
                    <div class="col-md-4 d-flex justify-content-center align-items-center">
                        <img src="/assets/img/infografis/icon-kepala-keluarga.svg" class="img-fluid" width="50%">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h2>Kepala Keluarga</h2>
                            <p class="fs-2">
                                <span class="text-danger">
                                    {{ $adm->kepala_keluarga }}
                                </span>
                                Jiwa
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card mb-3">
                <div class="row g-0">
                    <div class="col-md-4 d-flex justify-content-center align-items-center">
                        <img src="/assets/img/infografis/icon-perempuan.svg" class="img-fluid" width="50%">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h2>Perempuan</h2>
                            <p class="fs-2">
                                <span class="text-danger">
                                    {{ $adm->perempuan }}
                                </span>
                                Jiwa
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card mb-3">
                <div class="row g-0">
                    <div class="col-md-4 d-flex justify-content-center align-items-center">
                        <img src="/assets/img/infografis/icon-laki.svg" class="img-fluid" width="50%">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h2>Laki - Laki</h2>
                            <p class="fs-2">
                                <span class="text-danger">
                                    {{ $adm->laki_laki }}
                                </span>
                                Jiwa
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>

<section id="berdasarkanUmur" class="berdasarkan-umur mt-5">
    <h2 class="h1 text-danger fw-bold">Berdasarkan Kelompok Umur</h2>
    <div class="bg-white rounded mb-4">
        <canvas id="piramidaPenduduk"></canvas>
    </div>

    <!-- Laki-Laki -->
    <div class="card mb-4 border-success">
        <div class="card-body">
            <p>
                Untuk jenis kelamin <b>laki-laki</b>, kelompok umur
                <b>{{ $lakiLakiTertinggi['umur'] }}</b> adalah kelompok umur tertinggi dengan jumlah
                <b>{{ $lakiLakiTertinggi['jumlah'] }}</b> orang atau
                <b>{{ number_format(($lakiLakiTertinggi['jumlah'] / array_sum($dataLakiLaki)) * 100, 2) }}%</b>. Sedangkan, kelompok umur
                <b>{{ $lakiLakiTerendah['umur'] }}</b> adalah yang terendah dengan jumlah <b>{{ $lakiLakiTerendah['jumlah'] }}</b> orang atau
                <b>{{ number_format(($lakiLakiTerendah['jumlah'] / array_sum($dataLakiLaki)) * 100, 2) }}%</b>.
            </p>
        </div>
    </div>

    <!-- Perempuan -->
    <div class="card mb-4 border-danger">
        <div class="card-body">
            <p>
                Untuk jenis kelamin <b>perempuan</b>, kelompok umur
                <b>{{ $perempuanTertinggi['umur'] }}</b> adalah kelompok umur tertinggi dengan jumlah
                <b>{{ $perempuanTertinggi['jumlah'] }}</b> orang atau
                <b>{{ number_format(($perempuanTertinggi['jumlah'] / array_sum($dataPerempuan)) * 100, 2) }}%</b>. Sedangkan, kelompok umur
                <b>{{ $perempuanTerendah['umur'] }}</b> adalah yang terendah dengan jumlah <b>{{ $perempuanTerendah['jumlah'] }}</b> orang atau
                <b>{{ number_format(($perempuanTerendah['jumlah'] / array_sum($dataPerempuan)) * 100, 2) }}%</b>.
            </p>
        </div>
    </div>

    </div>

</section>

<section id="berdasarkanPendidikan" class="berdasarkan-pendidikan mt-5">
    <h2 class="h1 text-danger fw-bold">Berdasarkan Pendidikan</h2>
    <div class="bg-white rounded">
        <!-- Canvas untuk chart -->
        <canvas id="chartPendidikan"></canvas>
    </div>
</section>

<section id="berdasarkanPekerjaan" class="berdasarkan-pekerjaan mt-5">
    <h2 class="h1 text-danger fw-bold">Berdasarkan Pekerjaan</h2>

    <table class="table table-hover table-striped table-bordered">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Pekerjaan</th>
                <th scope="col">Jumlah</th>
                <th scope="col">%</th>
            </tr>
        </thead>
        <tbody>
            @php $no = 1; @endphp
            @foreach($pekerjaanData as $pekerjaan)
            <tr>
                <th scope="row">{{ $no++ }}</th>
                <td>{{ $pekerjaan->name }}</td>
                <td>{{ $pekerjaan->jumlah }} Orang</td>
                <td>{{ number_format($pekerjaan->persentase, 2) }} %</td>
            </tr>
            @endforeach
        </tbody>
    </table>

</section>

<section id="berdasarkanPerkawinan" class="berdasarkan-perkawinan mt-5">
    <h2 class="h1 text-danger fw-bold">Berdasarkan Perkawinan</h2>
    <div class="row row-cols-1 row-cols-md-2 g-4">
        @foreach ($admp as $adm)
        <div class="col">
            <div class="card mb-3">
                <div class="row g-0">
                    <div class="col-md-4 d-flex justify-content-center align-items-center">
                        <img src="/assets/img/perkawinan/icon-belum-kawin.svg" class="img-fluid" width="50%">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h2>Belum Menikah</h2>
                            <p class="fs-2 fw-bold">
                                <span class="text-danger">
                                    {{ $adm->belum_menikah }}
                                </span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card mb-3">
                <div class="row g-0">
                    <div class="col-md-4 d-flex justify-content-center align-items-center">
                        <img src="/assets/img/perkawinan/icon-kawin.svg" class="img-fluid" width="50%">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h2>Menikah</h2>
                            <p class="fs-2 fw-bold">
                                <span class="text-danger">
                                    {{ $adm->menikah }}
                                </span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card mb-3">
                <div class="row g-0">
                    <div class="col-md-4 d-flex justify-content-center align-items-center">
                        <img src="/assets/img/perkawinan/icon-cerai-hidup.svg" class="img-fluid" width="50%">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h2>Cerai Hidup</h2>
                            <p class="fs-2 fw-bold">
                                <span class="text-danger">
                                    {{ $adm->cerai_hidup }}
                                </span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card mb-3">
                <div class="row g-0">
                    <div class="col-md-4 d-flex justify-content-center align-items-center">
                        <img src="/assets/img/perkawinan/icon-cerai-mati.svg" class="img-fluid" width="50%">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h2>Cerai Mati</h2>
                            <p class="fs-2 fw-bold">
                                <span class="text-danger">
                                    {{ $adm->cerai_mati }}
                                </span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>

<section id="berdasarkanAgama" class="berdasarkan-agama mt-5 mb-5">
    <h2 class="h1 text-danger fw-bold">Berdasarkan Agama</h2>
    <div class="row">
        <div class="col-lg-4">
            <div class="bg-white rounded mb-4">
                <canvas id="chartAgama"></canvas>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="bg-white rounded p-3">
                <table class="table table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th>No</th>
                            <th>Agama</th>
                            <th>Jumlah</th>
                            <th>%</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $total = $agamaData->sum('jumlah'); // Menghitung total jumlah agama
                        $no = 1;
                        @endphp
                        @foreach ($agamaData as $agama)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $agama->name }}</td>
                            <td>{{ $agama->jumlah }}</td>
                            <td>{{ $total > 0 ? number_format(($agama->jumlah / $total) * 100, 2) : 0 }}%</td>
                        </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    </div>

</section>


@endsection

@section('chart')

<script>
    const kelompokUmur = @json($kelompokUmur);
    const dataLakiLaki = @json($dataLakiLaki);
    const dataPerempuan = @json($dataPerempuan);

    const warnaLakiLaki = 'rgba(54, 162, 235, 0.7)';
    const warnaPerempuan = 'rgba(255, 99, 132, 0.7)';

    const borderLakiLaki = warnaLakiLaki.replace('0.7', '1');
    const borderPerempuan = warnaPerempuan.replace('0.7', '1');

    const dataPiramidaPenduduk = {
        labels: kelompokUmur,
        datasets: [{
                label: 'Laki-Laki',
                data: dataLakiLaki,
                backgroundColor: warnaLakiLaki,
                borderColor: borderLakiLaki,
                borderWidth: 1,
            },
            {
                label: 'Perempuan',
                data: dataPerempuan,
                backgroundColor: warnaPerempuan,
                borderColor: borderPerempuan,
                borderWidth: 1,
            }
        ]
    };
    // Ambil data agama dari controller
    const agamaData = @json($agamaData);

    // Pisahkan labels dan values
    const agamaLabels = agamaData.map(item => item.name);
    const agamaValues = agamaData.map(item => item.jumlah);

    const agamaColors = [
        'rgba(255, 99, 132, 0.7)', // Merah muda
        'rgba(54, 162, 235, 0.7)', // Biru
        'rgba(255, 206, 86, 0.7)', // Kuning
        'rgba(75, 192, 192, 0.7)', // Hijau
        'rgba(153, 102, 255, 0.7)', // Ungu
        'rgba(255, 159, 64, 0.7)', // Oranye
        'rgba(0, 0, 0, 0.7)' // Hitam
    ];

    const borderColors = agamaColors.map(color => color.replace('0.7', '1'));

    // Data untuk Chart Agama
    const dataAgama = {
        labels: agamaLabels,
        datasets: [{
            label: 'Jumlah Pemeluk',
            data: agamaValues,
            backgroundColor: agamaColors,
            borderColor: borderColors,
            borderWidth: 1
        }]
    };

    // Konfigurasi Chart Agama
    const configAgama = {
        type: 'pie', // Bisa diganti dengan 'doughnut'
        data: dataAgama,
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            const total = context.dataset.data.reduce((a, b) => a + b, 0);
                            const percentage = ((context.raw / total) * 100).toFixed(2);
                            return `${context.label}: ${context.raw} (${percentage}%)`;
                        }
                    }
                }
            }
        }
    };



    // Konfigurasi chart
    const configPiramidaPenduduk = {
        type: 'bar',
        data: dataPiramidaPenduduk,
        options: {
            indexAxis: 'y',
            responsive: true,
            plugins: {
                legend: {
                    display: true,
                    position: 'top'
                },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            return `${context.dataset.label}: ${Math.abs(context.raw)}`;
                        }
                    }
                }
            },
            scales: {
                x: {
                    title: {
                        display: true,
                        text: 'Jumlah Penduduk'
                    },
                    ticks: {
                        callback: value => Math.abs(value)
                    }
                },
                y: {
                    title: {
                        display: true,
                        text: 'Kelompok Umur'
                    }
                }
            }
        },
    };

    // Inisialisasi chart
    window.onload = function() {
        const ctx1 = document.getElementById('piramidaPenduduk').getContext('2d');
        new Chart(ctx1, configPiramidaPenduduk);

        const ctx2 = document.getElementById('chartPendidikan').getContext('2d');
        new Chart(ctx2, configPendidikan);

        const ctxAgama = document.getElementById('chartAgama').getContext('2d');
        new Chart(ctxAgama, configAgama);
    };

    // Ambil data pendidikan dari controller
    const pendidikanData = @json($pendidikanData);

    const labelsPendidikan = pendidikanData.map(item => item.name);
    const dataPendidikan = {
        labels: labelsPendidikan,
        datasets: [{
            label: 'Jumlah Orang',
            data: pendidikanData.map(item => item.jumlah), // Ambil jumlah dari database
            backgroundColor: 'rgba(220, 53, 69, 0.8)',
            borderColor: 'rgba(220, 53, 69, 1)',
            borderWidth: 1
        }]
    };

    const configPendidikan = {
        type: 'bar',
        data: dataPendidikan,
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 100
                    }
                }
            }
        }
    };
</script>
@endsection
