<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use App\Validators\UserValidator;
use Auth;
use Exception;

class DashboardController extends Controller
{

  /**
   * @var UserRepository
   */
  private $repository;

  /**
   * @var UserValidator
   */
  private $validator;

  /**
   * UsersController constructor.
   *
   * @param UserRepository $repository
   * @param UserValidator $validator
   */
  public function __construct(UserRepository $repository, UserValidator $validator)
  {
      $this->repository = $repository;
      $this->validator  = $validator;
  }

/**
 * index user dashboard system
 *
 */
  public function index()
  {
    return view('user.dashboard');
  }

/**
 * user auth
 *
 * @param Request $request
 */
  public function auth(Request $request)
  {
    //data authentication
    $data = [
      'email'    => $request->get('username'),
      'password' => $request->get('password')
    ];

     try {

      if (env('PASSWORD_HASH')) {
        Auth::attempt($data, false);
      } else {
       
        //Find usuer for email 
       $user = $this->repository->findWhere(['email' => $request->get('username')])->first();
        
        // user exist?
       if(!$user)
        throw new Exception('Email informa é inválidas!');

        //password informed is different
       if($user->password != $request->get('password'))
       throw new Exception('Senha informa é inválidas!');

       //Authenticate user
       Auth::login($user);
      }
           
      //redirect to dashboard user page
      return redirect()->route('user.dashboard');

    } catch (\Exception $e){

      return $e->getMessage();

    }

  }

}
