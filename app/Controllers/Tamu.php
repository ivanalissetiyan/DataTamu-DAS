<?php 
namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\M_Tamu;

class Tamu extends Controller
{

    public function __construct()
    {
        $this->model = new M_Tamu;
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
            'judul' => 'Data Tamu',
            'tamu' => $this->model->getAllData()
        ];

        // Load View
        tampilan('tamu/index', $data);
        
    }

    public function tambah()
    {

        // Jika belum login, user tidak memiliki akses
		if (!$this->auth->check())
		{
			$redirectURL = session('redirect_url') ?? site_url('/');
			unset($_SESSION['redirect_url']);

			return redirect()->to($redirectURL);
		}


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
        
                 // Load View
                  tampilan('tamu/index', $data);
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

    public function ubah()
    {

        // Jika belum login, user tidak memiliki akses
		if (!$this->auth->check())
		{
			$redirectURL = session('redirect_url') ?? site_url('/');
			unset($_SESSION['redirect_url']);

			return redirect()->to($redirectURL);
		}

        if (isset($_POST['ubah'])) {

            // // ketika pas diedit dan nisn tidak di ganti, tidak lagi ada validasi bahwasannya nisn sudah ada
            // $id = $this->request->getPost('id');
            // $nisn = $this->request->getPost('nisn');
            // $db_nisn = $this->model->getdataById($id);

            // if ($nisn === $db_nisn) {
            //     # code...
            // }

            $val = $this->validate([
               
                // Semisalnya ada nomor unik yg di edit
                // 'nisn' => [
                //     'label' => 'Nomor Induk Nasional',
                //     'rules' => 'required|numeric|max_length[12]|is_unique[tamu_nisn]'
                // ],
               
               
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
        
                 // Load View
                tampilan('tamu/index', $data);
            } else {
                $id = $this->request->getPost('id');

                $data = [
                    'nama_tamu' => $this->request->getPost('nama_tamu'),
                    'asal' => $this->request->getPost('asal'),
                    'tujuan' => $this->request->getPost('tujuan'),
                ];
                // update data
                $success = $this->model->ubah($data, $id);
                if ($success) {
                    session()->setFlashdata('message', 'diubah');
                    return redirect()->to(base_url('tamu'));
                }
                 
            }

        } else {
            return redirect()->to('/tamu');
        }
    }


    public function hapus($id)
    {

        // Jika belum login, user tidak memiliki akses
		if (!$this->auth->check())
		{
			$redirectURL = session('redirect_url') ?? site_url('/');
			unset($_SESSION['redirect_url']);

			return redirect()->to($redirectURL);
		}


        $success = $this->model->hapus($id);
        if ($success) {
            session()->setFlashdata('message', 'dihapus');
            return redirect()->to(base_url('tamu'));
        }
    }

}
