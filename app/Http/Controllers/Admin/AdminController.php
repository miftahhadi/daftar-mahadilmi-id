<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Registrant;
use App\Personal;
use App\Services\AdminDashboard;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        $admin = auth()->user();
        
        $dashboard = new AdminDashboard($admin);

        $urutan = $dashboard->urutan();

        $load = $dashboard->load();

        $personals = $dashboard->personals();

        $totalPendaftar = Registrant::count();
        
        return view('admin.admin', compact('personals', 'urutan', 'load', 'totalPendaftar'));
    }
}
