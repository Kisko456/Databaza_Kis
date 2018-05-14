<?php



class Nehody_model extends CI_Model {

    function getRows($id= "") {
        if(!empty($id)){
            $query = $this->db->get_where('nehody', array('idNehody' => $id));
            return $query->row_array();
        }else{
            $query = $this->db->get('nehody');
            return $query->result_array();
        }
    }


    // vlozenie zaznamu
    public function insert($data = array())
    {
        $insert = $this->db->insert('nehody', $data);
        if ($insert) {
            return $this->db->insert_id();
        } else {
            return false;
        }
    }

// aktualizacia zaznamu
    public function update($data, $id) {
        if(!empty($data) && !empty($id)){
            $update = $this->db->update('nehody', $data,
                array('idNehody'=>$id));
            return $update?true:false;
        }else{
            return false;
        }
    }

// odstranenie zaznamu
    public function delete($id){
        $delete = $this->db->delete('nehody',array('idNehody'=>$id));
        return $delete?true:false;
    }





}
