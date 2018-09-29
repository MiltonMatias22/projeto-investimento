<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use App\Validators\UserValidator;

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
    return 'User Dashboard Page.';
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
      'email' =>$request -> get('username'),
      'password' =>$request ->  get('password')
    ];

    try {

      \Auth::attempt($data, false);
      
      //redirect to dashboard user page
      return redirect()->route('user.dashboard');

    } catch (\Exception $e){

      return $e->getMessage();

    }

  }

}
