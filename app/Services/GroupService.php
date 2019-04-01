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
                    return[ 'success' => false, 'messages' => $exception->getMessage()];
                case ValidatorException::class :
                    return [ 'success' => false, 'messages' => $exception->getMessageBag()];
                case Exception::class :
                    return [ 'success' => false, 'messages' => $exception->getMessage()];
                default :
                    return [ 'success' => false, 'messages' => $exception->getMessage()];
            }
        }
    }

    public function userStore($group_id, $data) : array
    {
        try
        {
            $group = $this->repository->find($group_id);
            $user_id = $data['user_id'];

            $group->users()->attach($user_id);

            return [
                'success' => true,
                'messages' => "Usuário relacionado com sucesso.",
                'data' => $group
            ];
        }
        catch (Exception $exception)
        {
            switch (get_class($exception))
            {
                case QueryException::class :
                    return[ 'success' => false, 'messages' => $exception->getMessage()];
                case ValidatorException::class :
                    return [ 'success' => false, 'messages' => $exception->getMessageBag()];
                case Exception::class :
                    return [ 'success' => false, 'messages' => $exception->getMessage()];
                default :
                    return [ 'success' => false, 'messages' => $exception->getMessage()];
            }
        }
    }

    public function update(array $data, $group_id):array
    {
        try
        {
            $this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_CREATE);
            $group  = $this->repository->update($data, $group_id);

            return [
                'success' => true,
                'messages' => "Grupo relacionado com sucesso.",
                'data' => $group
            ];
        }
        catch (Exception $exception)
        {
            switch (get_class($exception))
            {
                case QueryException::class :
                    return[ 'success' => false, 'messages' => $exception->getMessage()];
                case ValidatorException::class :
                    return [ 'success' => false, 'messages' => $exception->getMessageBag()];
                case Exception::class :
                    return [ 'success' => false, 'messages' => $exception->getMessage()];
                default :
                    return [ 'success' => false, 'messages' => $exception->getMessage()];
            }
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
            switch (get_class($exception))
            {
                case QueryException::class :
                    return[ 'success' => false, 'messages' => $exception->getMessage()];
                case ValidatorException::class :
                    return [ 'success' => false, 'messages' => $exception->getMessageBag()];
                case Exception::class :
                    return [ 'success' => false, 'messages' => $exception->getMessage()];
                default :
                    return [ 'success' => false, 'messages' => $exception->getMessage()];
            }
        }
    }
}
