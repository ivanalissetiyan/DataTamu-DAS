<?php 
namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\M_Tamu;

class Tamu extends Controller
{

    public function __construct()
    {
        $this->model = new M_Tamu;

    }


    public function index()
    {

       

        $data = [
            'judul' => 'Data Tamu',
            'tamu' => $this->model->getAllData()
        ];

        echo view('templates/v_header', $data);
		echo view('templates/v_sidebar');
		echo view('templates/v_topbar');
		echo view('Tamu/index');
		echo view('templates/v_footer');
    }

    public function tambah()
    {
        $data = [
            'nama_tamu' => $this->request->getPost('nama_tamu'),
            'asal' => $this->request->getPost('asal'),
            'tujuan' => $this->request->getPost('tujuan'),
        ];
        // insert data
        $success = $this->model->tambah($data);
        if ($success) {
            return redirect()->to(base_url('tamu'));
        }
    }

}
