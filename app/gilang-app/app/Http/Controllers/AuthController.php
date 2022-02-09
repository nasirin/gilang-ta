<?php

namespace App\Http\Controllers;

use App\Models\employees;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index()
    {
        return view('pages.login');
    }

    public function login(Request $request)
    {
        $employee = employees::where('username', $request['username'])->where('password', $request['password'])->first();
        if ($employee) {
            $data = ['id' => $employee['id'], 'username' => $employee['username'], 'akses' => $employee['akses']];
            session($data);
            toastr()->success('Selamat data' . ' ' . session('username'));
            return redirect()->to('/');
        } else {
            toastr()->warning('akun tidak di temukan');
            return redirect()->back();
        }
    }

    public function signout()
    {
        session()->flush();
        return view('pages.login');
    }
}
