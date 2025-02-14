<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Contracts\Validation\Rule;

class ValidName implements Rule
{
    public function passes($attribute, $value)
    {
        if (strlen($value) < 5 || strlen($value) > 100) {
            return false;
        }

        if (!preg_match("/^[a-zA-Z][a-zA-Z-' ]{3,98}[a-zA-Z]$/", $value)) {
            return false;
        }

        if (preg_match("/[\s'-]{2,}/", $value)) {
            return false;
        }

        return true;
    }

    public function message()
    {
        return 'The :attribute must contain only letters, spaces, hyphens, or apostrophes, without consecutive or trailing special characters, and be 5-100 characters long.';
    }
}