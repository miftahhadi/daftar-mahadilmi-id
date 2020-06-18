<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\SubmitRegistration;
use App\Services\SubmitFormService;
use App\Registrant;
use App\Personal;
use Carbon\Carbon;

class FormController extends Controller
{
    public function index()
    {
        return view('front.form');
    }

    public function store(SubmitRegistration $request)
    {


        $data = $request->validated();

        $submitForm = new SubmitFormService($data['pendaftar']);

        $registrant = $submitForm->saveData($request);

        $url = '/konfirmasi/' . $registrant->random_char;

        return redirect($url);

    }

    public function konfirmasi($kode)
    {
        $registrant = Registrant::where('random_char', $kode)->firstOrFail();

        return view('front.konfirm', compact('registrant'));
    }

    public function show($kode)
    {
        $registrant = Registrant::where('random_char', $kode)->firstOrFail();

        $dt = Carbon::createFromFormat('Y-m-d', $registrant->personal->tanggal_lahir);

        $usia = $dt->diffInYears(Carbon::now());

        return view('front.show', compact('registrant', 'dt', 'usia'));
    }
}
