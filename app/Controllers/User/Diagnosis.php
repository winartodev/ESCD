<?php namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\ModelGejala;
use App\Models\ModelDiagnosis;
use App\Models\ModelBasisKasus;
use App\Models\ModelKasusBaru;

class Diagnosis extends BaseController
{
	protected $modelGejala;
    protected $modelDiagnosis;
    protected $modelBasisKasus;
    protected $modelKasusBaru;

    public function __construct() 
    {
        $this->modelGejala = new ModelGejala();
        $this->modelDiagnosis = new ModelDiagnosis();
        $this->modelBasisKasus = new ModelBasisKasus();
        $this->modelKasusBaru = new ModelKasusBaru();

    }

    public function index()
    {
        $data = [
            'first_title'       => 'User', 
            'second_title'      => 'Diagnosis',
            'data_gejala'        => $this->modelGejala->showGejala(),
            'count'             => $this->modelDiagnosis->countRow()
        ];

        return view('user/diagnosis/index', $data);
    }

    public function save() 
    {
        $length = count($_POST['id_gejala']);

        for ($i = 0; $i < $length; $i++) 
        {
            $this->modelDiagnosis->saveDiagnosis([
                'id_gejala'     => $this->request->getPost('id_gejala')[$i],
            ]);
        }

        return redirect()->to('/user/diagnosis/hasil');  
    }

    public function hasil()
    {
        $data = [
            'first_title'           => 'Admin', 
            'second_title'          => 'Hasil Diagnosis Komputer',
            'data_diagnosis'        => $this->modelDiagnosis->showDiagnosis(),
            'data_basisKasus'       => $this->modelBasisKasus->showBasisKasus(),
            'model_basisKasus'      => $this->modelBasisKasus,
            'data_kasusBaru'        => $this->modelDiagnosis->showKasusBaru(),
            'data_kasusLama'        => $this->modelBasisKasus->showGejala(),
        ];

        return view('user/diagnosis/hasil', $data);
    }

    public function saveKasusBaru() 
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

        return redirect()->to('/user');  
    }

    public function delete()
    {
        $this->modelDiagnosis->deleteAll();

        return redirect()->to('/user');  
    }
}
