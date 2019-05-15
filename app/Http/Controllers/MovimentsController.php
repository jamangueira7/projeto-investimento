<?php

namespace App\Http\Controllers;

use App\Entities\Group;
use App\Entities\Moviment;
use App\Entities\Product;
use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\MovimentCreateRequest;
use App\Http\Requests\MovimentUpdateRequest;
use App\Repositories\MovimentRepository;
use App\Validators\MovimentValidator;
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
    }//__construct

    public function index()
    {
        return view('moviment.index',[
            'product_list' => Product::all()
        ]);
    }//index

    public function all()
    {
        $moviment_list = Auth::user()->moviments;
        return view('moviment.all',[
            'moviment_list' => $moviment_list
        ]);
    }//all

    public function getback()
    {
        $user = Auth::user();
        $group_list = $user->groups->pluck('name','id');
        $product_list = Product::all()->pluck('name','id');
        return view('moviment.getback',[
            'group_list' => $group_list,
            'product_list' => $product_list
        ]);
    }//getback

    public function storeGetback(Request $request)
    {
        $moviment = Moviment::create([
            'user_id' => Auth::user()->id,
            'group_id' => $request->get('group_id'),
            'product_id' => $request->get('product_id'),
            'value' => $request->get('value'),
            'type' => 2

        ]);

        session()->flash('success', [
            'success' => true,
            'messages' => "Seu resgate de R$".$moviment->value ." no produto ". $moviment->product->name ." foi realizado com sucesso.",
        ]);

        return redirect()->route('moviment.application');
    }//storeGetback

    public function application()
    {
        //dd(Auth::user());
        $user = Auth::user();
        $group_list = $user->groups->pluck('name','id');
        $product_list = Product::all()->pluck('name','id');
        return view('moviment.application',[
            'group_list' => $group_list,
            'product_list' => $product_list
        ]);
    }//application

    public function store(Request $request)
    {
        $moviment = Moviment::create([
            'user_id' => Auth::user()->id,
            'group_id' => $request->get('group_id'),
            'product_id' => $request->get('product_id'),
            'value' => $request->get('value'),
            'type' => 1

        ]);

        session()->flash('success', [
            'success' => true,
            'messages' => "Sua aplicação de R$".$moviment->value ." no produto ". $moviment->product->name ." foi realizada com sucesso.",
        ]);

        return redirect()->route('moviment.application');

    }//store
}//MovimentsController
