<?php

namespace Acer\Remindate\Controllers;
use Acer\Remindate\Controllers\LoginController;
use Rakit\Validation\Validator;
use Twig\Environment;
use Acer\Remindate\Database;

class RegistrationController extends BaseController
{

    public function show(): void
    {
        $this->render(filename: 'register');
    }
    public function register(): void
    {
        $validator = new Validator();
        $validation = $validator->validate(inputs: $_POST, rules: [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6',
            'confirmPassword' => 'required|same:password',
            'terms' => 'required'
        ]);

        if ($validation->fails()) {
            $errors = $validation->errors();
            $this->render('register', [
                'errors' => $errors->firstOfAll()
            ]);
        } else {
            $database = new Database();
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $result = $database->query("INSERT INTO users(name,email,password) values(?,?,?)", [$name,$email,$password]);

            if($result){
                header(header: 'Location:/login');
            }else{

            }
        }

    }
}

?>