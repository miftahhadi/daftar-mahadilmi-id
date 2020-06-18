<?php

namespace App\Services;

use Illuminate\Support\Str;
use App\Http\Requests\SubmitRegistration;
use App\Registrant;
use Carbon\Carbon;

class SubmitFormService 
{
    private $validatedData;

    public function __construct($validatedData)
    {
        $this->validatedData = $validatedData;
    }

    public function storeDocuments(SubmitRegistration $request)
    {

        // Scan KTP
        $ktpPath = $request->pendaftar['dokumen']['scan_ktp']->store('ktp','public');

        // Sertifikat MUBK
        if(array_key_exists('sertifikat_mubk',$request->pendaftar['dokumen'])) {
            $sertifMubkPath = $request->pendaftar['dokumen']['sertifikat_mubk']->store('sertifikat_mubk','public');    
        }

        // Sertifikat lain-lain
        if (array_key_exists('sertifikat_lain',$request->pendaftar['dokumen'])) {
            $sertifPath = $request->pendaftar['dokumen']['sertifikat_lain']->store('misc','public');   
        }
        
        return [
            'ktpPath' => $ktpPath,
            'sertifMubkPath' => $sertifMubkPath ?? '',
            'sertifPath' => $sertifPath ?? ''
        ];

    }

    private function formatTanggalLahir($tanggalLahir)
    {
        $date = Carbon::createFromFormat('Y-m-d', $tanggalLahir);

        $tanggalLahirFormatted = $date->format('Y-m-d');

        return $tanggalLahirFormatted;

    } 

    public function saveData(SubmitRegistration $request)
    {
        // Generate random string, write to registrant table
        $random_char = Str::random(10);

        $regisrant = Registrant::create(['random_char' => $random_char]);
        
        // Store dokumen
        $dokumen = $this->storeDocuments($request);

        // Write data diri to db
        $dataDiri = $this->validatedData['data_diri'];

        $dataDiri['tanggal_lahir'] = $this->formatTanggalLahir($dataDiri['tanggal_lahir']);

        $regisrant->personal()->create($dataDiri);

        // Write riwayat pendidikan to db
        $educations = $this->validatedData['pendidikan'];

        foreach ($educations as $education) {
            $regisrant->educations()->create($education);
        }

        // Write pengalaman organisasi to db
        $organizations = $this->validatedData['organisasi'];

        foreach ($organizations as $organization) {
            $regisrant->organizations()->create($organization);
        }

        // write riwayat belajar to db
        $ngaji = $this->validatedData['ngaji'];

        $regisrant->religious_study()->create($ngaji);

        // write pernyataan to db
        $statement = $this->validatedData['pernyataan'];

        $regisrant->statement()->create($statement);

        // write dokumen to db

        $scanKTP = $regisrant->documents()->create([
            'tipe' => 1,
            'path' => $dokumen['ktpPath']
        ]);

        if($dokumen['sertifMubkPath']) {
            $sertifMubk = $regisrant->documents()->create([
            'tipe' => 2,
            'path' => $dokumen['sertifMubkPath']
        ]);    
        }
        

        if ($dokumen['sertifPath']){
            $sertifLain = $regisrant->documents()->create([
                'tipe' => 4,
                'path' => $dokumen['sertifPath']
            ]);
        }

        return $regisrant;
    }
}