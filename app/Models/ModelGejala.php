<?php namespace App\Models;

use CodeIgniter\Model;

class ModelGejala extends Model
{
    protected $table        = 'tbl_gejala';
    protected $primaryKey   = 'id_gejala';

    protected $allowedFields = ['id_gejala', 'gejala'];
    

    public function showGejala($id = '') 
    {
        if ($id == false) 
        {
            return $this->findAll();
        }

        return $this->where(['id_gejala' => $id])->first();
    }

    public function saveGejala($data){
        $query = $this->db->table('tbl_gejala')->insert($data);
        return $query;
    }

    public function updateGejala($data, $id)
    {
        $query = $this->db->table('tbl_gejala')->update($data, array('id_gejala' => $id));
        return $query;
    }
 
    public function deleteGejala($id)
    {
        $query = $this->db->table('tbl_gejala')->delete(array('id_gejala' => $id));
        return $query;
    } 

    public function countGejala() 
    {
        $query = $this->countAllResults();
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
        
        $str = "G";

        $new_number = $str. sprintf('%03s', $row_number); 

        return $new_number;
    }
}