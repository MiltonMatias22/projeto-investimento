<?php

namespace App\Services;

use Exception;
use Illuminate\Database\QueryException;
use Prettus\Validator\Exceptions\ValidatorException;
use Prettus\Validator\Contracts\ValidatorInterface;
use App\Repositories\UserRepository;
Use App\Validators\UserValidator;

class UserService
{
    protected $repository;
    protected $validator;
    
    public function __construct(UserRepository $repository, UserValidator $validator)
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
            // save user data
            $usuario = $this->repository->create($data);
            
            return [
                'success' => true,
                'messages' => "Usuário cadastrado.",
                'data'    => $usuario
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

    public function update($data, $id)
    {
        try
        {
        // data validated
        $this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_UPDATE);
        // save user data
        $usuario = $this->repository->update($data, $id);
        
        return [
            'success' => true,
            'messages' => "Usuário atualizado.",
            'data'    => $usuario
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
