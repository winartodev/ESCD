<?php namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ModelGejala;
use App\Models\ModelKerusakan;
use App\Models\ModelSolusi;
use App\Models\ModelKasusBaru;


class Admin extends BaseController
{
    protected $modelGejala;
    protected $modelKerusakan;
    protected $modelSolusi;
    protected $modelKasusBaru;

    public function __construct() 
    {
        $this->modelGejala = new ModelGejala();
        $this->modelKerusakan = new ModelKerusakan();
        $this->modelSolusi = new ModelSolusi();
        $this->modelKasusBaru = new ModelKasusBaru();
    }

    public function index()
    {
        $data = [
            'first_title'           => 'Admin', 
            'second_title'          => 'Dashboard',
            'jumlahGejala'          => $this->modelGejala->countGejala(),
            'jumlahKerusakan'       => $this->modelKerusakan->countKerusakan(),
            'jumlahSolusi'          => $this->modelSolusi->countSolusi(),
            'jumlahKasusBaru'       => $this->modelKasusBaru->countKasusBaru()
        ];

        return view('admin/index', $data);
    }
}