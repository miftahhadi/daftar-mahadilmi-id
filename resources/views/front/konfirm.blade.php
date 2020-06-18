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
                </div>
            </div>
        </div>
    </div>

    <!-- Page content -->
    <div class="container mt--9 pb-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 text-center">
                <div class="card bg-secondary border border-soft">
                    <div class="card-body">
                        <span class="icon icon-shape icon-shape-success rounded-circle mb-4">
                            <i class="fas fa-check"></i>
                        </span>
                        <h1 class="mb-4">Data Anda Sudah Terkirim</h1>
                        <p class="lead mb-4 px-sm-5">
                            Terima kasih {{ $registrant->personal->nama }}, data pendaftaran Anda sudah tersimpan di database.
                        </p>
                        <p>Kode pendaftaran Anda adalah: <strong>{{ $registrant->random_char }}</strong>. Catatlah kode pendaftaran Anda.</p>
                        <p>Anda dapat melihat rincian pendaftaran Anda melalui tautan:</p>
                        <p><a href="{{ route('form.show', [ 'kode' => $registrant->random_char ]) }}">{{ route('form.show', [ 'kode' => $registrant->random_char ]) }}</a></p>
                        <a class="btn btn-primary animate-up-2 mt-4" href="{{ route('form.index') }}">Kembali ke Halaman Depan</a>

                    </div>                
                </div>

            </div>
        </div>
    </div>

</div>
@endsection