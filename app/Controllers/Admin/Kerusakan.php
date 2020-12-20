<?php namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ModelKerusakan;
use App\Models\ModelSolusi;

class Kerusakan extends BaseController
{
    protected $modelKerusakan;
    protected $modelSolusi;

	public function __construct() 
	{
        $this->modelKerusakan   = new ModelKerusakan();
        $this->modelSolusi      = new ModelSolusi();
        helper("text");
	}

    public function index()
    {
        $data = [
            'first_title'       => 'Admin', 
            'second_title'      => 'Kerusakan',
            'validation'        => \Config\Services::validation(),
            'data_kerusakan'    => $this->modelKerusakan->showKerusakan(),
            'data_Solusi'       => $this->modelSolusi->showSolusi(),
            'number'            => $this->modelKerusakan->autoNumber()
        ];

        return view('admin/kerusakan/index', $data);
    }

    public function save() 
    {
        if (!$this->validate([
			'kerusakan' => [
				'rules' => 'required|is_unique[tbl_kerusakan.kerusakan]',
				'errors' => [
					'required' => 'Kerusakan Harus Di Isi !',
					'is_unique' => 'Kerusakan'
                ]
            ],
            'id_solusi' => [
                'rules' => 'required',
                'errors' =>[
                    'required' => 'Solusi Harus Di Isi',
                ]
            ]
		]))
		{
			$validation = \Config\Services::validation();
			return redirect()->to('/admin/kerusakan')->withInput()->with('validtion', $validation);
		}

        $data = array(
            'id_kerusakan'         => $this->request->getPost('id_kerusakan'),
            'kerusakan'            => $this->request->getPost('kerusakan'),
            'id_solusi'            => $this->request->getPost('id_solusi')

        );

        $this->modelKerusakan->saveKerusakan($data);

        session()->setFlashdata('pesan', 'Data Kerusakan Berhasil Di Tambah');

		session()->setFlashdata('alert-type', 'success');

        return redirect()->to('/admin/kerusakan');
    }

    public function update()
    {
        $kerusakan = $this->modelKerusakan->showKerusakan($this->request->getVar('id_kerusakan'));

		if ($kerusakan['kerusakan'] == $this->request->getVar('kerusakan')) 
		{
			$statusRules = 'required';
		} else 
		{
			$statusRules = 'required|is_unique[tbl_kerusakan.kerusakan]';
		}
        if (!$this->validate([
			'kerusakan' => [
				'rules' => $statusRules,
				'errors' => [
					'required' => 'Kerusakan Harus Di Isi !',
					'is_unique' => 'Kerusakan'
                ]
            ],
            'id_solusi' => [
                'rules' => 'required',
                'errors' =>[
                    'required' => 'Solusi Harus Di Isi',
                ]
            ]
		]))
		{
			$validation = \Config\Services::validation();
			return redirect()->to('/admin/kerusakan')->withInput()->with('validtion', $validation);
        }
        
        $id_kerusakan = $this->request->getPost('id_kerusakan');

        $data = array(
            'id_kerusakan'         => $this->request->getPost('id_kerusakan'),
            'kerusakan'            => $this->request->getPost('kerusakan'),
            'id_solusi'            => $this->request->getPost('id_solusi')

        );
        $this->modelKerusakan->updateKerusakan($data, $id_kerusakan);

        session()->setFlashdata('pesan', 'Data Kerusakan Berhasil Di Ubah');

		session()->setFlashdata('alert-type', 'success');

        return redirect()->to('/admin/kerusakan');
    }

    public function delete()
    {
        $id_kerusakan = $this->request->getPost('id_kerusakan');

        $this->modelKerusakan->deleteKerusakan($id_kerusakan);

        session()->setFlashdata('pesan', 'Data Kerusakan Berhasil Di Hapus');

        session()->setFlashdata('alert-type', 'success');
        
        return redirect()->to('/admin/kerusakan');

    }
}