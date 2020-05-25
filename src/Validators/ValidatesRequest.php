<?php


namespace App\Validators;

use Valitron\Validator;

trait ValidatesRequest
{
    public function validate(?array $data, array $rules)
    {
        $validator = $this->getValidator($data ?: []);

        $validator->rules($rules);

        if (!$validator->validate()) {
            throw new ValidatorException($validator->errors());
        }

        return $validator->data();
    }

    public function getValidator(array $data)
    {
        return new Validator($data);
    }
}
