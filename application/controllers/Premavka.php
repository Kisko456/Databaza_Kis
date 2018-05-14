<?php

class Premavka extends CI_Controller
{

    function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('Premavka_model');
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
        $data['premavka'] = $this->Premavka_model->getRows();
        $data['title'] = 'Zoznam premávky';
        //nahratie zoznamu oblastí

        $this->load->view('premavka/index', $data);

    }





    // Zobrazenie detailu
    public function view($id){
        $data = array();

        //kontrola, ci bolo zaslane id riadka
        if(!empty($id)){
            $data['premavka'] = $this->Premavka_model->getRows($id);
            $data['title'] = $data['premavka']['Pocet_aut_denne'];
            //nahratie detailu zaznamu

            $this->load->view('premavka/view', $data);

        }else{
            redirect('/premavka');

        }
    }


    // pridanie zaznamu
    public function add(){
        $data = array();
        $postData = array();

        //zistenie, ci bola zaslana poziadavka na pridanie zazanmu
        if($this->input->post('postSubmit')){
            //definicia pravidiel validacie
            $this->form_validation->set_rules('Pocet_aut_denne', 'Pocet_aut_denne', 'required');
            $this->form_validation->set_rules('Rychlost_premavky', 'Rychlost_premavky', 'required');
            $this->form_validation->set_rules('Dlzka_kolony', ' Dlzka_kolony', 'required');
            $this->form_validation->set_rules('Zdrzanie', ' Zdrzanie', 'required');
            $this->form_validation->set_rules('Datum', ' Datum', 'required');
            $this->form_validation->set_rules('idCesty', ' idCesty', 'required');


            //priprava dat pre vlozenie
            $postData = array(
                'Pocet_aut_denne' => $this->input->post('Pocet_aut_denne'),
                'Rychlost_premavky' => $this->input->post('Rychlost_premavky'),
                'Dlzka_kolony' => $this->input->post('Dlzka_kolony'),
                'Zdrzanie' => $this->input->post('Zdrzanie'),
                'Datum' => $this->input->post('Datum'),
                'idCesty' => $this->input->post('idCesty'),


            );

            //validacia zaslanych dat
            if($this->form_validation->run() == true){
                //vlozenie dat
                $insert = $this->Premavka_model->insert($postData);

                if($insert){
                    $this->session->set_userdata('success_msg', 'Záznam bol úspešne vložený.');
                    redirect('/premavka');
                }else{
                    $data['error_msg'] = 'Nastala chyba, skúste to znova.';
                }
            }
        }
        $data['post'] = $postData;
        $data['title'] = 'Create kategoriu';

        $data['action'] = 'Pridať';
        //zobrazenie formulara pre vlozenie a editaciu dat

        $this->load->view('premavka/add-edit', $data);

    }

    // aktualizacia dat
    public function edit($id){
        $data = array();
        //ziskanie dat z tabulky
        $postData = $this->Premavka_model->getRows($id);

        //zistenie, ci bola zaslana poziadavka na aktualizaciu
        if($this->input->post('postSubmit')){
            //definicia pravidiel validacie
            $this->form_validation->set_rules('Pocet_aut_denne', 'Pocet_aut_denne', 'required');
            $this->form_validation->set_rules('Rychlost_premavky', 'Rychlost_premavky', 'required');
            $this->form_validation->set_rules('Dlzka_kolony', ' Dlzka_kolony', 'required');
            $this->form_validation->set_rules('Zdrzanie', ' Zdrzanie', 'required');
            $this->form_validation->set_rules('Datum', ' Datum', 'required');
            $this->form_validation->set_rules('idCesty', ' idCesty', 'required');

            // priprava dat pre aktualizaciu
            $postData = array(
                'Pocet_aut_denne' => $this->input->post('Pocet_aut_denne'),
                'Rychlost_premavky' => $this->input->post('Rychlost_premavky'),
                'Dlzka_kolony' => $this->input->post('Dlzka_kolony'),
                'Zdrzanie' => $this->input->post('Zdrzanie'),
                'Datum' => $this->input->post('Datum'),
                'idCesty' => $this->input->post('idCesty'),
            );

            //validacia zaslanych dat
            if($this->form_validation->run() == true){
                //aktualizacia dat
                $update = $this->Premavka_model->update($postData, $id);

                if($update){
                    $this->session->set_userdata('success_msg', 'Záznam bol úspešne upravený.');
                    redirect('/premavka');
                }else{
                    $data['error_msg'] = 'Nastala chyba, skúste to znova.';
                }
            }
        }

        $data['post'] = $postData;
        $data['title'] = 'Update Temperature';
        $data['action'] = 'Upraviť';
        //zobrazenie formulara pre vlozenie a editaciu dat

        $this->load->view('premavka/add-edit', $data);

    }

    // odstranenie dat
    public function delete($id){


        if($id){
            //odstranenie zaznamu
            $delete = $this->Premavka_model->delete($id);
            if($delete){
                $this->session->set_userdata('success_msg', 'Záznam bol úspešne odstránený.');
            }else{
                $this->session->set_userdata('error_msg', 'Nastala chyba, skúste to znova.');
            }
        }
        redirect('/premavka');
    }
}
