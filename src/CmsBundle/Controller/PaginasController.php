<?php

namespace App\CmsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Bundle\Bundle;
use Symfony\Component\Routing\Annotation\Route;


class PaginasController extends Controller
{
    /**
     * @Route("/listar")
     */
    public function index()
    {
        return new Response("<h1>Listando páginas</h1>");
    }

}