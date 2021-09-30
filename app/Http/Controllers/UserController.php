<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function user_register_save (Request $request){
        try {

            $validator = Validator::make($request->all(), [
                'name' => 'required|min:3',
                'password' => 'required|min:6',
                'repeat' => 'required|same:password',
                'email' => 'required|email|unique:users,email',
            ], [
                'name.required' => 'Campo Nome completo é de preenchimento obrigatório',
                'password.required' => 'Campo Senha é de preenchimento obrigatório',
                'repeat.required' => 'Campo Repetir senha é de preenchimento obrigatório',
                'repeat.same' => 'Campo Repetir senha deve ser igual ao campo Senha',
                'name.min' => 'Campo Nome completo deve ter no mínimo 3 caracteres',
                'password.min' => 'Campo Senha deve ter no mínimo 6 caracteres',
                'email.required' => 'Campo E-mail é de preenchimento obrigatório',
                'email.required' => 'Campo E-mail é de preenchimento obrigatório',
                'email.unique' => 'Este E-mail já esta sendo utilizado',
                'email.email' => 'Informe um E-mail válido',
            ]);

            if ($validator->fails()) {
                session()->flash('error', 'Ops! Verifique os dados e tenta novamente');
                if (session('error')) {
                    Alert::toast(session('error'), 'error');
                }
                return redirect()->back()->withErrors($validator->errors())->withInput();
            }

            $user = [
                'email' => $request->input('email'),
                'name' => $request->input('name'),
                'password' => Hash::make($request->input('password')),
            ];
            
            $aux_user = User::create($user);

            session()->flash('success', 'Usuário registado com sucesso');
            if (session('success')) {
                Alert::toast(session('success'), 'success');
            }

            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
