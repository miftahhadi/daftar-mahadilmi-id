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

        // if (auth()->user()->roles() == 'Admin Akhawat') {
        //     $registrants = Registrant::where('personal.jenis_kelamin', 'Perempuan')->get();
        // } elseif (auth()->user()->roles() == 'Admin Ikhwan') {
        //     $registrants = Registrant::where('personal.jenis_kelamin', 'Perempuan')->get();
        // } else {
        //     $registrants = Registrant::all();
        // }
     
        // if (request('pendaftar')) {
        //     if (request('pendaftar') == 'akhawat') {
        //         $registrants = Registrant::where('personal.jenis_kelamin', 'Perempuan')->get();
        //     } elseif (request('pendaftar') == 'ikhwan') {
        //         $registrants = Registrant::where('personal.jenis_kelamin', 'Laki-laki')->get();
        //     }
        // } else {
            
        // }

        $registrants = Registrant::all();

        return view('admin.admin', compact('registrants', 'role'));
    }
}
