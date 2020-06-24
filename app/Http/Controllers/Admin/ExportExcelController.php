<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Rap2hpoutre\FastExcel\FastExcel;
use App\Registrant;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;

class ExportExcelController extends Controller
{

    public function tanggal() 
    {
        return Carbon::now(new \DateTimeZone('Asia/Jakarta'));
    }

    public function filename()
    {
        $tanggal = $this->tanggal();

        return 'Pendaftar MI_' . $tanggal . '.xlsx';
    }

    public function registrants($jenisKelamin = null)
    {
        if (!is_null($jenisKelamin)) {
            $registrants = Registrant::whereHas('personal', function (Builder $query) {
                $query->where('jenis_kelamin', 'Perempuan');
            })->get();
        } else {
            $registrants = Registrant::all();
        }

        return $registrants;
    }

    public function registrantsGenerator()
    {
        foreach (Registrant::cursor() as $registrant){
            yield $registrant;
        }
    }

    public function exportExcel()
    {

        $admin = auth()->user();

        if ($admin->isAdminAkhawat() || (request('pendaftar') && request('pendaftar') == 'Perempuan')) {

            $registrants = $this->registrants('Perempuan');
        
        } elseif ($admin->isAdminIkhwan() || (request('pendaftar') && request('pendaftar') == 'Laki-laki')) {
        
            $registrants = $this->registrants('Laki-laki');
        
        } else {
        
            $registrants = $this->registrants();
        
        }        

        $filename = $this->filename();

        return (new FastExcel($registrants))->download($filename, function($pendaftar) {
            return [
                'ID Pendaftar' => $pendaftar->id,
                'Terdaftar pada' => $pendaftar->created_at,
                'Kode Pendaftaran' => $pendaftar->random_char,
                'Nama' => $pendaftar->personal->nama,
                'Tempat Lahir' => $pendaftar->personal->tempat_lahir,
                'Tanggal Lahir' => $pendaftar->personal->tanggal_lahir,
                'Jenis Kelamin' => $pendaftar->personal->jenis_kelamin,
                'Alamat Asal' => $pendaftar->personal->alamat_asal,
                'Alamat di Jogja' => $pendaftar->personal->alamat_jogja,
                'Nomor WhatsApp' => $pendaftar->personal->nomor_wa,
                'Email' => $pendaftar->personal->email,
                'Pekerjaan' => $pendaftar->personal->pekerjaan,
                'Kesibukan' => $pendaftar->personal->kesibukan
            ];
        });
    }
}
