<?php

namespace LacosFofos\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use LacosFofos\Models\User;

class AdminController extends Controller
{
    public function login(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->input();
            if (Auth::attempt(['email' => $data['email'], 'password' => $data['password'], 'admin' => '1'])) {
                return redirect('/admin/dashboard');
            } else {
                return redirect('/admin')->with('flash_message_error', 'Usuário ou senha inválidos');
            }
        }
        return view('admin.admin_login');
    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function logout()
    {
        Session::flush();
        return redirect('/admin')->with('flash_message_success', 'Usuário deslogado com sucesso');
    }

    public function settings()
    {
        return view('admin.settings');
    }

    public function chkPassword(Request $request)
    {
        $data = $request->all();
        $current_password = $data['current_pwd'];
        $check_password = User::where(['admin' => '1'])->first();
        if (Hash::check($current_password, $check_password->password)) {
            echo "true"; die;
        } else {
            echo "false"; die;
        }
    }

    public function updatePassword(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            $check_password = User::where(['email' => Auth::user()->email])->first();
            $current_password = $data['current_pwd'];
        }
        if (Hash::check($current_password, $check_password->password)) {
            $password = bcrypt($data['new_pwd']);
            User::where('id', '1')->update(['password' => $password]);
            return redirect('/admin/settings')->with('flash_message_success', 'Senha atualizada com sucesso');
        } else {
            return redirect('/admin/settings')->with('flash_message_error', 'Senha atual incorreta');
        }
    }
}
