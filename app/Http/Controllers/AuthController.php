<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        try {
            $validator = Validator::make(
                $request->all(),
                [
                    'email' => 'required|email',
                    'password' => 'required|min:6',
                ],
                [
                    'email.required' => 'Campo E-mail é obrigatório',
                    'email.email' => 'E-mail inválido',
                    'password.required' => 'Campo Senha é obrigatório',
                    'password.min' => 'Senha deve ter no mínimo 6 caracteres',
                ]
            );

            if ($validator->fails()) {
                session()->flash('error', 'Verifique os campos e tenta novamente');
                if (session('error')) {
                    Alert::toast(session('error'), 'error');
                }
                return redirect()->back()->withErrors($validator->errors())->withInput();
            }
            $credentials = [
                'email' => $request->input('email'),
                'password' => $request->input('password')
            ];

            if (Auth::attempt($credentials)) {
                Auth::logoutOtherDevices($request->input('password'));
                $user = auth()->user();
                Auth::login($user);

                session()->flash('success', 'Usuário logado');
                if (session('success')) {
                    Alert::toast(session('success'), 'success');
                }

                return redirect()->back();
            }

            session()->flash('warning', 'E-mail ou Senha não encontrada');
            if (session('warning')) {
                Alert::toast(session('warning'), 'warning');
            }
            return redirect()->back()->with('error', 'E-mail ou senha não encontrada')->withInput($request->all());
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function logout()
    {
        Auth::logout();

        session()->flash('warning', 'Usuário fez o logout');
        if (session('warning')) {
            Alert::toast(session('warning'), 'warning');
        }

        return "logout";
        return redirect()->back();
    }
}
