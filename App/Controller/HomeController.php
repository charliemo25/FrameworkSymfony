<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class HomeController
{
    public function index()
    {
        return new Response("Hello World !");
    }

    public function name(Request $request)
    {
        $name = $request->get('name', 'Titouan');

        return new Response("Hello $name");
    }
}
