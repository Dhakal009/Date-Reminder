<?php
namespace Acer\Remindate\Controllers;

class LoginController extends BaseController {
    public function show(): void {
        $this->render(filename: 'login');
    }

    public function login(): void
    {
        
    }
}
