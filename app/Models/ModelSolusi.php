<?php namespace App\Models;

use CodeIgniter\Model;

class ModelSolusi extends Model 
{
    protected $table        = 'tbl_solusi';
    protected $primary_key  = 'id_solusi';

    protected $allowedFields = ['id_solusi', 'solusi'];

    public function showSolusi($id = '') 
    {
        if ($id == false) 
        {
            return $this->findAll();
        } 

        return $this->where(['id_solusi' => $id])->first();
    }

    public function saveSolusi($data) 
    {
        $query = $this->db->table('tbl_solusi')->insert($data);

        return $query;
    }

    public function updateSolusi($data, $id)
    {
        $query = $this->db->table('tbl_solusi')->update($data, array('id_solusi' => $id));
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
        
        $str = "S";

        $new_number = $str. sprintf('%03s', $row_number); 

        return $new_number;
    }

    public function countSolusi() 
    {
        $query = $this->countAllResults();
        return $query;
    }

    public function deleteSolusi($id)
    {
        $query = $this->db->table('tbl_solusi')->delete(array('id_solusi' => $id));
        return $query;
    } 
}


?>