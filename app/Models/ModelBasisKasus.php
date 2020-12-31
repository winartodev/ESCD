<?php namespace App\Models;

use CodeIgniter\Model;

class ModelBasisKasus extends Model
{
    protected $table        = 'tbl_basiskasus';
    protected $primaryKey   = 'id_basiskasus';

    protected $allowedFields = ['id_basis_kasus', 'kode_kasus', 'id_kerusakan', 'id_gejala', 'bobot'];
    

    public function showBasisKasus($id = '') 
    {
        if ($id == false) 
        {
            return $this->table('tbl_basiskasus')->join('tbl_kerusakan', 'tbl_kerusakan.id_kerusakan = tbl_basiskasus.id_kerusakan')
                                                ->join('tbl_solusi', 'tbl_solusi.id_solusi = tbl_kerusakan.id_solusi')->groupBy('kode_kasus')->get()->getResultArray();
        }

        return $this->table('tbl_basiskasus')->join('tbl_kerusakan', 'tbl_kerusakan.id_kerusakan = tbl_basiskasus.id_kerusakan')
                                            ->join('tbl_solusi', 'tbl_solusi.id_solusi = tbl_kerusakan.id_solusi')->where(['id_basis_kasus' => $id])->first();
    }

    public function createRowSpan($kode_kasus) 
    {
        $query = $this->table('tbl_basiskasus')->where(['kode_kasus' => $kode_kasus])->countAllResults();
        return $query;
    }

    public function showGejala() 
    {
        $query = $this->table('tbl_basiskasus')->join('tbl_gejala', 'tbl_gejala.id_gejala = tbl_basiskasus.id_gejala')->get()->getResultArray();
        return $query;
    }

    public function saveBasisKasus($data){
        $query = $this->db->table('tbl_basiskasus')->insert($data);
        return $query;
    }

    public function updateBasisKasus($data, $id)
    {
        $query = $this->db->table('tbl_basiskasus')->update($data, array('id_basis_kasus' => $id));
        return $query;
    }

    public function deleteBasisKasus($id)
    {
        $query = $this->db->table('tbl_basiskasus')->delete(array('id_basis_kasus' => $id));
        return $query;
    } 

    public function deleteKodeKasus($id) 
    {
        $query = $this->db->table('tbl_basiskasus')->delete(array('kode_kasus' => $id));
        return $query;
    }

    public function autoNumber() 
    {
        $row_number = $this->countAllResults();
        
        if ($row_number > 0) {
            $row_number++;
        } else {
            $row_number = 1;
        } 
        
        $str = "BK";

        $new_number = $str. sprintf('%03s', $row_number); 

        return $new_number;
    }

    public function total_bobot($kode_kasus) 
    {
        $query = $this->table('tbl_basiskasus')->selectSum('tbl_basiskasus.bobot')->join('tbl_gejala', 'tbl_gejala.id_gejala = tbl_basiskasus.id_gejala')->where(['tbl_basiskasus.kode_kasus' => $kode_kasus])->groupBy('tbl_basiskasus.kode_kasus')->get()->getResult();

        return $query;
    }
}