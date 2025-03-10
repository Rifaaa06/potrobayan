<?php

namespace App\Http\Controllers;

use App\Models\AlatCamp;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    public function home()
    {
        return view('user.home');
    }

    public function services()
    {
        return view('user.services');
    }

    public function gallery()
    {
        return view('user.gallery');
    }

    public function maps()
    {
        return view('user.maps');
    }

    public function reservation()
    {
        return view('user.reservation');
    }

    public function alatCamp()
    {
        $alat_camps = AlatCamp::all();
        return view('user.alatCamp', compact('alat_camps'));
    }

    public function akun()
    {
        return view('user.akun');
    }

    public function updateAkun()
    {
        return view('user.updateAkun');
    }

    public function login()
    {
        return view('auth.login');
    }

    
}
