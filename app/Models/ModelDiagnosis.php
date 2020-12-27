<?php namespace App\Models;

use CodeIgniter\Model;

class ModelDiagnosis extends Model
{
    protected $table        = 'tbl_diagnosis';
    protected $primaryKey   = 'id_diagnosis';

    protected $allowedFields = ['id_diagnosis', 'id_gejala'];
    
    public function countRow() 
    {
        $query = $this->table('tbl_diagnosis')->countAllResults();
        return $query;
    }

    public function showDiagnosis() 
    {
        return $this->table('tbl_diagnosis')->join('tbl_gejala', 'tbl_gejala.id_gejala = tbl_diagnosis.id_gejala')->get()->getResultArray();
    }

    public function saveDiagnosis($data) 
    {
        $query = $this->db->table('tbl_diagnosis')->insert($data);
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

    public function showKasusBaru() 
    {
        $query = $this->table('tbl_diagnosis')->join('tbl_gejala', 'tbl_gejala.id_gejala = tbl_diagnosis.id_gejala')->get()->getResultArray();
        return $query;
    }

    public function deleteAll() 
    {
        $query = $this->table('tbl_diagnosis')->truncate();
        return $query;
    }
}