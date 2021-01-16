<?php

namespace App\Http\Validators;

use Illuminate\Validation\Validator;

class EvenNumberValidator extends Validator
{
    public function ValidateEvenNumber($attribute, $value, $parameters)
    {
        return $value % 2 == 0;
    }
}
