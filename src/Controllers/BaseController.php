<?php

namespace Acer\Remindate\Controllers;

use Twig\Environment;
class BaseController {
    private $twig;

    public function __construct(Environment $twig) {
        $this->twig = $twig;
    }

    protected function render($filename,array $data=[]):void{
        echo $this->twig->render(name: $filename .'.twig',context: $data);
    }
}