<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Registrant;
use App\Personal;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        $admin = auth()->user();
        
        // Variabel-variabel untuk pagination
        $load = request('load') ?? 10;
        
        $page = (int)request('page') == 0 || (int)request('page') == 1 ? 1 : (int)request('page');
        
        $urutan = ($page - 1) * $load;
        // End variabel pagination
        
         if ($admin->isAdminAkhawat()) {
             $personals = Personal::where('jenis_kelamin', 'Perempuan')->paginate($load);
         } elseif ($admin->isAdminIkhwan()) {
             $personals = Personal::where('jenis_kelamin', 'Laki-laki')->paginate($load);
         } else {
             $personals = Personal::paginate($load);
         }
               
        if (request('pendaftar') && request('pendaftar') == 'akhawat') {
             $personals = Personal::where('jenis_kelamin', 'Perempuan')->paginate($load);
        } elseif (request('pendaftar') && request('pendaftar') == 'ikhwan') {
             $personals = Personal::where('jenis_kelamin', 'Laki-laki')->paginate($load);
        }


        return view('admin.admin', compact('personals', 'urutan', 'load'));
    }
}
