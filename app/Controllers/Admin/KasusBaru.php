<?php namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ModelKasusBaru;
use App\Models\ModelDiagnosis;

class KasusBaru extends BaseController
{
    protected $modelKasusBaru;
    protected $modelDiagnosis;

    public function __construct() 
    {
        $this->modelKasusBaru = new ModelKasusBaru();
        $this->modelDiagnosis = new ModelDiagnosis();
    }

    public function index() 
    {
        $data = [
            'first_title'       => 'Admin', 
            'second_title'      => 'Kasus Baru',
            'validation'        => \Config\Services::validation(),
            'data_kasusBaru'    => $this->modelKasusBaru->showKasusBaru(),
            'modelKasusBaru'     => $this->modelKasusBaru,
            'data_gejala'       => $this->modelKasusBaru->showGejala()
        ];

        return view('admin/kasusbaru/index', $data); 
    }

    public function save() 
    {
        $length = count($_POST['id_gejala']);

        for ($i = 0; $i < $length; $i++) 
        {
            $this->modelKasusBaru->saveKasusBaru([
                'kode_kasus'    => $this->request->getPost('kode_kasus'),
                'id_gejala'     => $this->request->getPost('id_gejala')[$i],
                'bobot'         => 0
            ]);
        }

        $this->modelDiagnosis->deleteAll();

        return redirect()->to('/admin/diagnosis');  
    }

    public function update() 
    {
        $kasusBaru = $this->modelKasusBaru->showKasusBaru($this->request->getVar('id_kasus_baru'));

        $id_kasusBaru = $this->request->getPost('id_kasus_baru');

        $data = array(
            'kode_kasus'            => $this->request->getPost('kode_kasus'),
            'id_gejala'             => $this->request->getPost('id_gejala'),
            'bobot'                 => $this->request->getPost('bobot')
        );

        $this->modelKasusBaru->updateKasusBaru($data, $id_kasusBaru);

        return redirect()->to('/admin/kasusbaru');
    }

    public function delete()
    {
        $this->modelDiagnosis->deleteAll();

        return redirect()->to('/admin/diagnosis');  
    }

    public function deleteKasusBaru()
    {
        $kode_kasus = $this->request->getPost('kode_kasus');

        $this->modelKasusBaru->deleteKodeKasus($kode_kasus);

        return redirect()->to('/admin/kasusbaru');  
    }
}