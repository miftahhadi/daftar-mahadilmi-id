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
        $sertifMubkPath = $request->pendaftar['dokumen']['sertifikat_mubk']->store('sertifikat_mubk','public');

        // Surat Rekomendasi
        $rekomendasiPath = $request->pendaftar['dokumen']['rekomendasi']->store('rekomendasi', 'public');

        // Sertifikat lain-lain
        $sertifPath = $request->pendaftar['dokumen']['sertifikat_lain']->store('misc','public');

        return [
            'ktpPath' => $ktpPath,
            'sertifMubkPath' => $sertifMubkPath,
            'rekomendasiPath' => $rekomendasiPath,
            'sertifPath' => $sertifPath
        ];

    }

    private function formatTanggalLahir($tanggalLahir)
    {
        $date = Carbon::createFromFormat('m/d/Y', $tanggalLahir);

        $tanggalLahirFormatted = $date->format('Y-m-d');

        return $tanggalLahirFormatted;

    } 

    public function saveData(SubmitRegistration $request)
    {
        // Generate random string, write to registrant table
        $random_char = Str::random(10);

        $regisrant = Registrant::create(['random_char' => $random_char]);

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
        $dokumen = $this->storeDocuments($request);

        $scanKTP = $regisrant->documents()->create([
            'tipe' => 1,
            'path' => $dokumen['ktpPath']
        ]);

        $sertifMubk = $regisrant->documents()->create([
            'tipe' => 2,
            'path' => $dokumen['sertifMubkPath']
        ]);

        $rekomendasi = $regisrant->documents()->create([
            'tipe' => 3,
            'path' => $dokumen['rekomendasiPath']
        ]);

        $sertifLain = $regisrant->documents()->create([
            'tipe' => 4,
            'path' => $dokumen['sertifPath']
        ]);

        return $regisrant;
    }
}