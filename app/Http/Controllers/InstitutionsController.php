<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\InstitutionCreateRequest;
use App\Http\Requests\InstitutionUpdateRequest;
use App\Repositories\InstitutionRepository;
use App\Validators\InstitutionValidator;
use App\Services\InstitutionService;

/**
 * Class institutionsController.
 *
 * @package namespace App\Http\Controllers;
 */
class InstitutionsController extends Controller
{
    /**
     * @var InstitutionRepository
     */
    protected $repository;

    /**
     * @var InstitutionService
     */
    protected $service;

    /**
     * InstitutionsController constructor.
     *
     * @param InstitutionRepository $repository
     */
    public function __construct(InstitutionRepository $repository, InstitutionService $service)
    {
        $this->repository = $repository;
        $this->service  = $service;
    }

    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $institutions = $this->repository->all();
        return view('institution.index', [
           'institutions' => $institutions
           ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  InstitutionCreateRequest $request
     */
    public function store(InstitutionCreateRequest $request)
    {
        $request = $this->service->store($request->all());

        //$institution = $request['success'] ? $request['data'] : null;
        
        //messages session
        \Session::flash('success',[
            'success'  => $request['success'],
            'messages' => $request['messages']
        ]);

        return redirect()->route('institution.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $institution = $this->repository->find($id);

        return view('institution.show', [
            'institution' => $institution
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $institution = $this->repository->find($id);
        
        return view('institution.edit', [
            'institution' => $institution
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  string            $id
     *
     * @return Response
     *
     */
    public function update(Request $request, $id)
    {
        
        $request = $this->service->update($request->all(), $id);
        
        //messages session
        \Session::flash('success',[
            'success'  => $request['success'],
            'messages' => $request['messages']
        ]);

        return redirect()->route('institution.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);

        if (request()->wantsJson()) {

            return response()->json([
                'message' => 'Institution deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Institution deleted.');
    }
}
