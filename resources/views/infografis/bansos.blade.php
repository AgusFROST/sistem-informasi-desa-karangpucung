@extends('layouts.frontend')

@section('main')

@include('partials.frontend.menuInfografis')

<section id="bansos" class="bansos mt-5">
    <h2 class="h1 text-danger fw-bold text-uppercase">Jumlah Penerima Bansos</h2>
    <table class="table table-bordered">
        <thead class="table-success">
            <tr>
                <th>PENERIMA BANTUAN SOSIAL</th>
                <th>JUMLAH</th>
                <th>%</th>
            </tr>
        </thead>
        <tbody>
            @foreach($bansos as $item)
            <tr>
                <td>{{ $item->nama_bansos }}</td>
                <td>{{ number_format($item->jumlah) }} Keluarga</td>
                <td>{{ $total > 0 ? number_format(($item->jumlah / $total) * 100, 2) : 0 }} %</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot class="table-success">
            <tr>
                <th colspan="1" class="text-center">TOTAL PENERIMA BANTUAN SOSIAL</th>
                <th>{{ number_format($total) }} Keluarga</th>
                <th>100 %</th>
            </tr>
        </tfoot>
    </table>
</section>

@endsection
