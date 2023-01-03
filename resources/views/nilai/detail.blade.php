@extends('layouts.app')
@section('content')
    <div class="container mt-5">
        <div class="row small-screen-row mt-2">
            <div class="col-12 mb-4">
                <h3><a href="{{ url('soal') }}"><i class="bi bi-arrow-left"></i> </a> Data Pertanyaan</h3>
                <div class="card mb-4" style="border-radius: 25px;">
                    
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="table table-striped" style="text-align: center; width:100%;">
                                <thead>
                                    <tr>
                                        {{-- <th width="5px">No</th> --}}
                                    <th width="80%" class="text-start">Pertanyaan</th>
                                        {{-- <th width="10%">Poin</th>
                                        <th width="1px"></th>
                                        <th width="1px"></th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $k => $item)
                                        <tr style="vertical-align: middle;">
                                            {{-- <td>{{ $k + 1 }}</td> --}}
                                            <td>
                                                <div class="text-start">
                                                    <div class="row">
                                                        <div class="col-l2 mb-3">

                                                            <b>{{ $k + 1 }}. {{ $item->pertanyaan }}</b>

                                                        </div>
                                                        <div class="col-lg-12">
                                                            <ol type="A" style="margin-left: -13px;">
                                                                <li class="mb-1">
                                                                    {{ $item->jawaban_a }}
                                                                    @if ($item->jawaban_benar == 'A')
                                                                        <i class="text-success bi bi-check-circle"></i>
                                                                    @endif
                                                                    @if ($item->jawaban == 'A')
                                                                        <span class="badge bg-info">Jawaban Anda</span>
                                                                    @endif
                                                                </li>
                                                                <li class="mb-1">
                                                                    {{ $item->jawaban_b }}
                                                                    @if ($item->jawaban_benar == 'B')
                                                                        <i class="text-success bi bi-check-circle"></i>
                                                                    @endif
                                                                    @if ($item->jawaban == 'B')
                                                                    <span class="badge bg-info">Jawaban Anda</span>
                                                                @endif
                                                                </li>
                                                                <li class="mb-1">
                                                                    {{ $item->jawaban_c }}
                                                                    @if ($item->jawaban_benar == 'C')
                                                                        <i class="text-success bi bi-check-circle"></i>
                                                                    @endif
                                                                    @if ($item->jawaban == 'C')
                                                                    <span class="badge bg-info">Jawaban Anda</span>
                                                                @endif
                                                                </li>
                                                                <li class="mb-1">
                                                                    {{ $item->jawaban_d }}
                                                                    @if ($item->jawaban_benar == 'D')
                                                                        <i class="text-success bi bi-check-circle"></i>
                                                                    @endif
                                                                    @if ($item->jawaban == 'D')
                                                                    <span class="badge bg-info">Jawaban Anda</span>
                                                                @endif
                                                                </li>
                                                            </ol>

                                                            
                                                        </div>
                                                    </div>
                                                </div>

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
        $("#example").DataTable({
            "ordering": false,
        })

    </script>
@endpush
