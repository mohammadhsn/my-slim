<?php


namespace App\Validators;

use Exception;

class ValidatorException extends Exception
{
    const CODE = 422;

    protected $validator;

    public function __construct(array $errors, $code = self::CODE)
    {
        parent::__construct(json_encode($errors), $code);
    }
}
