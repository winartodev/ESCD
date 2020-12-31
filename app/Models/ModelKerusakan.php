<?php namespace App\Models;

use CodeIgniter\Model;


class ModelKerusakan extends Model
{
    protected $table        = 'tbl_kerusakan';
    protected $primary_key  = 'id_kerusakan';

    protected $allowedFields = ['id_kerusakan', 'kerusakan', 'id_solusi'];

    public function showKerusakan($id = '') 
    {
        if ($id == false) 
        {
            return  $this   ->table('tbl_kerusakan')
                            ->join('tbl_solusi', 'tbl_solusi.id_solusi = tbl_kerusakan.id_solusi')
                            ->get()->getResultArray();
        }
        
        return  $this   ->table('tbl_kerusakan')
                        ->join('tbl_solusi', 'tbl_solusi.id_solusi = tbl_kerusakan.id_solusi')
                        ->where(['tbl_kerusakan.id_kerusakan' => $id])->first();
    }

    public function saveKerusakan($data) 
    {
        $query = $this->db->table('tbl_kerusakan')->insert($data);
        return $query;
    }

    public function updateKerusakan($data, $id) 
    {
        $query = $this->db->table('tbl_kerusakan')->update($data, array('id_kerusakan' => $id));
        return $query;
    }

    public function deleteKerusakan($id)
    {
        $query = $this->db->table('tbl_kerusakan')->delete(array('id_kerusakan' => $id));
        return $query;
    } 

    public function countKerusakan() 
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
        
        $str = "K";

        $new_number = $str. sprintf('%03s', $row_number); 

        return $new_number;
    }
}


?>