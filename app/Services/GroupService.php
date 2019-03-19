<?php

namespace App\Services;

use App\Repositories\GroupRepository;
use App\Validators\GroupValidator;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use Illuminate\Database\QueryException;
use Exception;

class GroupService
{
    private $repository;
    private $validator;

    public function __construct(GroupRepository $repository, GroupValidator $validator)
    {
        $this->repository = $repository;
        $this->validator = $validator;
    }

    public function store(array $data) : array
    {
        try
        {
            $this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_CREATE);
            $group  = $this->repository->create($data);
            return [
                'success' => true,
                'messages' => "Grupo cadastrado",
                'data' => $group
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
}