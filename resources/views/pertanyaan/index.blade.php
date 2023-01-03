@extends('layouts.app')
@section('content')
    <div class="container mt-5">
        <div class="row small-screen-row mt-2">
            <div class="col-12 mb-4">
                <h3><a href="{{ url('soal') }}"><i class="bi bi-arrow-left"></i> </a> Data Pertanyaan</h3>
                <div class="card mb-4" style="border-radius: 25px;">
                    <div class="card-header">
                        <button class="btn-sm btn btn-info" data-bs-toggle="modal" data-bs-target="#modal">
                            Tambah
                        </button>
                    </div>
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
                                                                </li>
                                                                <li class="mb-1">
                                                                    {{ $item->jawaban_b }}
                                                                    @if ($item->jawaban_benar == 'B')
                                                                        <i class="text-success bi bi-check-circle"></i>
                                                                    @endif
                                                                </li>
                                                                <li class="mb-1">
                                                                    {{ $item->jawaban_c }}
                                                                    @if ($item->jawaban_benar == 'C')
                                                                        <i class="text-success bi bi-check-circle"></i>
                                                                    @endif
                                                                </li>
                                                                <li class="mb-1">
                                                                    {{ $item->jawaban_d }}
                                                                    @if ($item->jawaban_benar == 'D')
                                                                        <i class="text-success bi bi-check-circle"></i>
                                                                    @endif
                                                                </li>
                                                            </ol>

                                                            <span class="badge bg-info">Poin: {{ $item->poin }}</span>

                                                             <a data-bs-toggle="modal"
                                                                data-bs-target="#modal" data-bs-id="{{ $item->id }}"
                                                                data-bs-pertanyaan="{{ $item->pertanyaan }}"
                                                                data-bs-jenis_soal="{{ $item->jenis_soal }}"
                                                                data-bs-jawaban_a="{{ $item->jawaban_a }}"
                                                                data-bs-jawaban_b="{{ $item->jawaban_b }}"
                                                                data-bs-jawaban_c="{{ $item->jawaban_c }}"
                                                                data-bs-jawaban_d="{{ $item->jawaban_d }}"
                                                                data-bs-jawaban_benar="{{ $item->jawaban_benar }}"
                                                                data-bs-poin="{{ $item->poin }}"
                                                                href="javascript:void(0)">
                                                                <i style="font-size: 18px;" class="text-success bi bi-grid ms-2 me-2"></i>
                                                            </a> <a href="javascript:void(0)"
                                                                onclick="hapusData({{ $item->id }})">
                                                                <i style="font-size: 18px;" class="text-danger bi bi-trash"></i>
                                                            </a> <br>
                                                        </div>
                                                    </div>
                                                </div>

                                            </td>
                                            {{-- <td>{{ $item->poin }}</td>
                                            <td>
                                                <a data-bs-toggle="modal" data-bs-target="#modal"
                                                    data-bs-id="{{ $item->id }}"
                                                    data-bs-pertanyaan="{{ $item->pertanyaan }}"
                                                    data-bs-jenis_soal="{{ $item->jenis_soal }}"
                                                    data-bs-jawaban_a="{{ $item->jawaban_a }}"
                                                    data-bs-jawaban_b="{{ $item->jawaban_b }}"
                                                    data-bs-jawaban_c="{{ $item->jawaban_c }}"
                                                    data-bs-jawaban_d="{{ $item->jawaban_d }}"
                                                    data-bs-jawaban_benar="{{ $item->jawaban_benar }}"
                                                    data-bs-poin="{{ $item->poin }}" href="javascript:void(0)">
                                                    <i style="font-size: 1.5rem;" class="text-success bi bi-grid"></i>
                                                </a>
                                            </td>
                                            <td>
                                                <a href="javascript:void(0)" onclick="hapusData({{ $item->id }})">
                                                    <i style="font-size: 1.5rem;" class="text-danger bi bi-trash"></i>
                                                </a>
                                            </td> --}}
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

    <div class="modal fade" id="modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Form Pertanyaan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="form">
                    <div class="modal-body">
                        <input type="hidden" name="id" id="id">
                        <input type="hidden" name="soal_id" id="soal_id" value="{{ $soal_id }}">
                        <div class="form-group">
                            <label for="">Pertanyaan<sup class="text-danger">*</sup></label>
                            <textarea name="pertanyaan" id="pertanyaan" cols="30" rows="3" class="form-control" required
                                placeholder="Pertanyaan"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Kategori <sup class="text-danger">*</sup></label>
                            <select name="jenis_soal" class="form-select" id="jenis_soal" required>
                                <option value="">-- Jenis Soal --</option>
                                <option>Pilihan Ganda</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Jawaban A<sup class="text-danger">*</sup></label>
                            <textarea name="jawaban_a" id="jawaban_a" cols="30" rows="3" class="form-control" required
                                placeholder="Pertanyaan"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Jawaban B<sup class="text-danger">*</sup></label>
                            <textarea name="jawaban_b" id="jawaban_b" cols="30" rows="3" class="form-control" required
                                placeholder="Pertanyaan"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Jawaban C<sup class="text-danger">*</sup></label>
                            <textarea name="jawaban_c" id="jawaban_c" cols="30" rows="3" class="form-control" required
                                placeholder="Pertanyaan"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Jawaban D<sup class="text-danger">*</sup></label>
                            <textarea name="jawaban_d" id="jawaban_d" cols="30" rows="3" class="form-control" required
                                placeholder="Pertanyaan"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Jawaban Benar <sup class="text-danger">*</sup></label>
                            <select name="jawaban_benar" class="form-select" id="jawaban_benar" required>
                                <option value="">-- Jawaban Benar --</option>
                                <option>A</option>
                                <option>B</option>
                                <option>C</option>
                                <option>D</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Poin<sup class="text-danger">*</sup></label>
                            <input type="number" class="form-control" id="poin" name="poin" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button id="tombol_kirim" class="btn btn-primary">
                            <div class="spinner-border spinner-border-sm"
                                style="margin-right: 3px; width: 0.7rem; height: 0.7rem; display: none;"></div>
                            Kirim
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script>
        $("#example").DataTable({
            "ordering": false,
        })

        //modal edit atau hapus
        var exampleModal = document.getElementById('modal')
        exampleModal.addEventListener('show.bs.modal', function(event) {
            var button = event.relatedTarget
            var recipient = button.getAttribute('data-bs-id')

            document.getElementById("form").reset();
            document.getElementById('id').value = ''
            $('.error').empty();

            if (recipient) {
                // console.log(cokData[0].email);
                document.getElementById('id').value = button.getAttribute('data-bs-id')
                document.getElementById('pertanyaan').value = button.getAttribute('data-bs-pertanyaan')
                document.getElementById('jenis_soal').value = button.getAttribute('data-bs-jenis_soal')
                document.getElementById('jawaban_a').value = button.getAttribute('data-bs-jawaban_a')
                document.getElementById('jawaban_b').value = button.getAttribute('data-bs-jawaban_b')
                document.getElementById('jawaban_c').value = button.getAttribute('data-bs-jawaban_c')
                document.getElementById('jawaban_d').value = button.getAttribute('data-bs-jawaban_d')
                document.getElementById('jawaban_benar').value = button.getAttribute('data-bs-jawaban_benar')
                document.getElementById('poin').value = button.getAttribute('data-bs-poin')

            }

        })

        form.onsubmit = (e) => {

            let formData = new FormData(form);

            e.preventDefault();

            document.getElementById("tombol_kirim").disabled = true;

            axios({
                    method: 'post',
                    url: formData.get('id') == '' ? '/pertanyaan-store' : '/pertanyaan-update',
                    data: formData,
                })
                .then(function(res) {
                    //handle success         
                    if (res.data.responCode == 1) {

                        Swal.fire({
                            icon: 'success',
                            title: 'Sukses',
                            text: res.data.respon,
                            timer: 3000,
                            showConfirmButton: false
                        })

                        $("#modal").modal("hide");
                        location.reload()

                    }

                    document.getElementById("tombol_kirim").disabled = false;
                })
                .catch(function(res) {
                    //handle error
                    console.log(res);
                });
        }

        hapusData = (id) => {
            Swal.fire({
                title: "Yakin hapus data?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                confirmButtonText: 'Ya',
                cancelButtonColor: '#3085d6',
                cancelButtonText: "Batal"

            }).then((result) => {

                if (result.value) {
                    axios.post('/pertanyaan-delete', {
                            id
                        })
                        .then((response) => {
                            if (response.data.responCode == 1) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Berhasil',
                                    timer: 2000,
                                    showConfirmButton: false
                                })

                                location.reload()

                            } else {
                                Swal.fire({
                                    icon: 'warning',
                                    title: 'Gagal...',
                                    text: response.data.respon,
                                })
                            }
                        }, (error) => {
                            console.log(error);
                        });
                }

            });
        }
    </script>
@endpush
