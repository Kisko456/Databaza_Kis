<?php



class Cesty_model extends CI_Model {

    function getRows($id = "")
    {
        if (!empty($id)) {
            $this->db->select('oblast.idOblast,kategorie.idKategorie,oblast.Mesto,kategorie.Cislo_cesty,cesty.idCesty,cesty.idOblast,cesty.idKategorie')
                ->join('oblast','cesty.idOblast=oblast.idOblast')
                ->join('kategorie','cesty.idKategorie=kategorie.idKategorie');

            $query = $this->db->get_where('cesty', array('idCesty' => $id));
            return $query->row_array();
        } else {
            $this->db->select('oblast.idOblast,kategorie.idKategorie,oblast.Mesto,kategorie.Cislo_cesty,cesty.idCesty,cesty.idOblast,cesty.idKategorie')
                ->join('oblast','cesty.idOblast=oblast.idOblast')
                ->join('kategorie','cesty.idKategorie=kategorie.idKategorie');
            $query = $this->db->get('cesty');
            return $query->result_array();
        }
    }


    // vlozenie zaznamu
    public function insert($data = array())
    {
        $insert = $this->db->insert('cesty', $data);
        if ($insert) {
            return $this->db->insert_id();
        } else {
            return false;
        }
    }

// aktualizacia zaznamu
    public function update($data, $id) {
        if(!empty($data) && !empty($id)){
            $update = $this->db->update('cesty', $data,
                array('idCesty'=>$id));
            return $update?true:false;
        }else{
            return false;
        }
    }

// odstranenie zaznamu
    public function delete($id){
        $delete = $this->db->delete('cesty',array('idCesty'=>$id));
        return $delete?true:false;
    }

    public function get_oblast_dropdown($id = ""){
    $this->db->order_by('idOblast')
        ->select('idOblast as id, Mesto')
        ->from('oblast');
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
        $dropdowns = $query->result();
        foreach ($dropdowns as $dropdown)
        {
            $dropdownlist[$dropdown->id] = $dropdown->Mesto;
        }
        $dropdownlist[''] = 'Vyberte názov mesta.';
        return $dropdownlist;
    }
}

    public function get_kategorie_dropdown($id = ""){
        $this->db->order_by('idKategorie')
            ->select('idKategorie as id, Cislo_cesty')
            ->from('kategorie');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $dropdowns = $query->result();
            foreach ($dropdowns as $dropdown)
            {
                $dropdownlist[$dropdown->id] = $dropdown->Cislo_cesty;
            }
            $dropdownlist[''] = 'Vyberte názov kategórie.';
            return $dropdownlist;
        }
    }




}
