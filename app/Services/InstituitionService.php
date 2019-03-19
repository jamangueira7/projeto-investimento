<?php
/**
 * Created by PhpStorm.
 * User: Mangueira
 * Date: 19/03/2019
 * Time: 17:41
 */

namespace App\Services;

use App\Repositories\InstituitionRepository;
use App\Validators\InstituitionValidator;
use Illuminate\Database\QueryException;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use Exception;

class InstituitionService
{
    private $repository;
    private $validator;

    public function __construct(InstituitionRepository $repository, InstituitionValidator $validator)
    {
        $this->repository = $repository;
        $this->validator = $validator;
    }

    public function store(array $data)
    {
        try
        {
            $this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_CREATE);
            $instituition  = $this->repository->create($data);

            return [
                'success' => true,
                'messages' => "Instituição cadastrada.",
                'data' => $instituition
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
