<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\MovimentCreateRequest;
use App\Http\Requests\MovimentUpdateRequest;
use App\Repositories\MovimentRepository;
use App\Validators\MovimentValidator;

use App\Entities\Group;
use App\Entities\Product;
use App\Entities\Moviment;
use Auth;

/**
 * Class MovimentsController.
 *
 * @package namespace App\Http\Controllers;
 */
class MovimentsController extends Controller
{
    /**
     * @var MovimentRepository
     */
    protected $repository;

    /**
     * @var MovimentValidator
     */
    protected $validator;

    /**
     * MovimentsController constructor.
     *
     * @param MovimentRepository $repository
     * @param MovimentValidator $validator
     */
    public function __construct(MovimentRepository $repository, MovimentValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
    }

    public function application(){
        // get user  auth
        $user = Auth::user();
        // get groups from user
        $group_list = $user->groups->pluck('name', 'id');
        
        $product_list = Product::all()->pluck('name', 'id');
        
        return view('moviment.application',[
            'group_list' => $group_list,
            'product_list' => $product_list
        ]);
    }
    
    public function storeApplication(Request $request){
        
        $moviment = Moviment::create([
            'user_id' => Auth::user()->id,
            'group_id' => $request->get('group_id'),
            'product_id' => $request->get('product_id'),
            'value' => $request->get('value'),
            'type' => 1,
        ]);

        //messages session
        \Session::flash('success',[
            'success'  => true,
            'messages' => "Investimento de ".$moviment->value." no produto ".$moviment->product->name." realizado com sucesso"
        ]);

        return redirect()->route('moviment.application');
    }

    public function index(){
        return view('moviment.index', [
            'product_list' => Product::all()
        ]);
    }

    public function all(){
        $moviment_list = Auth::user()->moviments;
        
        return view('moviment.all', [
            'moviment_list' => $moviment_list
        ]);
    }
    public function getback(){
        // get user  auth
        $user = Auth::user();
        // get groups from user
        $group_list = $user->groups->pluck('name', 'id');
        
        $product_list = Product::all()->pluck('name', 'id');
        
        return view('moviment.getback',[
            'group_list' => $group_list,
            'product_list' => $product_list
        ]);
    }
    public function storeGetback(Request $request){
        $moviment = Moviment::create([
            'user_id' => Auth::user()->id,
            'group_id' => $request->get('group_id'),
            'product_id' => $request->get('product_id'),
            'value' => $request->get('value'),
            'type' => 2,
        ]);

        //messages session
        \Session::flash('success',[
            'success'  => true,
            'messages' => "Resgate de ".$moviment->value." no produto ".$moviment->product->name." realizado com sucesso"
        ]);

        return redirect()->route('moviment.getback');
    }

}