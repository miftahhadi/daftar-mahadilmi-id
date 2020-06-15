@extends('front.front')

@section('main')
  <!-- Main content -->
  <div class="main-content">
    <!-- Header -->
    <div class="header bg-mahadilmi py-7 py-lg-8 pt-lg-9">
        <div class="container">
            <div class="header-body text-center mb-7">
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
    </div>
    <!-- Page content -->
    <div class="container mt--9 pb-5">
      <!-- Table -->
      <div class="row justify-content-center">
        <div class="col-lg-8 col-md-8">
          <div class="card bg-secondary border border-soft">
            <div class="card-header bg-transparent">
              <h3 class="mb-0 text-center">Masuk ke akun Anda</h3>
            </div>
            <div class="card-body px-lg-5 py-lg-5">

              <form method="POST" action="{{ route('login') }}" role="form">
                @csrf

                <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary my-4">Sign in</button>
                        </div>

                
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
