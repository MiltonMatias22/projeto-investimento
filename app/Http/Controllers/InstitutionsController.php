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

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $institution,
            ]);
        }

        return view('institution.show', compact('institution'));
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

        return view('institution.edit', compact('institution'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  InstitutionUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(InstitutionUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $institution = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Institution updated.',
                'data'    => $institution->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {

            if ($request->wantsJson()) {

                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
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
