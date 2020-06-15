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

                <!-- Data Diri -->
                <div class="card bg-secondary border border-soft">
                    
                    <div class="card-header bg-transparent">
                        <h3 class="mb-0 text-center">Data Diri</h3>
                    </div>

                    <div class="card-body px-lg-5 py-lg-5">
                        
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <h4>Kode Pendaftaran</h4>
                                <p class="mb-0">{{ $registrant->random_char }}</p>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <h4>Terdaftar pada</h4>
                                <p class="mb-0">{{ $registrant->created_at }}</p>
                            </div>
                        </div>
                        
                    </div>
                        
                        <div class="form-group">
                            <h4>Nama lengkap</h4>
                            <p class="mb-0">{{ $registrant->personal->nama }}</p>

                        </div>
                        
                        <div class="row">

                            <div class="col-md-4">
                                <div class="form-group">
                                    
                                    <h4>Tempat lahir</h4>
                                    <p class="mb-0">{{ $registrant->personal->tempat_lahir }}</p>

                                </div>
                            </div>

                            <div class="col-md-4">

                                <h4>Tanggal lahir</h4>
                                <p class="mb-0">{{ $dt->format('d/m/Y') }}</p>

                            </div>

                            <div class="col-md-4">

                                <h4>Usia</h4>
                                <p class="mb-0">{{ $usia }} tahun</p>

                            </div>

                        </div>

                        <div class="form-group">

                            <h4>Jenis kelamin</h4>
                            <p class="mb-0">{{ $registrant->personal->jenis_kelamin }}</p>

                        </div>

                        <div class="form-group">

                            <h4>Alamat Asal</h4>
                            <p class="mb-0">{{ $registrant->personal->alamat_asal }}</p>

                        </div>
                        
                        <div class="form-group">

                            <h4>Alamat di Yogyakarta</h4>
                            <p class="mb-0">{{ $registrant->personal->alamat_jogja }}</p>
                        

                        </div>

                        <div class="form-group">

                            <h4>Nomor WhatsApp</h4>
                            <p class="mb-0">{{ $registrant->personal->nomor_wa }}</p>

                        </div>
                        
                        <div class="form-group">

                            <h4>Email aktif</h4>
                            <p class="mb-0">{{ $registrant->personal->email }}</p>

                        </div>
                        
                        <div class="form-group">

                            <h4>Pekerjaan</h4>
                            <p class="mb-0">{{ $registrant->personal->pekerjaan }}</p>

                        </div>

                        <div class="form-group">

                            <h4>Kesibukan saat ini</h4>
                            <p class="mb-0">{{ $registrant->personal->kesibukan }}</p>

                        </div>
                        
                    </div>
                </div>

                <!-- Riwayat Pendidikan -->
                <div class="card bg-secondary border border-soft">
                    
                    <div class="card-header bg-transparent">
                        <h3 class="mb-0 text-center">Riwayat Pendidikan</h3>
                    </div>

                    <div class="card-body px-lg-5 py-lg-5">
                    
                    @foreach($registrant->educations as $education)
                        <h4 class="text-muted">{{ $education->tingkat }}</h4>

                        <div class="row mb-4">
                            <div class="@if($education->tingkat == 'SD/MI' || $education->tingkat == 'SMP/MTs') col-md-6 @else col-md-4 @endif">
                                <h4>Nama Institusi:</h4>
                                <p class="mb-0">{{ $education->nama_institusi }}</p>
                            </div>

                            <div class="@if($education->tingkat == 'SD/MI' || $education->tingkat == 'SMP/MTs') col-md-6 @else col-md-4 @endif">
                                <h4>Tahun lulus:</h4>
                                <p class="mb-0">{{ $education->tahun_lulus }}</p>
                            </div>

                            @if($education->tingkat != 'SD/MI' && $education->tingkat != 'SMP/MTs')
                            <div class="col-md-4">
                                <h4>Bidang:</h4>
                                <p class="mb-0">
                                    {{ $education->jurusan ?? $education->prodi }}
                                </p>
                            </div>
                            @endif

                        </div>
                    @endforeach

                    </div>
                </div>

                <!-- Pengalaman Organisasi  -->                    
                <div class="card bg-secondary border border-soft">
                    
                    <div class="card-header bg-transparent">
                        <h3 class="mb-0 text-center">Pengalaman Organisasi</h3>
                    </div>

                    <div class="card-body px-lg-5 py-lg-5">

                    @foreach($registrant->organizations as $organisasi)

                        <div class="row mb-4">

                            <div class="col-md-4">
                                <div class="form-group">
                                    <h4>Nama organisasi</h4>
                                    <p class="mb-0">{{ $organisasi->nama }}</p>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <h4>Jabatan</h4>
                                    <p class="mb-0">{{ $organisasi->jabatan }}</p>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <h4>Tahun</h4>
                                    <p class="mb-0">{{ $organisasi->tahun }}</p>
                                </div>
                            </div>

                        </div>
                    @endforeach

                    </div>
                
                </div>

                <!-- Riwayat Belajar -->
                <div class="card bg-secondary border border-soft">
                    
                    <div class="card-header bg-transparent">
                        <h3 class="mb-0 text-center">Riwayat Belajar</h3>
                    </div>

                    <div class="card-body px-lg-5 py-lg-5">

                        <div class="form-group">
                            
                            <h4>Kitab nahwu dan/atau sharaf yang pernah dipelajari</h4>
                            <p class="mb-0">{{ $registrant->religious_study->bahasa_arab }}</p>

                        </div>

                        <div class="form-group">

                            <h4>Pernah belajar tahsin al-Qur'an</h4>
                            <p class="mb-0">{{ $registrant->religious_study->riwayat_tahsin }}</p>

                        </div>
                        
                        <div class="form-group">

                            <h4>Banyak hafalan al-Qur'an</h4>
                            <p class="mb-0">{{ $registrant->religious_study->hafalan }}</p>

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
                            
                            <h4>Motivasi mengikuti Ma'had al 'Ilmi</h4>

                            <p class="mb-0">{{ $registrant->personal->motivasi }}</p>

                        </div>

                    </div>
                </div>

                <!-- Dokumen-dokumen -->

                <div class="card bg-secondary border border-soft">
                    
                    <div class="card-header bg-transparent">
                        <h3 class="mb-0 text-center">Dokumen</h3>
                    </div>

                    <div class="card-body px-lg-5 py-lg-5">

                       @foreach($registrant->documents as $dokumen)
                        <div class="form-group">
                            
                            <h4>{{ $dokumen->tipe }}</h4>
                            <a href="/storage/{{ $dokumen->path }}" class="btn btn-secondary btn-small active">
                                <div>
                                    <i class="ni ni-folder-17"></i>
                                    <span>Buka dokumen</span>
                                </div>
                            </a>
            
                        </div>
                        @endforeach

                    </div>
                </div>

                <!-- Pernyataan -->
                <div class="card bg-secondary border border-soft" id="statement">
                    <div class="card-header bg-transparent">
                        <h3 class="mb-0 text-center">Pernyataan</h3>
                    </div>
                    <div class="card-body">

                    <blockquote class="blockquote">
                        <p class="mb-2">{{ $registrant->statement->data_benar }}</p>

                        <p class="mb-2">{{ $registrant->statement->sanggup_kegiatan }}</p>

                        <p class="mb-2">{{ $registrant->statement->sanggup_kewajiban }}</p>
                        <footer class="blockquote-footer">{{ $registrant->personal->nama }}</footer>
                    </blockquote>

                </div>                    

            </div>
        </div>
    </div>
</div>

@endsection