<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function homepage(){

    	return view('welcome', [
    		'title' => 'Homepage | Sistema de Gestão para Grupos de Investimentos.'
    	]);
    }
    
    /*
    | Function to accesse login view
    |--------------------------------------------------------------------------
    */
    public function fazerLogin(){
    	return view('user.login');
    }

    public function cadastro(){
    	echo "Tela de cadastro";
    }
}
