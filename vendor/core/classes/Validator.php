<?php

    namespace myClasses;

    class Validator 
    {

        protected $errors = [];
        protected $rules_list = ['required', 'min', 'max', 'email'];
        protected $messages = [
            'required' => 'The :fieldname: field is required',
            'min' => 'The :fieldname: field must be a minimun :rulevalue: characters',
            'max' => 'The :fieldname: field must be a maximum :rulevalue: characters',
            'email' => 'Not valid email',
        ];

        public function validate($data = [], $rules = []){
            // dump($data);
            // dump($rules);
            foreach ($data as $k => $v) {
                if(in_array($k, array_keys($rules))) {
                    $this->check([
                        'fieldname' => $k,
                        'value' => $v,
                        'rules' => $rules[$k],
                    ]);
                }
            }
            return $this;
        }

        protected function check($field){
            // dump($field);
            foreach($field['rules'] as $rule => $rule_value){
                if(in_array($rule, $this->rules_list)){
                    // dump([$data['fieldname'], $rule, $rule_value]);
                    if(!call_user_func_array([$this, $rule], [$field['value'], $rule_value])){
                        $this -> addError($field['fieldname'], str_replace([':fieldname:', ':rulevalue:'],[$field['fieldname'], $rule_value], $this->messages[$rule]));
                    }else {
                        // echo "{$field['fieldname']} : {$rule} - success <br>";
                    }
                }
            }
        }

        protected function addError($fieldname, $error){
            $this->errors[$fieldname][] = $error;
        }

        public function getErrors(){
            return $this->errors;
        }

        public function hasErrors(){
            return !empty($this->errors);
        }

        public function errorList($fieldname){
            $output = '';
            if(isset($this->errors[$fieldname])){
                $output .= "<div class=\"invalid-feedback d-block\"><ul class='list-unstyled'>";
                foreach($this->errors[$fieldname] as $error){
                    $output .= "<li>{$error}</li>";
                }
                $output .= "</ul></div>";
            }
            return $output;
        }
        
        protected function required($value, $rule_value){
            return !empty(trim($value));
        }

        protected function min($value, $rule_value){
            return mb_strlen($value, 'UTF-8') >= $rule_value;
        }

        protected function max($value, $rule_value){
            return mb_strlen($value, 'UTF-8') <= $rule_value;
        }

        protected function email($value, $rule_value){
            return filter_var($value, FILTER_VALIDATE_EMAIL);
        }

    }