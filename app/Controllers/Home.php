<?php

namespace App\Controllers;

class Home extends BaseController
{

	public function __construct()
    {
       
        helper('sn');

    }

	public function index()
	{
  
	
			$data = [
				'judul' => 'Selamat Datang di Buku tamu'
			];

		

		tampilan('home/index', $data);
	}
}
