<?php

class Kategorie extends CI_Controller
{

    function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('Kategorie_model');
    }

    public function index(){
        $data = array();
        //ziskanie sprav zo session
        if($this->session->userdata('success_msg')){
            $data['success_msg'] = $this->session->userdata('success_msg');
            $this->session->unset_userdata('success_msg');
        }
        if($this->session->userdata('error_msg')){
            $data['error_msg'] = $this->session->userdata('error_msg');
            $this->session->unset_userdata('error_msg');
        }
        $data['kategorie'] = $this->Kategorie_model->getRows();
        $data['title'] = 'Zoznam kategórií';
        //nahratie zoznamu oblastí

        $this->load->view('kategorie/index', $data);

    }





    // Zobrazenie detailu
    public function view($id){
        $data = array();

        //kontrola, ci bolo zaslane id riadka
        if(!empty($id)){
            $data['kategorie'] = $this->Kategorie_model->getRows($id);
            $data['title'] = $data['kategorie']['Kategoria'];
            //nahratie detailu zaznamu

            $this->load->view('kategorie/view', $data);

        }else{
            redirect('/kategorie');

        }
    }


    // pridanie zaznamu
    public function add(){
        $data = array();
        $postData = array();

        //zistenie, ci bola zaslana poziadavka na pridanie zazanmu
        if($this->input->post('postSubmit')){
            //definicia pravidiel validacie
            $this->form_validation->set_rules('Kategoria', 'Kategoria', 'required');
            $this->form_validation->set_rules('Cislo_cesty', 'Cislo_cesty', 'required');
            $this->form_validation->set_rules('Dlzka_cesty', ' Dlzka_cesty', 'required');


            //priprava dat pre vlozenie
            $postData = array(
                'Kategoria' => $this->input->post('Kategoria'),
                'Cislo_cesty' => $this->input->post('Cislo_cesty'),
                'Dlzka_cesty' => $this->input->post('Dlzka_cesty'),


            );

            //validacia zaslanych dat
            if($this->form_validation->run() == true){
                //vlozenie dat
                $insert = $this->Kategorie_model->insert($postData);

                if($insert){
                    $this->session->set_userdata('success_msg', 'Záznam bol úspešne vložený.');
                    redirect('/kategorie');
                }else{
                    $data['error_msg'] = 'Nastala chyba, skúste to znova.';
                }
            }
        }
        $data['post'] = $postData;
        $data['title'] = 'Create kategoriu';

        $data['action'] = 'Pridať';
        //zobrazenie formulara pre vlozenie a editaciu dat

        $this->load->view('kategorie/add-edit', $data);

    }

    // aktualizacia dat
    public function edit($id){
        $data = array();
        //ziskanie dat z tabulky
        $postData = $this->Kategorie_model->getRows($id);

        //zistenie, ci bola zaslana poziadavka na aktualizaciu
        if($this->input->post('postSubmit')){
            //definicia pravidiel validacie
            $this->form_validation->set_rules('Kategoria', 'Kategoria', 'required');
            $this->form_validation->set_rules('Cislo_cesty', 'Cislo_cesty', 'required');
            $this->form_validation->set_rules('Dlzka_cesty', ' Dlzka_cesty', 'required');

            // priprava dat pre aktualizaciu
            $postData = array(
                'Kategoria' => $this->input->post('Kategoria'),
                'Cislo_cesty' => $this->input->post('Cislo_cesty'),
                'Dlzka_cesty' => $this->input->post('Dlzka_cesty'),
            );

            //validacia zaslanych dat
            if($this->form_validation->run() == true){
                //aktualizacia dat
                $update = $this->Kategorie_model->update($postData, $id);

                if($update){
                    $this->session->set_userdata('success_msg', 'Záznam bol úspešne upravený.');
                    redirect('/kategorie');
                }else{
                    $data['error_msg'] = 'Nastala chyba, skúste to znova.';
                }
            }
        }

        $data['post'] = $postData;
        $data['title'] = 'Update Temperature';
        $data['action'] = 'Upraviť';
        //zobrazenie formulara pre vlozenie a editaciu dat

        $this->load->view('kategorie/add-edit', $data);

    }

    // odstranenie dat
    public function delete($id){


        if($id){
            //odstranenie zaznamu
            $delete = $this->Kategorie_model->delete($id);
            if($delete){
                $this->session->set_userdata('success_msg', 'Záznam bol úspešne odstránený.');
            }else{
                $this->session->set_userdata('error_msg', 'Nastala chyba, skúste to znova.');
            }
        }
        redirect('/kategorie');
    }
}
