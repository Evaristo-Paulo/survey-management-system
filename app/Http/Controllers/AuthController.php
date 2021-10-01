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
                    'emaillogin' => 'required|email',
                    'passwordlogin' => 'required|min:6',
                ],
                [
                    'emaillogin.required' => 'Campo E-mail é obrigatório',
                    'emaillogin.email' => 'E-mail inválido',
                    'passwordlogin.required' => 'Campo Senha é obrigatório',
                    'passwordlogin.min' => 'Senha deve ter no mínimo 6 caracteres',
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
                'email' => $request->input('emaillogin'),
                'password' => $request->input('passwordlogin')
            ];

            if (Auth::attempt($credentials)) {
                Auth::logoutOtherDevices($request->input('passwordlogin'));
                $user = auth()->user();
                Auth::login($user);

                session()->flash('success', 'Usuário logado');
                if (session('success')) {
                    Alert::toast(session('success'), 'success');
                }

                return redirect()->route('survey.mine');
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

        return redirect()->back();
    }
}
