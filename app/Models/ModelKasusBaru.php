<?php namespace App\Models;

use CodeIgniter\Model;

class ModelKasusBaru extends Model
{
    protected $table        = 'tbl_kasusbaru';
    protected $primaryKey   = 'id_kasus_baru';

    protected $allowedFields = ['id_kasus_baru', 'id_gejala', 'bobot'];
    
    public function showKasusBaru($id = '') 
    {
        if ($id == false) 
        {
            return $this->table('tbl_kasusbaru')->join('tbl_gejala', 'tbl_gejala.id_gejala = tbl_kasusbaru.id_gejala')->groupBy('kode_kasus')->get()->getResultArray();
        }

        return $this->table('tbl_kasusbaru')->join('tbl_gejala', 'tbl_gejala.id_gejala = tbl_kasusbaru.id_gejala')->where(['id_kasus_baru' => $id])->first();
    }

    public function jumlahGejala($kode_kasus) 
    {
        $query = $this->table('tbl_kasusbaru')->where(['kode_kasus' => $kode_kasus])->countAllResults();
        return $query;
    }

    public function showGejala() 
    {
        $query = $this->table('tbl_kasusbaru')->join('tbl_gejala', 'tbl_gejala.id_gejala = tbl_kasusbaru.id_gejala')->get()->getResultArray();
        return $query;
    }

    public function updateKasusBaru($data, $id)
    {
        $query = $this->db->table('tbl_kasusbaru')->update($data, array('id_kasus_baru' => $id));
        return $query;
    }

    public function deleteKodeKasus($id)
    {
        $query = $this->db->table('tbl_kasusbaru')->delete(array('kode_kasus' => $id));
        return $query;
    } 


    public function saveKasusBaru($data) 
    {
        $query = $this->db->table('tbl_kasusbaru')->insert($data);
        return $query;
    }
}