<?php

class Validation
{
    public $errors = [];

    public static function validate($rules, $data)
    {
        $validation = new self;

        foreach ($rules as $field => $fieldRules) {
            foreach ($fieldRules as $rule) {

                $valueField = $data[$field];

                if ($rule == 'confirmed') {
                    $validation->$rule($field, $valueField, $data["{$field}_confirm"] ?? null);
                } else {
                    $validation->$rule($field, $valueField);
                }
            }
        }

        return $validation;
    }

    private function required($field, $value)
    {
        if(strlen($value) == 0) {
            $this->errors[] = "The $field is required";
        }
    }

    private function email($field, $value)
    {
        if(!filter_var($value, FILTER_VALIDATE_EMAIL)) {
            $this->errors[] = "The $field must be a valid email address";
        }
    }

    private function confirmed($field, $value, $valueConfirm)
    {
        if($value != $valueConfirm) {
            $this->errors[] = "The $field must be confirmed";
        }
    }

    public function fails()
    {
        return sizeof($this->errors) > 0;
    }
}