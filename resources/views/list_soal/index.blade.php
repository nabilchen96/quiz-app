@extends('layouts.app')
@section('content')
    <div class="container mt-5">
        <div class="row small-screen-row mt-2">
            <h3>
                <a href="{{ url('/') }}"><i class="bi bi-arrow-left"></i> </a> List Soal 🚀
            </h3>
            @foreach ($data as $item)
                <div class="col-lg-4">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="judul_berita">{{ $item->nama_soal }}</h5>
                            <hr>
                            <span> <i class="bi bi-box"></i> {{ $item->kategori_soal }} <br> <i
                                    class="bi bi-file-earmark-text"></i> {{ $item->total }} Soal</span> <br>
                            <a href="{{ url('kerjakan-soal') }}/{{ $item->id }}"
                                class="btn btn-sm btn-info mb-0 mt-3">Kerjakan</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <br><br><br>
    </div>
@endsection
