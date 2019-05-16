<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use App\Validators\UserValidator;
use Exception;

class DashboardController extends Controller
{
    private $repository;
    private $validator;

    public function __construct(UserRepository $repository, UserValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
    }//__construct

    public function index()
    {
        return view('user.dashboard');
    }//index

    public function auth(Request $request)
    {
        $data = [
            'email' => $request->get('username'),
            'password' => $request->get('password'),
        ];
        try {
            if(env('PASSWORD_HASH')){
                \Auth::attempt($data, false);
            }else{
                $user = $this->repository->findWhere(['email' => $request->get('username')])->first();
                if(!$user){
                    session()->flash('error', [
                        'error' => true,
                        'messages' => "E-mail informado não está cadastrado.",
                    ]);
                    return view('user.login');
                }
                if($user->password == $request->get('password')){
                    session()->flash('error', [
                        'error' => true,
                        'messages' => "Senha informada não correspondente ao usuário.",
                    ]);
                    return view('user.login');
                }
                \Auth::login($user);
            }
            session()->flash('success', [
                'success' => true,
                'messages' => "Usuário logado. Bem vindo ao sistema {$user->name}.",
            ]);
            return view('user.dashboard');

        }
        catch (Exception $e){
            return $e->getMessage();
        }
    }//auth

    public function logout()
    {
        \Auth::logout();
        return redirect()->route('user.login');
    }//logout

}//DashboardController
