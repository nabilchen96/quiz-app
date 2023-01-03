@extends('layouts.app')
@section('content')
    <div class="container mt-5">
        <div class="row small-screen-row mt-2">
            <div class="col-12 mb-4">
                @foreach ($data as $item)
                    <div class="card mb-4" style="border-radius: 25px;">
                        {{-- <div class="d-flex justify-content-end">
                            <button class="btn btn-info btn-sm mt-4 me-4 mb-0">Sesi: @php  echo date('d-m-Y H:i:s', $item->sesi ); @endphp</button>
                        </div> --}}
                        <div class="card-body">

                            <h5>Soal Ke {{ Request('page') == null ? '1' : Request('page') }}</h5>

                            <hr>


                            <h5>{{ $item->pertanyaan }}</h5>
                            <br>

                            <form id="form" method="post"
                                action="{{ url('store-kerjakan-soal') }}/{{ $soal_id }}?page={{ Request('page') }}">
                                @csrf
                                <input type="hidden" name="pertanyaan_id" value="{{ $item->id }}">
                                <ul style="list-style: none; margin-left: -33px;">
                                    <li class="mb-1">
                                        <input type="radio" value="A"
                                            onclick="document.getElementById('form').submit()"
                                            {{ $item->jawaban == 'A' ? 'checked' : '' }} name="jawaban" class="me-1">
                                        A. {{ $item->jawaban_a }}
                                    </li>
                                    <li class="mb-1">
                                        <input type="radio" value="B"
                                            onclick="document.getElementById('form').submit()"
                                            {{ $item->jawaban == 'B' ? 'checked' : '' }} name="jawaban" class="me-1"> B.
                                        {{ $item->jawaban_b }}
                                    </li>
                                    <li class="mb-1">
                                        <input type="radio" value="C"
                                            onclick="document.getElementById('form').submit()"
                                            {{ $item->jawaban == 'C' ? 'checked' : '' }} name="jawaban" class="me-1"> C.
                                        {{ $item->jawaban_c }}
                                    </li>
                                    <li class="mb-1">
                                        <input type="radio" value="D"
                                            onclick="document.getElementById('form').submit()"
                                            {{ $item->jawaban == 'D' ? 'checked' : '' }} name="jawaban" class="me-1"> D.
                                        {{ $item->jawaban_d }}
                                    </li>
                                </ul>
                            </form>
                            <br>
                            <a href="?page={{ Request('page') - 1 }}" class="btn btn-info btn-sm">Sebelumnya</a>
                            @if (Request('page') + 1 > $data->total())
                                <a href="{{ url('selesai-kerjakan-soal') }}" class="btn btn-info btn-sm">Selesai</a>
                            @else
                                <a href="?page={{ Request('page') + 1 }}" class="btn btn-info btn-sm">Selanjutnya</a>
                            @endif

                        </div>
                    </div>
                @endforeach
                <div class="card mb-4" style="border-radius: 25px;">
                    <div class="card-body">
                        <h5>Daftar Nomor</h5>
                        <div class="row d-flex justify-content-center">
                            @foreach ($num as $k => $item)
                                <a href="?page={{ $k + 1 }}" class="btn {{ $item->jawaban != null ? 'btn-primary' : 'btn-info' }} me-2 p-0" 
                                    id="tombol{{ $item->id }}" style="width: 40px; height: 40px; ">
                                    {{-- <a class="text-white" href="?page={{ $i }}">{{ $i }}</a> --}}
                                    <p style="margin-top: 20%; display: flex; justify-content: center;">
                                        {{ $k + 1 }}
                                    </p>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br><br><br>
    </div>
@endsection
