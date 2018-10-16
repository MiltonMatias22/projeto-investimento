<?php

namespace App\Services;

use Exception;
use Illuminate\Database\QueryException;
use Prettus\Validator\Exceptions\ValidatorException;
use Prettus\Validator\Contracts\ValidatorInterface;
use App\Repositories\GroupRepository;
Use App\Validators\GroupValidator;

class GroupService
{
    protected $repository;
    protected $validator;
    
    public function __construct(GroupRepository $repository, GroupValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
    } 
    
    public function store($data)
    {
        try
        {    
            // data validated
            $this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_CREATE);
            // save group data
            $group = $this->repository->create($data);
            
            return [
                'success' => true,
                'messages' => "Grupo cadastrada.",
                'data'    => $group
            ];

        }catch(Exception $e)
        {
            //get Exception
            switch (get_class($e)) {
                case QueryException::class      : return ['success' => false, 'messages' => $e->getMessage()];
                case ValidatorException::class  : return ['success' => false, 'messages' => $e->getMessageBag()];
                case Exception::class           : return ['success' => false, 'messages' => $e->getMessage()];
                default                         : return ['success' => false, 'messages' => $e->getMessage()]; 
            }
        }

    }

    public function userStore($group_id, $data)
    {
        try
        {    
            // find group data
            $group = $this->repository->find($group_id);
            $user_id = $data['user_id'];

            $group->users()->attach($user_id);
            
            return [
                'success' => true,
                'messages' => "Usuario adicionado com sucesso!",
                'data'    => $group
            ];

        }catch(Exception $e)
        {
            //get Exception
            switch (get_class($e)) {
                case QueryException::class      : return ['success' => false, 'messages' => $e->getMessage()];
                case ValidatorException::class  : return ['success' => false, 'messages' => $e->getMessageBag()];
                case Exception::class           : return ['success' => false, 'messages' => $e->getMessage()];
                default                         : return ['success' => false, 'messages' => $e->getMessage()]; 
            }
        }

    }

    public function update()
    {

    }

    public function destroy($id)
    {   try{
            $this->repository->delete($id);
            
            return [
                'success' => true,
                'messages' => "Registro removido.",
                'data'    => null
            ];

        }catch(Exception $e)
        {
            switch (get_class($e)) {
                case QueryException::class      : return ['success' => false, 'messages' => $e->getMessage()];
                case ValidatorException::class  : return ['success' => false, 'messages' => $e->getMessageBag()];
                case Exception::class           : return ['success' => false, 'messages' => $e->getMessage()];
                default                         : return ['success' => false, 'messages' => $e->getMessage()]; 
            }
        }
    }

}