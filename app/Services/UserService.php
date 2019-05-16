<?php

namespace App\Services;

use App\Repositories\UserRepository;
use App\Validators\UserValidator;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use Illuminate\Database\QueryException;
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
            return errorException($exception);
        }
    }

    public function update($data, $id)
    {
        try
        {
            $this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_UPDATE);
            $user  = $this->repository->update($data, $id);
            return [
                'success' => true,
                'messages' => "Usuário atualizado",
                'data' => $user
            ];
        }
        catch (Exception $exception)
        {
            return errorException($exception);
        }
    }

    public function destroy($id)
    {
        try
        {
            $user  = $this->repository->delete($id);
            return [
                'success' => true,
                'messages' => "Usuário removido.",
                'data' => null
            ];
        }
        catch (Exception $exception)
        {
            return errorException($exception);
        }
    }
}
