<?php

namespace App\Services;
use Illuminate\Http\Request;
use App\Personal;

class AdminDashboard
{

    private $admin;

    public function __construct($admin)
    {
        $this->admin = $admin;
    }

    public function load()
    {
        return request('load') ?? 10;
    }

    public function urutan()
    {
        if ($this->load() != 'all') {
            $page = (int)request('page') == 0 || (int)request('page') == 1 ? 1 : (int)request('page');

            $urutan = ($page - 1) * $this->load(); 
        } else {
            $urutan = 0;
        }
    
        return $urutan;
    }

    private function fetch($load, $jenisKelamin = null)
    {
        if (!is_null($jenisKelamin)) {
            return Personal::where('jenis_kelamin', $jenisKelamin)->paginate($load);
        } else {
            return Personal::paginate($load);
        }
    }

    private function fetchAll($jenisKelamin = null)
    {
        if (!is_null($jenisKelamin)) {
            return Personal::where('jenis_kelamin', $jenisKelamin)->get();
        } else {
            return Personal::all();
        }
    }

    public function personals()
    {

        if ($this->admin->isAdminAkhawat() && ($this->load() == 'all')) {

            $personals = $this->fetchAll('Perempuan');
        
        } elseif ($this->admin->isAdminAkhawat() && ($this->load() != 'all')) {
        
            $personals = $this->fetch($this->load(), 'Perempuan');
        
        } elseif ($this->admin->isAdminIkhwan() && ($this->load() == 'all')) {
        
            $personals = $this->fetchAll('Laki-laki');
        
        } elseif ($this->admin->isAdminIkhwan() && ($this->load() != 'all')) {
        
            $personals = $this->fetch($this->load(), 'Laki-laki');
        
        } elseif ($this->admin->isSuperAdmin() && ($this->load() == 'all')) {
        
            if (request('pendaftar')) {

                $personals = $this->fetchAll(request('pendaftar'));

            } else {

                $personals = $this->fetchAll();

            }
            
        } elseif ($this->admin->isSuperAdmin() && ($this->load() != 'all')) {

            if (request('pendaftar')) {

                $personals = $this->fetch($this->load(), request('pendaftar'));

            } else {

                $personals = $this->fetch($this->load());

            }
        
        }

        return $personals;

    }
    
}