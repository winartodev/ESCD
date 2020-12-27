<?php namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ModelGejala;
use App\Models\ModelDiagnosis;
use App\Models\ModelBasisKasus;

class Diagnosis extends BaseController
{
    protected $modelGejala;
    protected $modelDiagnosis;
    protected $modelBasisKasus;

    public function __construct() 
    {
        $this->modelGejala = new ModelGejala();
        $this->modelDiagnosis = new ModelDiagnosis();
        $this->modelBasisKasus = new ModelBasisKasus();
    }

    public function index()
    {
        $data = [
            'first_title'       => 'Admin', 
            'second_title'      => 'Diagnosis Komputer',
            'data_gejala'        => $this->modelGejala->showGejala(),
            'count'             => $this->modelDiagnosis->countRow()
        ];

        return view('admin/diagnosis/index', $data);
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

        return redirect()->to('/admin/diagnosis/hasil');  
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

        return view('admin/diagnosis/hasil', $data);
    }
}