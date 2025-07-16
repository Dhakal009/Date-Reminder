<?php

namespace Acer\Remindate\Controllers;
use Acer\Remindate\Controllers\RegistrationController;
use Acer\Remindate\Controllers\LoginController;
use Rakit\Validation\Validator;
use Twig\Environment;

class RegistrationController extends BaseController {
        
    public function show(): void{
        $this->render(filename: 'register');
    }
    public function register(): void {
        $validator = new Validator();
       $validation = $validator->validate(inputs: $_POST,rules:[
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6',
            'confirmPassword' => 'required|same:password',
            'terms' => 'required'
        ]);

        if($validation->fails()) {
            $errors = $validation->errors();
            $this->render(filename: 'register'); 
        }else{
            die("No errors");
        }
    }
}

?>  