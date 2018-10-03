<?php

namespace App\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class UserValidator.
 *
 * @package namespace App\Validators;
 */
class UserValidator extends LaravelValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'cpf'   => 'required|unique:users,cpf',
            'name'  => 'required',
            'phone' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required|unique:users,password',
        ],
        ValidatorInterface::RULE_UPDATE => [],
    ];
}
