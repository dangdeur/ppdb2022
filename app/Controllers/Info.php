<?php

namespace App\Controllers;

class Info extends BaseController
{
    public function index()
    {

        if ($this->session->has('firstname')) {
          echo view('header_l');
        }else {
          echo view('header');
        }

        echo view('info');
        echo view('footer');

    }
}
