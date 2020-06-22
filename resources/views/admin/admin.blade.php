@extends('layouts.basic')


@section('content')

<!-- Sidenav -->

  <!-- Main content -->
  <div class="main-content" id="panel">
    <!-- Topnav -->
    <nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
      <div class="container">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          
          <!-- Navbar links -->
          <ul class="navbar-nav align-items-center  ml-md-auto ">
            <li class="nav-item">
              <a class="nav-link" href="{{ route('form.index') }}">
                Form Pendaftaran
              </a>
            </li>
            @if (auth()->user()->roles->last()->role == 'Super Admin')
            <li class="nav-item dropdown">
              <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Pendaftar
              </a>
              <div class="dropdown-menu dropdown-menu-right">

                <!-- List group -->
                <div class="list-group list-group-flush">
                  <a href="{{ route('admin') }}?ikhwan" class="list-group-item list-group-item-action">
                    Pendaftar Ikhwan
                  </a>
                  <a href="{{ route('admin') }}?akhawat" class="list-group-item list-group-item-action">
                    Pendaftar Akhawat
                  </a>                    
                </div>
                <!-- View all -->
                <a href="{{ route('admin') }}" class="dropdown-item text-center text-primary font-weight-bold py-3">Semua Pendaftar</a>
              </div>
            </li>
            @endif
          </ul>
          <ul class="navbar-nav align-items-center  ml-auto ml-md-0 ">
            <li class="nav-item dropdown">
                <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{ auth()->user()->name }}
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <!-- List group -->
                    <div class="list-group list-group-flush">
                        <a href="{{ route('logout') }}" class="list-group-item list-group-item-action">
                            Keluar
                        </a>  
                    </div>
                </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Header -->
    <!-- Header -->
    <div class="header bg-primary pb-6">
      <div class="container">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
                <img src="/assets/img/brand/logo-white.png" alt="" class="mb-6">
              <h2 class="h2 text-white d-inline-block mb-0">Portal Pendaftaran Ma'had al-'Ilmi</h6>
              <!--<nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="#">Dashboards</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Default</li>
                </ol>
              </nav>-->
            </div>
            <!--<div class="col-lg-6 col-5 text-right">
              <a href="#" class="btn btn-sm btn-neutral">New</a>
              <a href="#" class="btn btn-sm btn-neutral">Filters</a>
            </div>-->
          </div>
          <!-- Card stats -->
          
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container mt--6">
        <div class="card">
            <div class="card-header border-0">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="mb-0">Rekaman Pendaftaran</h3>
                    </div>
                    <!--<div class="col text-right">
                        <a href="#!" class="btn btn-sm btn-primary">See all</a>
                    </div>-->
                </div>
            </div>
            <div class="table-responsive">
                <!-- Projects table -->
                <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Kode Pendaftaran</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Jenis Kelamin</th>
                            <th scope="col">Waktu Pendaftaran</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>

                    @forelse($personals as $pendaftar)
                        <tr>
                            <td>{{ ++$urutan }}</td>
                            <th scope="row">
                                {{ $pendaftar->registrant->random_char }}
                            </th>
                            <td>{{ $pendaftar->nama }}</td>
                            <td>{{ $pendaftar->jenis_kelamin  }}</td>
                            <td>{{ $pendaftar->registrant->created_at }}</td>
                            <td>
                                <div class="btn-list ml-auto">
                                    <a href="{{ route('form.show', [ 'kode' => $pendaftar->registrant->random_char ]) }}" class="btn btn-primary btn-sm" target="_blank">Lihat Data</a>
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapusData">Hapus</button>
                                </div>                            
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5">Belum ada pendaftar</td>
                        </tr>
                    @endforelse

                    </tbody>
                </table>
            </div>
        </div>        
        
        {{ $personals->links() }}
        
        <!-- Footer -->
        <footer class="footer pt-0">
        <div class="row align-items-center justify-content-lg-between">
          <div class="col-lg-6">
            <div class="copyright text-center  text-lg-left  text-muted">
              &copy; 2020 <span class="font-weight-bold ml-1" target="_blank">Ma'had Al-'Ilmi Yogyakarta</span>
            </div>
          </div>
        </div>
        </footer>
    
    </div>
  </div>

<!-- Modal -->
<!--<div class="modal fade" id="hapusData" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body">
        Anda yakin ingin menghapus item ini?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
        <form action="" method="post">

          <input type="hidden" name="id" id="dataID">
          <input type="submit" class="btn btn-danger" value="Hapus">
        </form>
      </div>
    </div>
  </div>
</div>
-->
<script>
  $('#hapusData').on('show.bs.modal', function (event) {
  let button = $(event.relatedTarget) // Button that triggered the modal
  let id = button.data('id') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  let modal = $(this)
  modal.find('.modal-footer #dataID').val(id)
  })
</script>

@endsection