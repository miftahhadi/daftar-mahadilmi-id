@extends('front.front')

@section('main')

<!-- Main content -->
<div class="main-content">
    <!-- Header -->
    <div class="header bg-mahadilmi py-7 py-lg-8 pt-lg-9">
        <div class="container">
            <div class="header-body text-center mb-5">
                <div class="row justify-content-center">
                    <img src="/assets/img/brand/logo-white.png" alt="Logo Ma'had al 'Ilmi" class="mb-4">
                    <div class="col-xl-10 col-lg-8 col-md-10 px-5">
                        <h1 class="text-white">Pendaftaran Santri Baru Ma'had Al-'Ilmi Yogyakarta</h1>
                        <p class="text-lead text-white">Tahun Ajaran 1441 - 1442 H</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Page content -->
    <div class="container mt--9 pb-5">
        <!-- Table -->
        <div class="row justify-content-center">

            <div class="col-lg-8 col-md-8">

            @if($errors->any())
                <div class="alert alert-danger" role="alert">
                    <span class="alert-icon"><i class="fas fa-exclamation-triangle"></i></span>
                    <span><strong>Perhatian!</strong> Terdapat kesalahan pengisian data. Mohon periksa kembali isian Anda</span>
                </div>

        
                <div class="alert alert-info" role="alert">
                    <span class="alert-icon"><i class="ni ni-like-2"></i></span>
                    <span class="alert-text">Jangan lupa untuk kembali mengecek kolom Jenis Kelamin dan Riwayat Tahsin</span>
                </div>
            @endif
            
                <form role="form" action="{{ route('form.submit') }}" method="post" enctype="multipart/form-data">
                @csrf

                    <!-- Data Diri -->
                    <div class="card bg-secondary border border-soft">
                        
                        <div class="card-header bg-transparent">
                            <h3 class="mb-0 text-center">Data Diri</h3>
                        </div>

                        <div class="card-body px-lg-5 py-lg-5">
                            
                            <div class="mb-4">
                                <small><span class="text-danger">*</span><i>Semua data wajib diisi</i></small>
                            </div>    


                            <div class="form-group">
                                <label for="pendaftar[data_diri][nama]">Nama lengkap</label>
                                <input class="form-control @error('pendaftar.data_diri.nama') is-invalid @else form-control-alternative @enderror" placeholder="Nama lengkap" type="text" name="pendaftar[data_diri][nama]" id="pendaftar[data_diri][nama]" value="{{ old('pendaftar.data_diri.nama') ?? '' }}" required>

                                @error('pendaftar.data_diri.nama')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror


                            </div>
                            
                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        
                                        <label for="pendaftar[data_diri][tempat_lahir]">Tempat lahir</label>

                                        <input class="form-control @error('pendaftar.data_diri.tempat_lahir') is-invalid @else form-control-alternative @enderror" placeholder="Tempat lahir" type="text" name="pendaftar[data_diri][tempat_lahir]" id="pendaftar[data_diri][tempat_lahir]" value="{{ old('pendaftar.data_diri.tempat_lahir') ?? '' }}" required>

                                        @error('pendaftar.data_diri.tempat_lahir')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror

                                    </div>
                                </div>

                                <div class="col-md-6">

                                    <label for="pendaftar[data_diri][tanggal_lahir]">Tanggal lahir</label>
                                    <div class="@error('pendaftar.data_diri.tanggal_lahir')  @else input-group input-group-merge input-group-alternative @enderror">

                                        <div class="input-group date" data-provide="datepicker">
                                            <input type="datetime-local" class="form-control @error('pendaftar.data_diri.tanggal_lahir') is-invalid @enderror" placeholder="Tanggal lahir" name="pendaftar[data_diri][tanggal_lahir]" id="pendaftar[data_diri][tanggal_lahir]" value="{{ old('pendaftar.data_diri.tanggal_lahir') ?? '' }}" required>
                                            <div class="input-group-addon">
                                                <span class="glyphicon glyphicon-th"></span>
                                            </div>

                                        </div>
                                    
                                    </div>

                                        @error('pendaftar.data_diri.tanggal_lahir')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror

    

                                </div>
                            </div>

                            <div class="form-group">

                                <label for="pendaftar[data_diri][jenis_kelamin]">Jenis kelamin</label>
                                <div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="pendaftar[data_diri][jenis_kelamin]" name="pendaftar[data_diri][jenis_kelamin]" class="custom-control-input" value="Laki-laki">
                                        <label class="custom-control-label" for="pendaftar[data_diri][jenis_kelamin]">Laki-laki</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="pendaftar[data_diri][jenis_kelamin]2" name="pendaftar[data_diri][jenis_kelamin]" class="custom-control-input" value="Perempuan">
                                        <label class="custom-control-label" for="pendaftar[data_diri][jenis_kelamin]2">Perempuan</label>
                                    </div>
                                </div>

                                @error('pendaftar.data_diri.jenis_kelamin')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror

                            </div>

                            <div class="form-group">

                                <label for="pendaftar[data_diri][alamat_asal]">Alamat asal</label>
                                <input class="form-control @error('pendaftar.data_diri.alamat_asal') is-invalid @else form-control-alternative @enderror" placeholder="Alamat asal" type="text" name="pendaftar[data_diri][alamat_asal]" id="pendaftar[data_diri][alamat_asal]" value="{{ old('pendaftar.data_diri.alamat_asal') }}" required>

                                @error('pendaftar.data_diri.alamat_asal')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror

                            </div>
                            
                            <div class="form-group">

                                <label for="pendaftar[data_diri][alamat_jogja]">Alamat di Yogyakarta</label>
                                <input class="form-control @error('pendaftar.data_diri.alamat_jogja') is-invalid @else form-control-alternative @enderror" placeholder="Alamat di Yogyakarta" type="text" name="pendaftar[data_diri][alamat_jogja]" id="pendaftar[data_diri][alamat_jogja]" value="{{ old('pendaftar.data_diri.alamat_jogja') }}" required>
                                
                                @error('pendaftar.data_diri.alamat_jogja')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror

                            </div>

                            <div class="form-group">

                                <label for="pendaftar[data_diri][nomor_wa]">Nomor WhatsApp</label>
                                <input class="form-control @error('pendaftar.data_diri.nomor_wa') is-invalid @else form-control-alternative @enderror" placeholder="Nomor WhatsApp" type="text" name="pendaftar[data_diri][nomor_wa]" id="pendaftar[data_diri][nomor_wa]" value="{{ old('pendaftar.data_diri.nomor_wa') }}" required>

                                @error('pendaftar.data_diri.nomor_wa')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror

                            </div>
                            
                            <div class="form-group">

                                <label for="pendaftar[data_diri][email]">Email aktif</label>
                                <input class="form-control @error('pendaftar.data_diri.email') is-invalid @else form-control-alternative @enderror" placeholder="Email Aktif" type="email" name="pendaftar[data_diri][email]" id="pendaftar[data_diri][email]" value="{{ old('pendaftar.data_diri.email') }}" required>

                                @error('pendaftar.data_diri.email')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror

                            </div>
                            
                            <div class="form-group">

                                <label for="pendaftar[data_diri][pekerjaan]">Pekerjaan</label>
                                <input class="form-control @error('pendaftar.data_diri.pekerjaan') is-invalid @else form-control-alternative @enderror" placeholder="Pekerjaan" type="text" name="pendaftar[data_diri][pekerjaan]" id="pendaftar[data_diri][pekerjaan]" value="{{ old('pendaftar.data_diri.pekerjaan') }}" required>

                                @error('pendaftar.data_diri.pekerjaan')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror

                            </div>

                            <div class="form-group">

                                <label for="pendaftar[data_diri][kesibukan]">Kesibukan saat ini</label>
                                <input class="form-control @error('pendaftar.data_diri.kesibukan') is-invalid @else form-control-alternative @enderror" placeholder="Kesibukan saat ini" type="text" name="pendaftar[data_diri][kesibukan]" id="pendaftar[data_diri][kesibukan]" value="{{ old('pendaftar.data_diri.kesibukan') }}" required>

                                @error('pendaftar.data_diri.kesibukan')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror

                            </div>
                            
                        </div>
                    </div>

                    <!-- Riwayat Pendidikan -->
                    <div class="card bg-secondary border border-soft">
                        
                        <div class="card-header bg-transparent">
                            <h3 class="mb-0 text-center">Riwayat Pendidikan</h3>
                        </div>

                        <div class="card-body px-lg-5 py-lg-5">
                            
                            <div class="mb-4">
                                <small><i>Tuliskan riwayat pendidikan Anda. Jika tidak/belum menyelesaikan tingkat pendidikan tertentu, isi dengan tanda (-) di semua kolomnya</i></small>
                            </div>

                            <h4 class="text-muted">SD/MI</h4>
                            <input type="hidden" name="pendaftar[pendidikan][1][tingkat]" value="SD/MI">
                            <div class="row">
                            
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="pendaftar[pendidikan][1][nama_institusi] class="form-control-label">Nama sekolah</label>
                                        <input class="form-control @error('pendaftar.pendidikan.1.nama_institusi') is-invalid @else form-control-alternative @enderror" placeholder="Nama sekolah" type="text" name="pendaftar[pendidikan][1][nama_institusi]" id="pendaftar[pendidikan][1][nama_institusi]" value="{{ old('pendaftar.pendidikan.1.nama_institusi') }}" required>

                                        @error('pendaftar.pendidikan.1.nama_institusi')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror

                                    </div>



                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="pendaftar[pendidikan][1][tahun_lulus]" class="form-control-label">Tahun lulus</label>
                                        <input class="form-control @error('pendaftar.pendidikan.1.tahun_lulus') is-invalid @else form-control-alternative @enderror" placeholder="Tahun lulus" type="text" name="pendaftar[pendidikan][1][tahun_lulus]" id="pendaftar[pendidikan][1][tahun_lulus]" value="{{ old('pendaftar.pendidikan.1.tahun_lulus') }}" required>

                                        @error('pendaftar.pendidikan.1.tahun_lulus')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>

                                </div>

                            </div>

                            <hr class="my-4">

                            <h4 class="text-muted">SMP/MTs</h4>
                            <input type="hidden" name="pendaftar[pendidikan][2][tingkat]" value="SMP/MTs">

                            <div class="row">
                            
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="pendaftar[pendidikan][2][nama_institusi]" class="form-control-label">Nama sekolah</label>
                                        <input class="form-control @error('pendaftar.pendidikan.2.nama_institusi') is-invalid @else form-control-alternative @enderror" placeholder="Nama sekolah" type="text" name="pendaftar[pendidikan][2][nama_institusi]" id="pendaftar[pendidikan][2][nama_institusi]" value="{{ old('pendaftar.pendidikan.2.nama_institusi') }}" required>

                                        @error('pendaftar.pendidikan.2.nama_institusi')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">

                                        <label for="" class="form-control-label">Tahun lulus</label>
                                        <input class="form-control @error('pendaftar.pendidikan.2.tahun_lulus') is-invalid @else form-control-alternative @enderror" placeholder="Tahun lulus" type="text" name="pendaftar[pendidikan][2][tahun_lulus]" id="pendaftar[pendidikan][2][tahun_lulus]" value="{{ old('pendaftar.pendidikan.2.tahun_lulus') }}" required>

                                        @error('pendaftar.pendidikan.2.tahun_lulus')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror

                                    </div>
                                </div>

                            </div>

                            <hr class="my-4">

                            <h4 class="text-muted">SMA/MA</h4>
                            <input type="hidden" name="pendaftar[pendidikan][3][tingkat]" value="SMA/MA">

                            <div class="row">
                            
                                <div class="col-md-4">
                                    <div class="form-group">

                                        <label for="pendaftar[pendidikan][3][nama_institusi]" class="form-control-label">Nama sekolah</label>
                                        <div class="input-group input-group-merge input-group-alternative mb-3">
                                            <input class="form-control @error('pendaftar.pendidikan.3.nama_institusi') is-invalid @else form-control-alternative @enderror" placeholder="Nama sekolah" type="text" name="pendaftar[pendidikan][3][nama_institusi]" id="pendaftar[pendidikan][3][nama_institusi]" value="{{ old('pendaftar.pendidikan.3.nama_institusi') }}" required>
                                        </div>

                                        @error('pendaftar.pendidikan.3.nama_institusi')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">

                                        <label for="pendaftar[pendidikan][3][tahun_lulus]" class="form-control-label">Tahun lulus</label>
                                        <div class="input-group input-group-merge input-group-alternative mb-3">
                                            <input class="form-control @error('pendaftar.pendidikan.3.tahun_lulus') is-invalid @else form-control-alternative @enderror" placeholder="Tahun lulus" type="text" name="pendaftar[pendidikan][3][tahun_lulus]" id="pendaftar[pendidikan][3][tahun_lulus]" value="{{ old('pendaftar.pendidikan.3.tahun_lulus') }}" required>
                                        </div>

                                        @error('pendaftar.pendidikan.3.tahun_lulus')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">

                                        <label for="[pendidikan][3][jurusan]" class="form-control-label">Jurusan</label>
                                        <div class="input-group input-group-merge input-group-alternative mb-3">
                                            <input class="form-control" placeholder="Jurusan" type="text" name="pendaftar[pendidikan][3][jurusan]" id="pendaftar[pendidikan][3][jurusan]" value="{{ old('pendaftar.pendidikan.3.jurusan') }}">
                                        </div>

                                    </div>
                                </div>

                            </div>

                            <hr class="my-4">

                            <h4 class="text-muted">Sarjana</h4>
                            <input type="hidden" name="pendaftar[pendidikan][4][tingkat]" value="Sarjana">

                            <div class="row">
                            
                                <div class="col-md-4">
                                    <div class="form-group">

                                        <label for="pendaftar[pendidikan][4][nama_institusi]" class="form-control-label">Nama institusi</label>
                                        <div class="input-group input-group-merge input-group-alternative mb-3">
                                            <input class="form-control" placeholder="Nama institusi" type="text" name="pendaftar[pendidikan][4][nama_institusi]" id="pendaftar[pendidikan][4][nama_institusi]" value="{{ old('pendaftar.pendidikan.4.nama_institusi') }}">
                                        </div>
                                        
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="pendaftar[pendidikan][4][tahun_lulus]" class="form-control-label">Tahun lulus</label>
                                        <div class="input-group input-group-merge input-group-alternative mb-3">
                                            <input class="form-control" placeholder="Tahun lulus" type="text" name="pendaftar[pendidikan][4][tahun_lulus]" id="pendaftar[pendidikan][4][tahun_lulus]" value="{{ old('pendaftar.pendidikan.4.tahun_lulus') }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="pendaftar[pendidikan][4][prodi]" class="form-control-label">Program studi</label>
                                        <div class="input-group input-group-merge input-group-alternative mb-3">
                                            <input class="form-control" placeholder="Program studi" type="text" name="pendaftar[pendidikan][4][prodi]" id="pendaftar[pendidikan][4][prodi]" value="{{ old('pendaftar.pendidikan.4.prodi') }}">
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <hr class="my-4">

                            <h4 class="text-muted">Magister</h4>
                            <input type="hidden" name="pendaftar[pendidikan][5][tingkat]" value="Magister">

                            <div class="row">
                            
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="pendaftar[pendidikan][5][nama_institusi]" class="form-control-label">Nama institusi</label>
                                        <div class="input-group input-group-merge input-group-alternative mb-3">
                                            <input class="form-control" placeholder="Nama institusi" type="text" name="pendaftar[pendidikan][5][nama_institusi]" id="pendaftar[pendidikan][5][nama_institusi]" value="{{ old('pendaftar.pendidikan.5.nama_institusi') }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="pendaftar[pendidikan][5][tahun_lulus]" class="form-control-label">Tahun lulus</label>
                                        <div class="input-group input-group-merge input-group-alternative mb-3">
                                            <input class="form-control" placeholder="Tahun lulus" type="text" name="pendaftar[pendidikan][5][tahun_lulus]" id="pendaftar[pendidikan][5][tahun_lulus]" value="{{ old('pendaftar.pendidikan.5.tahun_lulus') }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="pendaftar[pendidikan][5][prodi]" class="form-control-label">Program studi</label>
                                        <div class="input-group input-group-merge input-group-alternative mb-3">
                                            <input class="form-control" placeholder="Program studi" type="text" name="pendaftar[pendidikan][5][prodi]" id="pendaftar[pendidikan][5][prodi]" value="{{ old('pendaftar.pendidikan.5.prodi') }}">
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <hr class="my-4">

                            <h4 class="text-muted">Doktoral</h4>
                            <input type="hidden" name="pendaftar[pendidikan][6][tingkat]" value="Doktoral">

                            <div class="row">
                            
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="pendaftar[pendidikan][6][nama_institusi]" class="form-control-label">Nama institusi</label>
                                        <div class="input-group input-group-merge input-group-alternative mb-3">
                                            <input class="form-control" placeholder="Nama institusi" type="text" name="pendaftar[pendidikan][6][nama_institusi]" id="pendaftar[pendidikan][6][nama_institusi]" value="{{ old('pendaftar.pendidikan.6.nama_institusi') }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="pendaftar[pendidikan][6][tahun_lulus]" class="form-control-label">Tahun lulus</label>
                                        <div class="input-group input-group-merge input-group-alternative mb-3">
                                            <input class="form-control" placeholder="Tahun lulus" type="text" name="pendaftar[pendidikan][6][tahun_lulus]" id="pendaftar[pendidikan][6][tahun_lulus]" value="{{ old('pendaftar.pendidikan.6.tahun_lulus') }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="pendaftar[pendidikan][6]][prodi]" class="form-control-label">Program studi</label>
                                        <div class="input-group input-group-merge input-group-alternative mb-3">
                                            <input class="form-control" placeholder="Program studi" type="text" name="pendaftar[pendidikan][6][prodi]" id="pendaftar[pendidikan][6]][prodi]" value="{{ old('pendaftar.pendidikan.6.prodi') }}">
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>

                    <!-- Pengalaman Organisasi  -->                    
                    <div class="card bg-secondary border border-soft">
                        
                        <div class="card-header bg-transparent">
                            <h3 class="mb-0 text-center">Pengalaman Organisasi</h3>
                        </div>

                        <div class="card-body px-lg-5 py-lg-5">

                            <div class="row">
                                
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="pendaftar[organisasi][1][nama]" class="form-control-label">Nama organisasi</label>
                                        <div class="input-group input-group-merge input-group-alternative mb-3">
                                            <input class="form-control" placeholder="Nama organisasi" type="text" name="pendaftar[organisasi][1][nama]" id="pendaftar[organisasi][1][nama]" value="{{ old('pendaftar.organisasi.1.nama') }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="" class="form-control-label">Jabatan</label>
                                        <div class="input-group input-group-merge input-group-alternative mb-3">
                                            <input class="form-control" placeholder="Jabatan" type="text" name="pendaftar[organisasi][1][jabatan]" id="pendaftar[organisasi][1][jabatan]" value="{{ old('pendaftar.organisasi.1.jabatan') }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="" class="form-control-label">Tahun</label>
                                        <div class="input-group input-group-merge input-group-alternative mb-3">
                                            <input class="form-control" placeholder="Tahun" type="text" name="pendaftar[organisasi][1][tahun]" id="pendaftar[organisasi][1][tahun]" value="{{ old('pendaftar.organisasi.1.tahun') }}">
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <hr class="my-4">

                            <div class="row">
                                
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="" class="form-control-label">Nama organisasi</label>
                                        <div class="input-group input-group-merge input-group-alternative mb-3">
                                            <input class="form-control" placeholder="Nama organisasi" type="text" name="pendaftar[organisasi][2][nama]" id="pendaftar[organisasi][2][nama]" value="{{ old('pendaftar.organisasi.2.nama') }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="" class="form-control-label">Jabatan</label>
                                        <div class="input-group input-group-merge input-group-alternative mb-3">
                                            <input class="form-control" placeholder="Jabatan" type="text" name="pendaftar[organisasi][2][jabatan]" id="pendaftar[organisasi][2][jabatan]" value="{{ old('pendaftar.organisasi.2.jabatan') }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="" class="form-control-label">Tahun</label>
                                        <div class="input-group input-group-merge input-group-alternative mb-3">
                                            <input class="form-control" placeholder="Tahun" type="text" name="pendaftar[organisasi][2][tahun]" id="pendaftar[organisasi][2][tahun]" value="{{ old('pendaftar.organisasi.2.tahun') }}">
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <hr class="my-4">

                            <div class="row">
                                
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="" class="form-control-label">Nama organisasi</label>
                                        <div class="input-group input-group-merge input-group-alternative mb-3">
                                            <input class="form-control" placeholder="Nama organisasi" type="text" name="pendaftar[organisasi][3][nama]" id="pendaftar[organisasi][3][nama]" value="{{ old('pendaftar.organisasi.3.nama') }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="" class="form-control-label">Jabatan</label>
                                        <div class="input-group input-group-merge input-group-alternative mb-3">
                                            <input class="form-control" placeholder="Jabatan" type="text" name="pendaftar[organisasi][3][jabatan]" id="pendaftar[organisasi][3][jabatan]" value="{{ old('pendaftar.organisasi.3.jabatan') }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="" class="form-control-label">Tahun</label>
                                        <div class="input-group input-group-merge input-group-alternative mb-3">
                                            <input class="form-control" placeholder="Tahun" type="text" name="pendaftar[organisasi][3][tahun]" id="pendaftar[organisasi][3][tahun]" value="{{ old('pendaftar.organisasi.3.tahun') }}">
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <hr class="my-4">

                            <div class="row">
                                
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="" class="form-control-label">Nama organisasi</label>
                                        <div class="input-group input-group-merge input-group-alternative mb-3">
                                            <input class="form-control" placeholder="Nama organisasi" type="text" name="pendaftar[organisasi][4][nama]" id="pendaftar[organisasi][4][nama]" value="{{ old('pendaftar.organisasi.4.nama') }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="" class="form-control-label">Jabatan</label>
                                        <div class="input-group input-group-merge input-group-alternative mb-3">
                                            <input class="form-control" placeholder="Jabatan" type="text" name="pendaftar[organisasi][4][jabatan]" id="pendaftar[organisasi][4][jabatan]" value="{{ old('pendaftar.organisasi.4.jabatan') }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="" class="form-control-label">Tahun</label>
                                        <div class="input-group input-group-merge input-group-alternative mb-3">
                                            <input class="form-control" placeholder="Tahun" type="text" name="pendaftar[organisasi][4][tahun]" id="pendaftar[organisasi][4][tahun]" value="{{ old('pendaftar.organisasi.4.tahun') }}">
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                    
                    </div>

                    <!-- Riwayat Belajar -->
                    <div class="card bg-secondary border border-soft">
                        
                        <div class="card-header bg-transparent">
                            <h3 class="mb-0 text-center">Riwayat Belajar</h3>
                        </div>

                        <div class="card-body px-lg-5 py-lg-5">

                            <div class="form-group">
                                
                                <label for="pendaftar[ngaji][bahasa_arab]">Kitab nahwu dan/atau sharaf apa saja yang pernah dipelajari?</label>
                                <input class="form-control @error('pendaftar.ngaji.bahasa_arab') is-invalid @else form-control-alternative @enderror" placeholder="Contoh: Al-Muyassar, Al-Ajurrumiyah" type="text" name="pendaftar[ngaji][bahasa_arab]" id="pendaftar[ngaji][bahasa_arab]" value="{{ old('pendaftar.ngaji.bahasa_arab') }}" required>
                                <small>Tuliskan semua kitab yang pernah dipelajari, pisahkan dengan tanda koma (,)</small>

                                @error('pendaftar.ngaji.bahasa_arab')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror

                            </div>

                            <hr class="my-5">

                            <div class="form-group">

                                <label for="">Apakah Anda pernah belajar tahsin al-Qur'an?</label>
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="pendaftar[ngaji][riwayat_tahsin]" name="pendaftar[ngaji][riwayat_tahsin]" class="custom-control-input" value="Pernah">
                                    <label class="custom-control-label" for="pendaftar[ngaji][riwayat_tahsin]">Pernah</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="pendaftar[ngaji][riwayat_tahsin]2" name="pendaftar[ngaji][riwayat_tahsin]" class="custom-control-input" value="Belum">
                                    <label class="custom-control-label" for="pendaftar[ngaji][riwayat_tahsin]2">Belum</label>
                                </div>

                                @error('pendaftar.ngaji.riwayat_tahsin')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror

                            </div>
                            
                            <div class="form-group">

                                <label for="pendaftar[ngaji][hafalan]">Berapa banyak hafalan al-Qur'an Anda?</label>
                                <input class="form-control @error('pendaftar.ngaji.hafalan') is-invalid @else form-control-alternative @enderror" placeholder="Contoh: Al-Baqarah, Juz 30" type="text" name="pendaftar[ngaji][hafalan]" id="pendaftar[ngaji][hafalan]" value="{{ old('pendaftar.ngaji.hafalan') }}" required>

                                @error('pendaftar.ngaji.hafalan')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror

                            </div>

                        </div>
                    </div>

                    <!-- Motivasi -->
                    <div class="card bg-secondary border border-soft">
                        
                        <div class="card-header bg-transparent">
                            <h3 class="mb-0 text-center">Motivasi</h3>
                        </div>

                        <div class="card-body px-lg-5 py-lg-5">

                            <div class="form-group">
                                
                                <label for="pendaftar[data_diri][motivasi]">Apa motivasi Anda mengikuti Ma'had al 'Ilmi?</label>

                                <textarea name="pendaftar[data_diri][motivasi]" id="pendaftar[data_diri][motivasi]" cols="30" rows="10" class="form-control form-control-alternative @error('pendaftar.data_diri.motivasi') is-invalid @else form-control-alternative @enderror" required>{{ old('pendaftar.data_diri.motivasi') }}</textarea>

                                @error('pendaftar.data_diri.motivasi')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror

                            </div>

                        </div>
                    </div>

                    <!-- Dokumen-dokumen -->

                    <div class="card bg-secondary border border-soft">
                        
                        <div class="card-header bg-transparent">
                            <h3 class="mb-0 text-center">Dokumen</h3>
                        </div>

                        <div class="card-body px-lg-5 py-lg-5">

                            <div class="mb-4">
                                <small><i>Pastikan dokumen Anda dalam format PDF, JPEG, atau PNG dan berukuran tidak lebih dari 2MB</i></small>
                            </div>    
                        
                            <div class="form-group">
                               
                                <h4>Scan KTP/KTM</h4>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input @error('pendaftar.dokumen.scan_ktp') is-invalid @enderror" name="pendaftar[dokumen][scan_ktp]" id="pendaftar[dokumen][scan_ktp]" value="{{ old('pendaftar.dokumen.scan_ktp') }}" required>
                                    <label class="custom-file-label" for="pendaftar[dokumen][scan_ktp]">Select file</label>
                                </div>

                                @error('pendaftar.dokumen.scan_ktp')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror

                            </div>

                            <div class="form-group">
                               
                                <h4>Sertifikat MUBK</h4>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input @error('pendaftar.dokumen.sertifikat_mubk') is-invalid @enderror" name="pendaftar[dokumen][sertifikat_mubk]" id="pendaftar[dokumen][sertifikat_mubk]" value="{{ old('pendaftar.dokumen.sertifikat_mubk') }}">
                                    <label class="custom-file-label" for="pendaftar[dokumen][sertifikat_mubk]">Select file</label>
                                </div>

                                @error('pendaftar.dokumen.sertifikat_mubk')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror

                            </div>

                            <div class="form-group">
                               
                                <h4>Surat Rekomendasi</h4>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input @error('pendaftar.dokumen.rekomendasi') is-invalid @enderror" name="pendaftar[dokumen][rekomendasi]" id="pendaftar[dokumen][rekomendasi]" value="{{ old('pendaftar.dokumen.rekomendasi') }}" required>
                                    <label class="custom-file-label" for="pendaftar[dokumen][rekomendasi]">Select file</label>
                                </div>

                                @error('pendaftar.dokumen.rekomendasi')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror

                            </div>

                            <div class="form-group">
                               
                                <h4>Sertifikat-sertifikat</h4>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input @error('pendaftar.dokumen.sertifikat_lain') is-invalid @enderror" name="pendaftar[dokumen][sertifikat_lain]" id="pendaftar[dokumen][sertifikat_lain]" value="{{ old('pendaftar.dokumen.sertifikat_lain') }}">
                                    <label class="custom-file-label" for="pendaftar[dokumen][sertifikat_lain]">Select file</label>
                                </div>
                                <small>Silakan unggah sertifikat-sertifikat lain yang dimiliki. Bagian ini akan dijadikan pertimbangan dalam seleksi</small>

                                @error('pendaftar.dokumen.sertifikat_lain')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror

                            </div>

                        </div>
                    </div>

                    <!-- Pernyataan -->
                    <div class="card bg-secondary border border-soft" id="statement">
                        <div class="card-header bg-transparent">
                            <h3 class="mb-0 text-center">Pernyataan</h3>
                        </div>
                        <div class="card-body">
                            <h4>Ketiklah pernyataan-pernyataan berikut</h4>

                            <br>

                            <div class="form-group mb-4">

                                <span>Data yang saya berikan di atas adalah benar adanya</span>
                                <input type="text" class="form-control form-control-flush border-bottom" name="pendaftar[pernyataan][data_benar]" id="pendaftar[pernyataan][data_benar]" placeholder="Ketik di sini..." autocomplete="off" value="{{ old('pendaftar.pernyataan.data_benar') }}" required>

                                @error('pendaftar.pernyataan.data_benar')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror

                            </div>

                            <div class="form-group">

                                <span>Saya sanggup mengikuti berbagai kegiatan pendidikan di Ma'had al-'Ilmi selama satu tahun</span>
                                <input type="text" class="form-control form-control-flush border-bottom" name="pendaftar[pernyataan][sanggup_kegiatan]" id="pendaftar[pernyataan][sanggup_kegiatan]" placeholder="Ketik di sini..." autocomplete="off" value="{{ old('pendaftar.pernyataan.sanggup_kegiatan') }}" required>

                                @error('pendaftar.pernyataan.sanggup_kegiatan')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror

                            </div>

                            <div class="form-group">

                                <span>Saya sanggup memenuhi kewajiban sebagai santri Ma'had al-'Ilmi selama menjalani satu periode pendidikan di Ma'had al-'Ilmi</span>
                                <input type="text" class="form-control form-control-flush border-bottom" name="pendaftar[pernyataan][sanggup_kewajiban]" id="pendaftar[pernyataan][sanggup_kewajiban]" placeholder="Ketik di sini..." autocomplete="off" value="{{ old('pendaftar.pernyataan.sanggup_kewajiban') }}" required>

                                @error('pendaftar.pernyataan.sanggup_kewajiban')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror

                            </div>
                            
                                
                        </div>
                    </div>

                    <!--Submit -->
                    <div class="text-center">
                        <button type="button" class="btn btn-success mt-4" data-toggle="modal" data-target="#submit">
                            Kirim Data Pendaftaran Saya
                        </button>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="submit" tabindex="-1" role="dialog" aria-labelledby="submitLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Apakah Anda yakin?</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    Periksa kembali isian data Anda. Apakah Anda sudah yakin dan ingin mengirim data pendaftaran Anda? Data pendaftaran yang sudah dikirim tidak dapat diubah
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                    <input type="submit" class="btn btn-success" value="Ya, kirim data saya">
                                </div>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>


<script>
// Add the following code if you want the name of the file appear on select
$(".custom-file-input").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});
</script>
@endsection