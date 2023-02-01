@extends('layouts.admin')

@section('title')
    Tambah Data
@endsection

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Tambah Data</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tambah Data Full Timer, Staff, Karyawan</h6>
            </div>
            <div class="card-body">
                <form action="{{route('datadiri.store')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        {{-- <div class="alert alert-primary" role="alert">
                            Data Diri
                        </div> --}}
                        <label for="nama">Nama Lengkap</label>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap...">

                        <label for="tlahirDiri" class="mt-3">Tempat Lahir</label>
                        <input type="text" class="form-control" id="tlahirDiri" name="tlahirDiri" placeholder="Tempat Lahir...">

                        <label for="tgllahirDiri" class="mt-3">Tanggal Lahir</label>
                        <input type="date" class="form-control" id="tgllahirDiri" name="tgllahirDiri" placeholder="Tanggal Lahir...">

                        <label for="mulai_bekerja" class="mt-3">Mulai Bekerja</label>
                        <input type="date" class="form-control" id="mulai_bekerja" name="mulai_bekerja" placeholder="Mulai Bekerja...">

                        <label for="jabatan" class="mt-3">Jabatan Sekarang</label>
                        <input type="text" class="form-control" id="jabatan" name="jabatan" placeholder="Jabatan Sekarang...">

                        <label for="alamat" class="mt-3">Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat...">

                        <label for="telp" class="mt-3">Telephone</label>
                        <input type="text" class="form-control" id="telp" name="telp" placeholder="Telephone...">

                        <label for="hp" class="mt-3">Hp</label>
                        <input type="text" class="form-control" id="hp" name="hp" placeholder="Hp...">

                        <label for="email" class="mt-3">Email</label>
                        <input type="text" class="form-control" id="email" name="email" placeholder="Email...">
                    </div>
                    {{-- <div class="form-group">
                        <div class="alert alert-primary" role="alert">
                            Data Keluarga
                        </div>
                        <label for="exampleFormControlSelect1">Status</label>
                        <select class="form-control" id="exampleFormControlSelect1">
                        <option>-- Pilih --</option>
                        <option value="Single">Single</option>
                        <option value="Kawin">Kawin</option>
                        <option value="Cerai Hidup">Cerai Hidup</option>
                        <option value="Cerai Mati">Cerai Mati</option>
                        </select>

                        <label for="namaPasa" class="mt-3">Nama Lengkap</label>
                        <input type="text" class="form-control" id="namaPasa" name="namaPasa" placeholder="Nama Lengkap...">

                        <label for="tlahirPasa" class="mt-3">Tempat Lahir</label>
                        <input type="text" class="form-control" id="tlahirPasa" name="tlahirPasa" placeholder="Tempat Lahir...">

                        <label for="tgllahirPasa" class="mt-3">Tanggal Lahir</label>
                        <input type="text" class="form-control" id="tgllahirPasa" name="tgllahirPasa" placeholder="Tanggal Lahir...">

                        <label for="pekerjaanPasa" class="mt-3">Pekerjaan</label>
                        <input type="text" class="form-control" id="pekerjaanPasa" name="pekerjaanPasa" placeholder="pekerjaan...">

                        <label for="pend_akhir" class="mt-3">Pendidikan Akhir</label>
                        <select class="form-control" id="pend_akhir" name="pend_akhir">
                          <option>-- Pilih --</option>
                          <option value="SD">SD</option>
                          <option value="SMP">SMP</option>
                          <option value="SMA">SMA</option>
                          <option value="S1">S1</option>
                          <option value="S2">S2</option>
                          <option value="S3">S3</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <div class="alert alert-primary" role="alert">
                            Data Anak
                        </div>
                        <label for="namaAnak">Nama Lengkap</label>
                        <input type="text" class="form-control" id="namaAnak" name="namaAnak" placeholder="Nama Lengkap...">

                        <label for="jk" class="mt-3">Jenis Kelamin</label>
                        <select class="form-control" id="jk" name="jk">
                          <option>-- Pilih --</option>
                          <option value="Laki-Laki">Laki-Laki</option>
                          <option value="Perempuan">Perempuan</option>
                        </select>

                        <label for="tlahirAnak" class="mt-3">Tempat Lahir</label>
                        <input type="text" class="form-control" id="tlahirAnak" name="tlahirAnak" placeholder="Tempat Lahir...">

                        <label for="tgllahirAnak" class="mt-3">Tanggal Lahir</label>
                        <input type="text" class="form-control" id="tgllahirAnak" name="tgllahirAnak" placeholder="Tanggal Lahir...">

                        <label for="pendpekerja" class="mt-3">Pendidikan / Pekerjaan</label>
                        <textarea class="form-control" id="pendpekerja" rows="3" name="pendpekerja"></textarea>
                        <button class="btn btn-success add-more" style="margin-top: 5px" type="button">
                            <i class="glyphicon glyphicon-plus"></i> Add
                        </button>
                    </div>
                    <div class="form-group">
                        <div class="alert alert-primary" role="alert">
                            Data Kepemilikan
                        </div>
                        <label for="tptTinggal">Tempat Tinggal</label>
                        <select class="form-control" id="tptTinggal" name="tptTinggal">
                          <option>-- Pilih --</option>
                          <option value="HM">HM</option>
                          <option value="Ikut Ortu">Ikut Ortu</option>
                          <option value="Kontrak / Kost">Kontrak / Kost</option>
                        </select>

                        <label for="ket" class="mt-3">Jelaskan</label>
                        <textarea class="form-control" id="ket" rows="3" name="ket"></textarea>

                        <label for="transport" class="mt-3">Transportasi</label>
                        <select class="form-control" id="transport" name="transport">
                          <option>-- Pilih --</option>
                          <option value="Angkutan Umum">Angkutan Umum</option>
                          <option value="Sepeda">Sepeda</option>
                          <option value="Motor">Motor</option>
                          <option value="Mobil">Mobil</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <div class="alert alert-primary" role="alert">
                            Data Pendidikan & Organisasi
                        </div>
                        <label for="sd">Sekolah Dasar</label>
                        <input type="text" class="form-control" id="sd" name="sd" placeholder="Sekolah Dasar...">

                        <label for="smp" class="mt-3">Sekolah Menengah Pertama</label>
                        <input type="text" class="form-control" id="smp" name="smp" placeholder="Sekolah Menengah Pertama...">

                        <label for="sma" class="mt-3">Sekolah Menengah Atas</label>
                        <input type="text" class="form-control" id="sma" name="sma" placeholder="Sekolah Menengah Atas...">

                        <label for="univ" class="mt-3">Universitas</label>
                        <input type="text" class="form-control" id="univ" name="univ" placeholder="Universitas...">

                        <label for="kursus" class="mt-3">Kursus</label>
                        <input type="text" class="form-control" id="kursus" name="kursus" placeholder="Kursus...">

                        <label for="kursusImg" class="mt-3">Sertifikat Kursus</label>
                        <input type="file" class="form-control-file" id="kursusImg" name="kursusImg">

                        <label for="seminar" class="mt-3">Seminar</label>
                        <input type="text" class="form-control" id="seminar" name="seminar" placeholder="Seminar...">

                        <label for="seminarImg" class="mt-3">Sertifikat Seminar</label>
                        <input type="file" class="form-control-file" id="seminarImg" name="seminarImg">

                        <label for="pelatihan" class="mt-3">Pelatihan</label>
                        <input type="text" class="form-control" id="pelatihan" name="pelatihan" placeholder="Pelatihan...">

                        <label for="pelatihanImg" class="mt-3">Sertifikat Pelatihan</label>
                        <input type="file" class="form-control-file" id="pelatihanImg" name="pelatihanImg">
                    </div>
                    <div class="form-group">
                        <div class="alert alert-primary" role="alert">
                            Data Pekerjaan
                        </div>
                        <label for="pengKerja">Pengalaman Kerja</label>
                        <textarea class="form-control" id="pengKerja" rows="3" name="pengKerja"></textarea>

                        <label for="pekSkrng" class="mt-3">Pekerjaan Sekarang</label>
                        <input type="text" class="form-control" id="pekSkrng" name="pekSkrng" placeholder="Pekerjaan Sekarang...">
                    </div>
                    <div class="form-group">
                        <div class="alert alert-primary" role="alert">
                            Data Pelayanan
                        </div>
                        <label for="pelPernah">Pelayanan Sebelumnya</label>
                        <textarea class="form-control" id="pelPernah" rows="3" name="pelPernah"></textarea>

                        <label for="pelSkrng" class="mt-3">Pelayanan Sekarang</label>
                        <input type="text" class="form-control" id="pelSkrng" name="pelSkrng" placeholder="Pekerjaan Sekarang...">

                        <label for="jabKependetaan" class="mt-3">Jabatan Kependetaan</label>
                        <textarea class="form-control" id="jabKependetaan" rows="3" name="jabKependetaan"></textarea>
                    </div>
                    <div class="form-group">
                        <div class="alert alert-primary" role="alert">
                            Data Prestasi
                        </div>
                        <label for="pres">Prestasi</label>
                        <textarea class="form-control" id="pres" rows="3" name="pres"></textarea>

                        <label for="presImg" class="mt-3">Sertifikat Prestasi</label>
                        <input type="file" class="form-control-file" id="presImg" name="presImg">
                    </div>
                    <div class="form-group">
                        <div class="alert alert-primary" role="alert">
                            Data Lampiran
                        </div>
                        <label for="ktp">KTP</label>
                        <input type="file" class="form-control-file" id="ktp" name="ktp">

                        <label for="kk" class="mt-3">KK</label>
                        <input type="file" class="form-control-file" id="kk" name="kk">

                        <label for="surat_nikah" class="mt-3">Surat Nikah</label>
                        <input type="file" class="form-control-file" id="surat_nikah" name="surat_nikah">

                        <label for="surat_baptis" class="mt-3">Surat Baptis</label>
                        <input type="file" class="form-control-file" id="surat_baptis" name="surat_baptis">
                    </div>
                    <div class="tombolSimpan">
                        <button type="submit" class="btn btn-success mt-3" style="margin-top: 10px">Simpan</button>
                    </div> --}}
                    {{-- <div class="form-navigation mt-3">
                        <button type="button" class="previous btn btn-primary float-left">Kembali</button>
                        <button type="button" class="next btn btn-primary float-right">Selanjutnya</button>
                    </div> --}}
                    <button type="submit" class="btn btn-success mt-3" style="margin-top: 10px">Simpan</button>
                </form>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
@endsection

@push('prepend-style')
    <link rel="stylesheet" href="https://unpkg.com/gijgo@1.9.14/css/gijgo.min.css">
    {{-- <style>
        .form-group {
            display: none;
        }

        .form-group.current {
            display: inline;
        }

        .parsley-errors-list {
            color:red;
        }
    </style> --}}
@endpush

@push('addon-script')
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
    <script src="https://unpkg.com/gijgo@1.9.14/js/gijgo.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.20.1/standard/ckeditor.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js" integrity="sha512-eyHL1atYNycXNXZMDndxrDhNAegH2BDWt1TmkXJPoGf1WLlNYt08CSjkqF5lnCRmdm3IrkHid8s2jOUY4NIZVQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        CKEDITOR.replace( 'peng_kerja' );
    </script>
    <script>
        CKEDITOR.replace( 'pendpekerja' );
    </script>
    <script>
        CKEDITOR.replace( 'ket' );
    </script>
    <script>
        CKEDITOR.replace( 'pengKerja' );
    </script>
    <script>
        CKEDITOR.replace( 'jabKependetaan' );
    </script>
    <script>
        CKEDITOR.replace( 'pres' );
    </script>
    {{-- <script>
        $(function(){
            var $sections=$('.form-group');
            function navigateTo(index){
                $sections.removeClass('current').eq(index).addClass('current');
                $('.form-navigation .previous').toggle(index>0);
                var atTheEnd = index >= $sections.length - 1;
                $('.form-navigation .next').toggle(!atTheEnd);
                $('.form-navigation [Type=submit]').toggle(atTheEnd);
        
                const step= document.querySelector('.step'+index);
                step.style.backgroundColor="#17a2b8";
                step.style.color="white";
            }
            function curIndex(){
                return $sections.index($sections.filter('.current'));
            }
            $('.form-navigation .previous').click(function(){
                navigateTo(curIndex() - 1);
            });
            $('.form-navigation .next').click(function(){
                $('.ft').parsley().whenValidate({
                    group:'block-'+curIndex()
                }).done(function(){
                    navigateTo(curIndex()+1);
                });
            });
            $sections.each(function(index,section){
                $(section).find(':input').attr('data-parsley-group','block-'+index);
            });
            navigateTo(0);
        }); 
    </script> --}}
@endpush