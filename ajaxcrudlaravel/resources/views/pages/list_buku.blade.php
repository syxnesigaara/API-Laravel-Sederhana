@extends('layout')
@section('konten')
    <div class="row p-5">
        <h1>Bukunya Ngkong Sayid</h1>
        <div class=" col-md-12 col-sm-12 ">
            <div class="row">
                <div class="col-md-11 col-sm-12">
                    <form id="formCari">

                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Cari Nama Buku" id="cari">
                            <button class="btn btn-primary fa " title="Cari Buku"><i class="fa-search"></i></button>
                        </div>
                    </form>
                </div>
                <div class="col-md-1 col-sm-12">
                    <button class="btn btn-primary" id="btnTambah" data-bs-toggle="modal" data-bs-target="#tambahBuku"
                        title="Tambah Buku"><i class="fa fa-plus"></i>
                    </button>
                </div>
            </div>



            <div id="list"></div>
        </div>
        <div class="col-md-6 col-sm-12">


            {{-- <div id="detail" style="display:none">
                <h2>Detail Buku</h2>
                <table>
                    <tr>
                        <th align="left">Nama Buku</th>
                        <th>:</th>
                        <td id="nama_buku"></td>
                    </tr>
                    <tr>
                        <th align="left">Kategori</th>
                        <th>:</th>
                        <td id="kategori"></td>
                    </tr>
                    <tr>
                        <th align="left">Pengarang</th>
                        <th>:</th>
                        <td id="pengarang"></td>
                    </tr>
                    <tr>
                        <th align="left">Penerbit</th>
                        <th>:</th>
                        <td id="penerbit"></td>
                    </tr>
                </table>
            </div> --}}
        </div>
    </div>


    <!-- Modal Tambah -->
    <div class="modal fade" id="tambahBuku" tabindex="-1">
        <form id="formTambah">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Buku</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Buku</label>
                            <input type="text" name="nama" class="form-control" id="nama"
                                placeholder="Isi Nama Buku" required>
                        </div>
                        <div class="mb-3">
                            <label for="cboKategori" class="form-label">Kategori</label>
                            <select name="kategori" class="form-control" id="cboKategori" required></select>
                        </div>
                        <div class="mb-3">
                            <label for="pengarang" class="form-label">Pengarang</label>
                            <input type="text" name="pengarang" class="form-control" id="pengarang"
                                placeholder="Isi Pengarang" required>
                        </div>
                        <div class="mb-3">
                            <label for="penerbit" class="form-label">Penerbit</label>
                            <input type="text" name="penerbit" class="form-control" id="penerbit"
                                placeholder="Isi Penerbit" required>
                        </div>



                    </div>
                    <div class="modal-footer">
                        <div id="tombolTambah">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                            <button class="btn btn-primary">Tambah</button>
                        </div>
                    </div>

                </div>
        </form>
    </div>
    </div>

    <!-- Modal Detail -->
    <div class="modal fade" id="detailBuku" tabindex="-1">
        <form id="formTambah">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Detail Buku</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="nama" class="form-label fw-bold">Nama Buku</label>
                            <div id="nama_buku"></div>
                            {{-- <input type="text" name="nama" class="form-control" id="nama"
                                placeholder="Isi Nama Buku" readonly> --}}
                        </div>
                        <div class="mb-3">
                            <label for="cboKategori" class="form-label fw-bold">Kategori</label>
                            <div id="kategori_buku"></div>
                            {{-- <select name="kategori" class="form-control" id="cboKategori" readonly></select> --}}
                        </div>
                        <div class="mb-3">
                            <label for="pengarang" class="form-label fw-bold">Pengarang</label>
                            <div id="pengarang_buku"></div>
                            {{-- <input type="text" name="pengarang" class="form-control" id="pengarang"
                                placeholder="Isi Pengarang" required> --}}
                        </div>
                        <div class="mb-3">
                            <label for="penerbit" class="form-label fw-bold">Penerbit</label>
                            <div id="penerbit_buku"></div>
                            {{-- <input type="text" name="penerbit" class="form-control" id="penerbit"
                                placeholder="Isi Penerbit" required> --}}
                        </div>

                        {{-- <table>
                            <tr>
                                <th align="left">Nama Buku</th>
                                <th>:</th>
                                <td id="nama_buku"></td>
                            </tr>
                            <tr>
                                <th align="left">Kategori</th>
                                <th>:</th>
                                <td id="kategori"></td>
                            </tr>
                            <tr>
                                <th align="left">Pengarang</th>
                                <th>:</th>
                                <td id="pengarang"></td>
                            </tr>
                            <tr>
                                <th align="left">Penerbit</th>
                                <th>:</th>
                                <td id="penerbit"></td>
                            </tr>
                        </table> --}}

                    </div>
                    {{-- <div class="modal-footer">
                        <div id="tombolTambah">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                            <button class="btn btn-primary">Tambah</button>
                        </div>
                    </div> --}}

                </div>
        </form>
    </div>
    </div>
@endsection

@section('script')
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        $("document").ready(function() {




            loadData("")

            $("#formCari").submit(function(e) {
                //alert(e.target.value)
                e.preventDefault()
                //alert("aaa")
                let cari = $("#cari").val()
                loadData(cari)
            })

            // $("#btnTambah").click(function() {
            //     $("#formTambah").toggle()
            // })

            $.get("{{ url('/ajax/kategori') }}", function(hasil) {
                //console.log(result)
                let hasilJSON = JSON.parse(hasil)
                let temp = `<option value="">-Pilih-</option>`

                hasilJSON.forEach(item => {
                    temp += `
                        <option value='${item.id_kategori}'>${item.nama_kategori}</option>
                    `
                });
                $("#cboKategori").html(temp)
            })

            $("#formTambah").submit((e) => {
                e.preventDefault()
                Swal.fire({
                    title: 'Anda yakin data sudah benar?',
                    showDenyButton: true,

                    confirmButtonText: 'Ya',
                    denyButtonText: 'Tidak',

                }).then((result) => {
                    if (result.isConfirmed) {

                        $.ajax({
                            type: "POST",
                            url: "{{ url('/ajax/buku') }}",
                            beforeSend: function() {
                                $("#tombolTambah").html(
                                    `<img src="{{ asset('img/loading.gif') }}">`)
                            },
                            data: $("#formTambah").serialize(),
                            success: function(hasil) {
                                //alert("Data Berhasil Ditambah")
                                Toast.fire({
                                    icon: 'success',
                                    title: 'Data Berhasil Ditambah'
                                })
                                $("#formTambah").trigger("reset")
                                const tambahBukuModal = document.querySelector(
                                    '#tambahBuku');
                                const modalTambahBuku = bootstrap.Modal.getInstance(
                                    tambahBukuModal);
                                modalTambahBuku.hide();
                                $("#tombolTambah").html(`<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button class="btn btn-primary">Tambah</button>`)
                                //$("#formTambah").hide()
                                loadData("")
                            }
                        })
                    }
                })

            })

        })

        function loadData(nama = "") {
            let url = ""
            if (nama == "") {
                url = "{{ url('/ajax/buku') }}"
            } else {
                url = "{{ url('/ajax/buku') }}?q=" + nama
            }
            //alert(url)
            $.ajax({
                type: "GET",
                url: url,
                beforeSend: function() {
                    $("#list").html(`<img src="{{ asset('img/loading.gif') }}">`)
                },
                success: function(hasil) {
                    let hasilJSON = JSON.parse(hasil) //karena balikannya string, maka harus diparse jadi JSON 
                    let temp = ""
                    let sukses = hasilJSON[0].sukses
                    console.log(sukses);
                    if (sukses != 0) {
                        temp = `<table class="table table-bordered">
                        <tr>
                            <th>No.</th>
                            <th>Nama Buku</th>
                            <th>Kategori</th>
                            <th>Penerbit</th>
                            <th>Pengarang</th>
                            
                            <th>&nbsp;</th>
                        </tr>`
                        hasilJSON[0].data.forEach((item, index) => {
                            temp += ` <tr>
                            <td>${index+1}.</td>
                            <td>${item.nama_buku}</td>
                            <td>${item.nama_kategori}</td>
                            <td>${item.penerbit}</td>
                            <td>${item.pengarang}</td>
                            <td>
                                <button data-bs-toggle="modal" data-bs-target="#detailBuku" onclick="detail(${item.id_buku})" class="btn btn-info" title="Detail Buku"><i class="fa fa-list"></i></button>
                            
                                <button class="btn btn-danger" title="Hapus Buku" onclick="hapus(${item.id_buku},'${item.nama_buku}')"><i class="fa fa-remove"></i></button>
                            </td>
                        </tr>`
                        });
                        temp += `</table>`
                        $("#list").html(temp)
                        $("#cari").val("")

                    } else {
                        //alert("Data Tidak Ditemukan")
                        $("#list ").html(`<div class="alert alert-danger">Data tidak ditemukan</div>`)
                    }
                    $("#detail").hide()
                    //console.log(hasilJSON[0].sukses);




                }
            })
        }

        function detail(id_buku) {
            $.get("{{ url('/ajax/buku') }}/" + id_buku, function(hasil) {
                let hasilJSON = JSON.parse(hasil) //karena balikannya string, maka harus diparse jadi JSON 
                //console.log(hasilJSON)
                $("#nama_buku").html(hasilJSON.nama_buku)
                $("#kategori_buku").html(hasilJSON.nama_kategori)
                $("#penerbit_buku").html(hasilJSON.penerbit)
                $("#pengarang_buku").html(hasilJSON.pengarang)
                //$("#detail").show()
            })
        }

        function hapus(id_buku, nama_buku) {
            Swal.fire({
                title: 'Anda yakin buku ' + nama_buku + '?',
                showDenyButton: true,

                confirmButtonText: 'Ya',
                denyButtonText: 'Tidak',

            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{ url('/ajax/buku') }}/" + id_buku,
                        type: 'DELETE',
                        success: function(hasil) {
                            // Do something with the result
                            //alert("Data berhasil dihapus")
                            Toast.fire({
                                icon: 'success',
                                title: 'Data Berhasil dihapus'
                            })
                            loadData()
                        }
                    });
                }
            })

            // let yakin = confirm(`Apakah Anda yakin mau menghapus ${nama_buku} ?`)
            // if (yakin) {
            //     //alert("{{ url('/ajax/buku') }}/"+id_buku)

            // }

        }
    </script>
@endsection
