@extends('layouts.app')
@section('content')
    <div class="container mt-5">
        <div class="row small-screen-row mt-2">
            <div class="col-12 mb-4">
                <h3><a href="{{ url('/') }}"><i class="bi bi-arrow-left"></i> </a> Data Nilai 🏆</h3>
                <div class="card mb-4" style="border-radius: 25px;">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="table table-striped" style="text-align: center; width:100%;">
                                <thead>
                                    <tr>
                                        <th width="5px">No</th>
                                        <th width="50%">Nama Soal</th>
                                        <th>Total Soal</th>
                                        <th>Score</th>
                                        <th width="1px"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $k => $item)
                                        <tr>
                                            <td>{{ $k+1 }}</td>
                                            <td>{{ $item->nama_soal }}</td>
                                            <td>{{ $item->total_soal }} Soal</td>
                                            <td> {{ $item->jawaban_benar }} / {{ $item->total_poin }}</td>
                                            <td>
                                                <a href="{{ url('detail-nilai') }}/{{ $item->sesi }}">
                                                    <i class="bi bi-ui-checks-grid text-info" style="font-size: 20px;"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br><br><br>
    </div>
@endsection
@push('script')
    <script>
        $("#example").DataTable({})
    </script>
@endpush
