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
        if (isset($_POST['tambah'])) {
            $val = $this->validate([
                'nama_tamu' => [
                        'label' => 'Nama Tamu',
                        'rules' => 'required'
            ],
                'asal' => [
                    'label' => 'Asal',
                    'rules' => 'required'
            ],
                'tujuan' => [
                    'label' => 'Tujuan',
                    'rules' => 'required'
            ]
            ]);

            if (!$val) {
                session()->setFlashdata('err',  \Config\Services::validation()->listErrors());
                
                $data = [
                    'judul' => 'Data Tamu',
                    'tamu' => $this->model->getAllData()
                ];
        
                echo view('templates/v_header', $data);
                echo view('templates/v_sidebar');
                echo view('templates/v_topbar');
                echo view('Tamu/index');
                echo view('templates/v_footer');
            } else {
                $data = [
                    'nama_tamu' => $this->request->getPost('nama_tamu'),
                    'asal' => $this->request->getPost('asal'),
                    'tujuan' => $this->request->getPost('tujuan'),
                ];
                // insert data
                $success = $this->model->tambah($data);
                if ($success) {
                    session()->setFlashdata('message', 'ditambahkan');
                    return redirect()->to(base_url('tamu'));
                }
                 
            }

        } else {
            return redirect()->to('/tamu');
        }

        
    }

}
