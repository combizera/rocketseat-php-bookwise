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
                }
                elseif(str_contains($rule, ':')) {
                    $temp = explode(':', $rule);
                    $rule = $temp[0];
                    $ruleAr = $temp[1];
                    $validation->$rule($ruleAr, $field, $valueField);
                }
                else {
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

    private function min($min, $field, $value)
    {
        if(strlen($value) <= $min) {
            $this->errors[] = "The $field must be at least $min characters";
        }
    }

    private function max($max, $field, $value)
    {
        if(strlen($value) > $max) {
            $this->errors[] = "The $field must be at least $max characters";
        }
    }

    private function strong($field, $value)
    {
        if(! strpbrk($value, '!@#$%¨&*()_+-=[]{};:,.<>')) {
            $this->errors[] = "The $field must contain at least one special character";
        }
    }

    private function unique($table, $field, $value)
    {
        if(strlen($value) == 0) {
            return;
        }

        $database = new Database(config('database'));

        $result = $database->query(
            "
                    SELECT *
                    FROM $table 
                    WHERE $field = :value
                    ",
            params: ["value" => $value]
        )->fetch();

        if($result) {
            $this->errors[] = "The $field is already in use";
        }
    }

    public function fails($name = null)
    {
        $key = 'errors';
        if($name) {
            $key .= "_$name";
        }

        flash()->push($key, $this->errors);
        return sizeof($this->errors) > 0;
    }
}