<?php

namespace App\Helpers;

class Validation
{
    private $errors = [];

    public function required($field, $value, $message = null)
    {
        if (empty(trim($value))) {
            $this->errors[$field] = $message ?? "$field wajib diisi.";
        }
    }

    public function email($field, $value)
    {
        if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
            $this->errors[$field] = "Format email tidak valid.";
        }
    }

    public function min($field, $value, $min)
    {
        if (strlen(trim($value)) < $min) {
            $this->errors[$field] = "$field minimal $min karakter.";
        }
    }

    public function hasErrors()
    {
        return !empty($this->errors);
    }

    public function getErrors()
    {
        return $this->errors;
    }
}
