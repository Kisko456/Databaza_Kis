<?php



class Premavka_model extends CI_Model {

    function getRows($id= "") {
        if(!empty($id)){
            $query = $this->db->get_where('premavka', array('idPremavka' => $id));
            return $query->row_array();
        }else{
            $query = $this->db->get('premavka');
            return $query->result_array();
        }
    }


    // vlozenie zaznamu
    public function insert($data = array())
    {
        $insert = $this->db->insert('premavka', $data);
        if ($insert) {
            return $this->db->insert_id();
        } else {
            return false;
        }
    }

// aktualizacia zaznamu
    public function update($data, $id) {
        if(!empty($data) && !empty($id)){
            $update = $this->db->update('premavka', $data,
                array('idPremavka'=>$id));
            return $update?true:false;
        }else{
            return false;
        }
    }

// odstranenie zaznamu
    public function delete($id){
        $delete = $this->db->delete('premavka',array('idPremavka'=>$id));
        return $delete?true:false;
    }


   


}
