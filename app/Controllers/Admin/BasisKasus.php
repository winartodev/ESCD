<?php namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ModelBasisKasus;
use App\Models\ModelKerusakan;
use App\Models\ModelGejala;

class BasisKasus extends BaseController
{
    protected $modelBasisKasus;
    protected $modelKerusakan;
    protected $modelGejala;

    public function __construct() 
    {
        $this->modelBasisKasus = new ModelBasisKasus();
        $this->modelKerusakan = new ModelKerusakan();
        $this->modelGejala = new ModelGejala();
    }

    public function index()
    {
        $data = [
            'first_title'       => 'Admin', 
            'second_title'      => 'Basis Kasus',
            'data_basisKasus'   => $this->modelBasisKasus->showBasisKasus(),
            'basisKasusModel'   => $this->modelBasisKasus,
            'data_gejala'       => $this->modelBasisKasus->showGejala(),
            'data_kerusakan'    => $this->modelKerusakan->showKerusakan(),
            'all_gejala'        => $this->modelGejala->showGejala(),
            'number'            => $this->modelBasisKasus->autoNumber()
        ];

        return view('admin/basiskasus/index', $data);
    }

    public function save() 
    {
        $length = count($_POST['id_gejala']);

        for ($i = 0; $i < $length; $i++) 
        {
            $this->modelBasisKasus->saveBasisKasus([
                'kode_kasus'    => $this->request->getPost('kode_kasus'),
                'id_kerusakan'  => $this->request->getPost('id_kerusakan'),
                'id_gejala'     => $this->request->getPost('id_gejala')[$i],
            ]);
        }

        return redirect()->to('/admin/basiskasus');
    }

    public function update() 
    {
        $basisKasus = $this->modelBasisKasus->showbasisKasus($this->request->getVar('id_basis_Kasus'));

        $id_basisKasus = $this->request->getPost('id_basiskasus');

        $data = array(
            'kode_kasus'              => $this->request->getPost('kode_kasus'),
            'id_kerusakan'              => $this->request->getPost('id_kerusakan'),
            'id_gejala'              => $this->request->getPost('id_gejala'),
            'bobot'              => $this->request->getPost('bobot')
        );

        $this->modelBasisKasus->updateBasisKasus($data, $id_basisKasus);

        return redirect()->to('/admin/basisKasus');
    }

    public function delete()
    {
        $id_basisKasus = $this->request->getPost('id_basiskasus');

        $this->modelBasisKasus->deleteBasisKasus($id_basisKasus);
        
        return redirect()->to('/admin/basisKasus');

    }

    public function deleteBasisKasus() {
        $kode_kasus = $this->request->getPost('kode_kasus');

        $this->modelBasisKasus->deleteKodeKasus($kode_kasus);
        
        return redirect()->to('/admin/basisKasus');
    }
}