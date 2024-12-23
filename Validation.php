<?php

class Validation
{
    public $errors = [];

    public static function validate($rules, $data)
    {
        $validation = new self;

        foreach ($rules as $field => $fieldRules) {
            foreach ($fieldRules as $rule) {
                $validation->$rule($data[$field]);
            }
        }

        return $validation;
    }

    private function required($field)
    {
        if(strlen($field) == 0) {
            $this->errors[] = 'The field is required';
        }
    }
}