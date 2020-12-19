<?php namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ModelGejala;

class Gejala extends BaseController
{
    protected $modelGejala;

	public function __construct() 
	{
		$this->modelGejala = new ModelGejala();
	}

    public function index()
    {
        $data = [
            'first_title'   => 'Admin', 
            'second_title'  => 'Gejala',
            'validation'    => \Config\Services::validation(),
            'data_gejala'   => $this->modelGejala->showGejala(),
            'number'        => $this->modelGejala->autoNumber()
        ];

        return view('admin/gejala/index', $data);
    }

     public function save()
    {
        if (!$this->validate([
			'gejala' => [
				'rules' => 'required|is_unique[tbl_gejala.gejala]',
				'errors' => [
					'required' => 'Gejala Harus Di Isi !',
					'is_unique' => 'Gejala'
				]
			]
		]))
		{
			$validation = \Config\Services::validation();
			return redirect()->to('/admin/gejala')->withInput()->with('validtion', $validation);
		}

        $data = array(
            'id_gejala'         => $this->request->getPost('id_gejala'),
            'gejala'            => $this->request->getPost('gejala')
        );

        $this->modelGejala->saveGejala($data);

        session()->setFlashdata('pesan', 'Data Gejala Berhasil Di Tambah');

		session()->setFlashdata('alert-type', 'success');

        return redirect()->to('/admin/gejala');
    }

    public function update()
    {
        $gejala = $this->modelGejala->showGejala($this->request->getVar('id_gejala'));

		if ($gejala['gejala'] == $this->request->getVar('gejala')) 
		{
			$statusRules = 'required';
		} else 
		{
			$statusRules = 'required|is_unique[tbl_gejala.gejala]';
		}
        if (!$this->validate([
			'gejala' => [
				'rules' => $statusRules,
				'errors' => [
					'required' => 'Gejala Harus Di Isi !',
					'is_unique' => 'Gejala'
				]
			]
		]))
		{
			$validation = \Config\Services::validation();
			return redirect()->to('/admin/gejala')->withInput()->with('validtion', $validation);
        }
        
        $id_gejala = $this->request->getPost('id_gejala');

        $data = array(
            'gejala'              => $this->request->getPost('gejala'),
        );
        $this->modelGejala->updateGejala($data, $id_gejala);

        session()->setFlashdata('pesan', 'Data Gejala Berhasil Di Ubah');

		session()->setFlashdata('alert-type', 'success');

        return redirect()->to('/admin/gejala');
    }

    public function delete()
    {
        $id_gejala = $this->request->getPost('id_gejala');

        $this->modelGejala->deleteGejala($id_gejala);

        session()->setFlashdata('pesan', 'Data Gejala Berhasil Di Hapus');

        session()->setFlashdata('alert-type', 'success');
        
        return redirect()->to('/admin/gejala');

    }

}