<?php
/**
 * Created by PhpStorm.
 * User: Mangueira
 * Date: 16/05/2019
 * Time: 14:09
 */
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use Illuminate\Database\QueryException;
//use Exception;


function msgUsers($request)
{
    if(!empty($request['success'])){
        session()->flash('success', [
            'success' => $request['success'],
            'messages' => $request['messages'],
        ]);
    }else{
        session()->flash('error', [
            'error' => $request['error'],
            'messages' => $request['messages'],
        ]);
    }
}

function errorException($exception)
{
    switch (get_class($exception))
    {
        case QueryException::class :
            return[ 'error' => false, 'messages' => $exception->getMessage()];
        case ValidatorException::class :
            return [ 'error' => false, 'messages' => $exception->getMessageBag()];
        case Exception::class :
            return [ 'error' => false, 'messages' => $exception->getMessage()];
        default :
            return [ 'error' => false, 'messages' => $exception->getMessage()];
    }
}
