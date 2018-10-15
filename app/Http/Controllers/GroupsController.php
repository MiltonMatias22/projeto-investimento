<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\GroupCreateRequest;
use App\Http\Requests\GroupUpdateRequest;
use App\Repositories\GroupRepository;
use App\Repositories\InstitutionRepository;
use App\Repositories\UserRepository;
use App\Validators\GroupValidator;
use App\Services\GroupService;

/**
 * Class GroupsController.
 *
 * @package namespace App\Http\Controllers;
 */
class GroupsController extends Controller
{
    /**
     * @var GroupRepository
     */
    protected $repository;

    protected $institutionRepository;

    protected $userRepository;

    /**
     * @var GroupValidator
     */
    protected $validator;

    protected $service;

    /**
     * GroupsController constructor.
     *
     * @param GroupRepository $repository
     * @param GroupService $service
     */
    public function __construct(GroupRepository $repository, GroupValidator $validator, GroupService $service,
    InstitutionRepository $institutionRepository, UserRepository $userRepository)
    {
        $this->repository = $repository;
        $this->institutionRepository = $institutionRepository;
        $this->userRepository = $userRepository;
        $this->validator = $validator;
        $this->service  = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groups = $this->repository->all();
        $user_list = $this->userRepository->selectBoxList();
        $institution_list = $this->institutionRepository->selectBoxList();

        return view('group.index', [
            'groups' => $groups,
            'user_list' => $user_list,
            'institution_list' => $institution_list
           ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  GroupCreateRequest $request
     */
    public function store(GroupCreateRequest $request)
    {
        $request = $this->service->store($request->all());

        //$group = $request['success'] ? $request['data'] : null;
        
        //messages session
        \Session::flash('success',[
            'success'  => $request['success'],
            'messages' => $request['messages']
        ]);

        return redirect()->route('group.index');
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
        $group = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $group,
            ]);
        }

        return view('groups.show', compact('group'));
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
        $group = $this->repository->find($id);

        return view('groups.edit', compact('group'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  GroupUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(GroupUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $group = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Group updated.',
                'data'    => $group->toArray(),
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
                'message' => 'Group deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->route('group.index');
    }
}
