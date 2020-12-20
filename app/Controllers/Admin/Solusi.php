<?php namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ModelSolusi;

class Solusi extends BaseController
{
    protected $modelSolusi;
    protected $load;

    public function __construct() 
    {
        $this->modelSolusi = new ModelSolusi();
        helper('text');
    }

    public function index() 
    {
        $data = [
            'first_title'   => 'Admin',
            'second_title'  => 'Solusi',
            'data_solusi'   => $this->modelSolusi->showSolusi(),
            'validation'    => \Config\Services::validation(),
            'number'        => $this->modelSolusi->autoNumber()
        ];

        return view('admin/solusi/index', $data);
    }

    public function save() 
    {
        if (!$this->validate([
			'solusi' => [
				'rules' => 'required|is_unique[tbl_solusi.solusi]',
				'errors' => [
					'required' => 'Solusi Harus Di Isi !',
					'is_unique' => 'Solusi'
				]
			]
		]))
		{
			$validation = \Config\Services::validation();
			return redirect()->to('/admin/solusi')->withInput()->with('validtion', $validation);
		}

        $data = array(
            'id_solusi'         => $this->request->getPost('id_solusi'),
            'solusi'            => $this->request->getPost('solusi')
        );

        $this->modelSolusi->saveSolusi($data);

        session()->setFlashdata('pesan', 'Data Solusi Berhasil Di Tambah');

		session()->setFlashdata('alert-type', 'success');

        return redirect()->to('/admin/solusi');
    }

    public function update()
    {
        $solusi = $this->modelSolusi->showSolusi($this->request->getVar('id_solusi'));

		if ($solusi['solusi'] == $this->request->getVar('solusi')) 
		{
			$statusRules = 'required';
		} else 
		{
			$statusRules = 'required|is_unique[tbl_solusi.solusi]';
		}
        if (!$this->validate([
			'solusi' => [
				'rules' => $statusRules,
				'errors' => [
					'required' => 'Solusi Harus Di Isi !',
					'is_unique' => 'Solusi'
				]
			]
		]))
		{
			$validation = \Config\Services::validation();
			return redirect()->to('/admin/solusi')->withInput()->with('validtion', $validation);
        }
        
        $id_solusi = $this->request->getPost('id_solusi');

        $data = array(
            'solusi'              => $this->request->getPost('solusi'),
        );
        $this->modelSolusi->updatesolusi($data, $id_solusi);

        session()->setFlashdata('pesan', 'Data Solusi Berhasil Di Ubah');

		session()->setFlashdata('alert-type', 'success');

        return redirect()->to('/admin/solusi');
    }

    public function delete()
    {
        $id_solusi = $this->request->getPost('id_solusi');

        $this->modelSolusi->deleteSolusi($id_solusi);

        session()->setFlashdata('pesan', 'Data Solusi Berhasil Di Hapus');

        session()->setFlashdata('alert-type', 'success');
        
        return redirect()->to('/admin/solusi');

    }

}


?>