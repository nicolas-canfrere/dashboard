<?php


namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class IndexController extends AbstractController
{
    public function index()
    {
        return $this->render('Index/index.html.twig');
    }

    public function edit()
    {
        return $this->render('Index/edit.html.twig');
    }
}
