<?php

namespace App\Controllers;

class Home extends BaseController
{

	public function __construct()
    {
       
        helper('sn');
		$this->session = service('session');
		$this->auth = service('authentication');

    }

	public function index()
	{
		// Jika belum login, user tidak memiliki akses
		if (!$this->auth->check())
		{
			$redirectURL = session('redirect_url') ?? site_url('/');
			unset($_SESSION['redirect_url']);

			return redirect()->to($redirectURL);
		}
  
	
			$data = [
				'judul' => 'Selamat Datang di Buku tamu'
			
			];

		

		tampilan('home/index', $data);
	}
}
