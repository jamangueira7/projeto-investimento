<?php

namespace App\Services;

use App\Repositories\UserRepository;
use App\Validators\UserValidator;
use Illuminate\Database\QueryException;
use Prettus\Validator\Contracts\ValidatorInterface;

use Prettus\Validator\Exceptions\ValidatorException;
use Exception;

class UserService
{
    private $repository;
    private $validator;

    public function __construct(UserRepository $repository, UserValidator $validator)
    {
        $this->repository = $repository;
        $this->validator = $validator;
    }

    public function store($data)
    {
        try
        {
            $this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_CREATE);
            $user  = $this->repository->create($data);
            return [
                'success' => true,
                'messages' => "Usuário cadastrado",
                'data' => $user
            ];
        }
        catch (Exception $exception)
        {
            switch (get_class($exception))
            {
                case QueryException::class :
                    return[ 'success' => true, 'messages' => $exception->getMessage()];
                case ValidatorException::class :
                    return [ 'success' => true, 'messages' => $exception->getMessageBag()];
                case Exception::class :
                    return [ 'success' => true, 'messages' => $exception->getMessage()];
                default :
                    return [ 'success' => true, 'messages' => $exception->getMessage()];
            }
        }
    }

    public function update()
    {

    }

    public function delete()
    {

    }
}
