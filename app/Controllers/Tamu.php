<?php 
namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\M_Tamu;

class Tamu extends Controller
{
    public function index()
    {

        $model = new M_Tamu();

        $data = [
            'judul' => 'Data Tamu',
            'tamu' => $model->getAllData()
        ];

        echo view('templates/v_header', $data);
		echo view('templates/v_sidebar');
		echo view('templates/v_topbar');
		echo view('Tamu/index');
		echo view('templates/v_footer');
    }
}
