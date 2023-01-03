@extends('layouts.app')
@section('content')
    <div class="container mt-5">
        <div class="row small-screen-row mt-2">
            <div class="col-12 mb-4">
                <h3><a href="{{ url('soal') }}"><i class="bi bi-arrow-left"></i> </a>  Data Soal 📝</h3>
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
                                        <th width="5px">No</th>
                                        <th width="50%">Nama Soal</th>
                                        <th>Kategori</th>
                                        <th>Total Soal</th>
                                        <th width="1px"></th>
                                        <th width="1px"></th>
                                        <th width="1px"></th>
                                    </tr>
                                </thead>
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
                    <h5 class="modal-title" id="exampleModalLabel">Form Soal</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="form">
                    <div class="modal-body">
                        <input type="hidden" name="id" id="id">
                        <div class="form-group">
                            <label for="">Nama Soal<sup class="text-danger">*</sup></label>
                            <input type="text" placeholder="Nama Soal" class="form-control" id="nama_soal"
                                name="nama_soal" required>
                        </div>
                        <div class="form-group">
                            <label for="">Kategori <sup class="text-danger">*</sup></label>
                            <select name="kategori_soal" class="form-select" id="kategori_soal" required>
                                <option value="">-- Kategori --</option>
                                <option>Komputer</option>
                                <option>Umum</option>
                            </select>
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
            ajax: '/data-soal',
            processing: true,
            'language': {
                'loadingRecords': '&nbsp;',
                'processing': 'Loading...'
            },
            columns: [{
                    render: function(data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                },
                {
                    data: 'nama_soal',
                },
                {
                    data: 'kategori_soal'
                },
                {
                    data: 'total'
                },
                {
                    render: function(data, type, row, meta) {
                        return `<a href="/detail-soal/${row.id}">
                                    <i style="font-size: 1.5rem;" class="text-info bi bi-eye"></i>
                                </a>`
                    }
                },
                {
                    render: function(data, type, row, meta) {
                        return `<a data-bs-toggle="modal" data-bs-target="#modal"
                                    data-bs-id=` + (row.id) + ` href="javascript:void(0)">
                                    <i style="font-size: 1.5rem;" class="text-success bi bi-grid"></i>
                                </a>`
                    }
                },
                {
                    render: function(data, type, row, meta) {
                        return `<a href="javascript:void(0)" onclick="hapusData(` + (row
                            .id) + `)">
                                    <i style="font-size: 1.5rem;" class="text-danger bi bi-trash"></i>
                                </a>`
                    }
                },
            ]
        })

        //modal edit atau hapus
        var exampleModal = document.getElementById('modal')
        exampleModal.addEventListener('show.bs.modal', function(event) {
            var button = event.relatedTarget
            var recipient = button.getAttribute('data-bs-id')
            var cok = $("#example").DataTable().rows().data().toArray()

            let cokData = cok.filter((dt) => {
                return dt.id == recipient;
            })

            document.getElementById("form").reset();
            document.getElementById('id').value = ''
            $('.error').empty();

            if (recipient) {
                // console.log(cokData[0].email);
                document.getElementById('id').value = cokData[0].id
                document.getElementById('nama_soal').value = cokData[0].nama_soal
                document.getElementById('kategori_soal').value = cokData[0].kategori_soal
            }

        })

        form.onsubmit = (e) => {

            let formData = new FormData(form);

            e.preventDefault();

            document.getElementById("tombol_kirim").disabled = true;

            axios({
                    method: 'post',
                    url: formData.get('id') == '' ? '/soal-store' : 'soal-update',
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
                    axios.post('/soal-delete', {
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
