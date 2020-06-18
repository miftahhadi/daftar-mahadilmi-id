<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubmitRegistration extends FormRequest
{

    private $data_benar = "Data yang saya berikan di atas adalah benar adanya";

    private $sanggup_kegiatan = "Saya sanggup mengikuti berbagai kegiatan pendidikan di Ma'had al-'Ilmi selama satu tahun";

    private $sanggup_kewajiban = "Saya sanggup memenuhi kewajiban sebagai santri Ma'had al-'Ilmi selama menjalani satu periode pendidikan di Ma'had al-'Ilmi";
    
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'pendaftar.data_diri.nama' => 'required',
            'pendaftar.data_diri.tempat_lahir' => 'required',
            'pendaftar.data_diri.tanggal_lahir' => 'required',
            'pendaftar.data_diri.jenis_kelamin' => 'required',
            'pendaftar.data_diri.alamat_asal' => 'required',
            'pendaftar.data_diri.alamat_jogja' => 'required',
            'pendaftar.data_diri.nomor_wa' => ['required', 'unique:App\Personal,nomor_wa'],
            'pendaftar.data_diri.email' => ['required', 'unique:App\Personal,email'],
            'pendaftar.data_diri.pekerjaan' => 'required',
            'pendaftar.data_diri.kesibukan' => 'required',
            'pendaftar.data_diri.motivasi' => 'required',
            'pendaftar.pendidikan.1.tingkat' => '',
            'pendaftar.pendidikan.1.nama_institusi' => 'required',
            'pendaftar.pendidikan.1.tahun_lulus' => 'required',
            'pendaftar.pendidikan.2.tingkat' => '',
            'pendaftar.pendidikan.2.nama_institusi' => 'required',
            'pendaftar.pendidikan.2.tahun_lulus' => 'required',
            'pendaftar.pendidikan.3.tingkat' => '',
            'pendaftar.pendidikan.3.nama_institusi' => 'required',
            'pendaftar.pendidikan.3.tahun_lulus' => 'required',
            'pendaftar.pendidikan.3.jurusan' => '',
            'pendaftar.pendidikan.4.tingkat' => '',
            'pendaftar.pendidikan.4.nama_institusi' => '',
            'pendaftar.pendidikan.4.tahun_lulus' => '',
            'pendaftar.pendidikan.4.prodi' => '',
            'pendaftar.pendidikan.5.tingkat' => '',
            'pendaftar.pendidikan.5.nama_institusi' => '',
            'pendaftar.pendidikan.5.tahun_lulus' => '',
            'pendaftar.pendidikan.5.prodi' => '',
            'pendaftar.pendidikan.6.tingkat' => '',
            'pendaftar.pendidikan.6.nama_institusi' => '',
            'pendaftar.pendidikan.6.tahun_lulus' => '',
            'pendaftar.pendidikan.6.prodi' => '',
            'pendaftar.organisasi.1.nama' => '',
            'pendaftar.organisasi.1.jabatan' => '',
            'pendaftar.organisasi.1.tahun' => '',
            'pendaftar.organisasi.2.nama' => '',
            'pendaftar.organisasi.2.jabatan' => '',
            'pendaftar.organisasi.2.tahun' => '',
            'pendaftar.organisasi.3.nama' => '',
            'pendaftar.organisasi.3.jabatan' => '',
            'pendaftar.organisasi.3.tahun' => '',
            'pendaftar.organisasi.4.nama' => '',
            'pendaftar.organisasi.4.jabatan' => '',
            'pendaftar.organisasi.4.tahun' => '',
            'pendaftar.ngaji.bahasa_arab' => 'required',
            'pendaftar.ngaji.riwayat_tahsin' => 'required',
            'pendaftar.ngaji.hafalan' => 'required',
            'pendaftar.dokumen.scan_ktp' => ['required', 'file', 'mimetypes:application/pdf,image/jpeg,image/png','max:2048'],
            'pendaftar.dokumen.sertifikat_mubk' => ['file', 'mimetypes:application/pdf,image/jpeg,image/png','max:2048'],
            'pendaftar.dokumen.rekomendasi' => ['file', 'mimetypes:application/pdf,image/jpeg,image/png','max:2048'],
            'pendaftar.dokumen.sertifikat_lain' => ['file', 'mimetypes:application/pdf,image/jpeg,image/png','max:2048'],
            'pendaftar.pernyataan.data_benar' => [
                'required',
                function($attribute, $value, $fail) {
                    if ($value != $this->data_benar) {
                        $fail('Terdapat kesalahan, mohon periksa kembali');
                    }
                },
            ],
            'pendaftar.pernyataan.sanggup_kegiatan' => [
                'required',
                function($attribute, $value, $fail) {
                    if ($value != $this->sanggup_kegiatan) {
                        $fail('Terdapat kesalahan, mohon periksa kembali');
                    }
                },
            ],
            'pendaftar.pernyataan.sanggup_kewajiban' => [
                'required',
                function($attribute, $value, $fail) {
                    if ($value != $this->sanggup_kewajiban) {
                        $fail('Terdapat kesalahan, mohon periksa kembali');
                    }
                },
            ]
        ];
    }

    public function messages()
    {
        return [
            'pendaftar.data_diri.nama.required' => 'Mohon isikan nama lengkap Anda',
            'pendaftar.data_diri.tempat_lahir.required' => 'Mohon isikan tempat lahir Anda',
            'pendaftar.data_diri.tanggal_lahir.required' => 'Mohon isikan tanggal lahir Anda',
            'pendaftar.data_diri.jenis_kelamin.required' => 'Mohon isikan jenis kelamin Anda',
            'pendaftar.data_diri.alamat_asal.required' => 'Mohon isikan alamat asal Anda',
            'pendaftar.data_diri.alamat_jogja.required' => 'Mohon isikan alamat Anda di Yogyakarta',
            'pendaftar.data_diri.nomor_wa.required' => 'Mohon isikan nomor WhatsApp aktif Anda',
            'pendaftar.data_diri.nomor_wa.unique' => 'Nomor WhatsApp ini sudah terdaftar, mohon isikan nomor lain',
            'pendaftar.data_diri.email.required' => 'Mohon isikan alamat email aktif Anda',
            'pendaftar.data_diri.email_unique' => 'Alamat email ini sudah terdaftar, mohon isikan alamat email lain',
            'pendaftar.data_diri.pekerjaan.required' => 'Mohon isikan pekerjaan Anda',
            'pendaftar.data_diri.kesibukan.required' => 'Mohon isikan kesibukan Anda saat ini',
            'pendaftar.data_diri.motivasi.required' => 'Mohon isikan motivasi Anda mengikuti Ma\'had al \'Ilmi',
            'pendaftar.pendidikan.1.nama_institusi.required' => 'Mohon isikan nama sekolah',
            'pendaftar.pendidikan.1.tahun_lulus.required' => 'Mohon isikan tahun lulus',
            'pendaftar.pendidikan.2.nama_institusi.required' => 'Mohon isikan nama sekolah',
            'pendaftar.pendidikan.2.tahun_lulus.required' => 'Mohon isikan tahun lulus',
            'pendaftar.pendidikan.3.nama_institusi.required' => 'Mohon isikan nama sekolah',
            'pendaftar.pendidikan.3.tahun_lulus.required' => 'Mohon isikan tahun lulus',
            'pendaftar.ngaji.bahasa_arab.required' => 'Mohon isikan daftar kitab nahwu-sharaf yang pernah dipelajari',
            'pendaftar.ngaji.riwayat_tahsin.required' => 'Mohon beri keterangan riwayat belajar tahsin Anda',
            'pendaftar.ngaji.hafalan.required' => 'Mohon isikan jumlah hafalan Anda',
            'pendaftar.dokumen.scan_ktp.required' => 'Mohon unggah scan KTP Anda',
            'pendaftar.dokumen.scan_ktp.mimetypes' => 'File yang diizinkan hanya yang berformat JPEG atau PDF',
            'pendaftar.dokumen.scan_ktp.max' => 'Ukuran file yang diizinkan maksimal 2MB',
            'pendaftar.dokumen.sertifikat_mubk.mimetypes' => 'File yang diizinkan hanya yang berformat JPEG atau PDF',
            'pendaftar.dokumen.sertifikat_mubk.max' => 'Ukuran file yang diizinkan maksimal 2MB',
            'pendaftar.dokumen.rekomendasi.mimetypes' => 'File yang diizinkan hanya yang berformat JPEG atau PDF',
            'pendaftar.dokumen.rekomendasi.max' => 'Ukuran file yang diizinkan maksimal 2MB',
            'pendaftar.dokumen.sertifikat_lain.mimetypes' => 'File yang diizinkan hanya yang berformat JPEG atau PDF',
            'pendaftar.dokumen.sertifikat_lain.max' => 'Ukuran file yang diizinkan maksimal 2MB',
            'pendaftar.pernyataan.data_benar.required' => 'Mohon ketikkan pernyataan kebenaran data',
            'pendaftar.pernyataan.sanggup_kegiatan.required' => 'Mohon ketikkan pernyataan kesanggupan menjalani kegiatan MI',
            'pendaftar.pernyataan.sanggup_kewajiban.required' => 'Mohon ketikkan pernyataan kesanggupan menjalani kewajiban sebagai santri MI',

        ];
    }
}
