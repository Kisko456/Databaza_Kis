<?php

class Cesty extends CI_Controller
{

    function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('Cesty_model');
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
        $data['cesty'] = $this->Cesty_model->getRows();
        $data['title'] = 'Zoznam ciest';
        //nahratie zoznamu oblastí

        $this->load->view('cesty/index', $data);

    }





    // Zobrazenie detailu
    public function view($id){
        $data = array();

        //kontrola, ci bolo zaslane id riadka
        if(!empty($id)){
            $data['cesty'] = $this->Cesty_model->getRows($id);
            $data['title'] = $data['cesty']['idOblast'];
            //nahratie detailu zaznamu

            $this->load->view('cesty/view', $data);

        }else{
            redirect('/cesty');

        }
    }


    // pridanie zaznamu
    public function add(){
        $data = array();
        $postData = array();

        //zistenie, ci bola zaslana poziadavka na pridanie zazanmu
        if($this->input->post('postSubmit')){
            //definicia pravidiel validacie
            $this->form_validation->set_rules('idOblast', 'idOblast', 'required');
            $this->form_validation->set_rules('idKategorie', 'idKategorie', 'required');



            //priprava dat pre vlozenie
            $postData = array(
                'idOblast' => $this->input->post('idOblast'),
                'idKategorie' => $this->input->post('idKategorie'),
            );

            //validacia zaslanych dat
            if($this->form_validation->run() == true){
                //vlozenie dat
                $insert = $this->Cesty_model->insert($postData);

                if($insert){
                    $this->session->set_userdata('success_msg', 'Záznam bol úspešne vložený.');
                    redirect('/cesty');
                }else{
                    $data['error_msg'] = 'Nastala chyba, skúste to znova.';
                }
            }
        }

        $data['oblast'] = $this->Cesty_model->get_oblast_dropdown();
        $data['oblast_selected'] = '';
        $data['kategorie'] = $this->Cesty_model->get_kategorie_dropdown();
        $data['kategorie_selected'] = '';
        $data['post'] = $postData;
        $data['title'] = 'Create kategoriu';

        $data['action'] = 'Pridať';
        //zobrazenie formulara pre vlozenie a editaciu dat

        $this->load->view('cesty/add-edit', $data);

    }

    // aktualizacia dat
    public function edit($id){
        $data = array();
        //ziskanie dat z tabulky
        $postData = $this->Cesty_model->getRows($id);

        //zistenie, ci bola zaslana poziadavka na aktualizaciu
        if($this->input->post('postSubmit')){
            //definicia pravidiel validacie
            $this->form_validation->set_rules('idOblast', 'idOblast', 'required');
            $this->form_validation->set_rules('idKategorie', 'idKategorie', 'required');

            // priprava dat pre aktualizaciu
            $postData = array(
                'idOblast' => $this->input->post('idOblast'),
                'idKategorie' => $this->input->post('idKategorie'),
            );

            //validacia zaslanych dat
            if($this->form_validation->run() == true){
                //aktualizacia dat
                $update = $this->Cesty_model->update($postData, $id);

                if($update){
                    $this->session->set_userdata('success_msg', 'Záznam bol úspešne upravený.');
                    redirect('/cesty');
                }else{
                    $data['error_msg'] = 'Nastala chyba, skúste to znova.';
                }
            }
        }

        $data['oblast'] = $this->Cesty_model->get_oblast_dropdown();
        $data['oblast_selected'] = $postData['idOblast'];
        $data['kategorie'] = $this->Cesty_model->get_kategorie_dropdown();
        $data['kategorie_selected'] = $postData['idKategorie'];
        $data['post'] = $postData;
        $data['title'] = 'Update Temperature';
        $data['action'] = 'Upraviť';
        //zobrazenie formulara pre vlozenie a editaciu dat

        $this->load->view('cesty/add-edit', $data);

    }

    // odstranenie dat
    public function delete($id){


        if($id){
            //odstranenie zaznamu
            $delete = $this->Cesty_model->delete($id);
            if($delete){
                $this->session->set_userdata('success_msg', 'Záznam bol úspešne odstránený.');
            }else{
                $this->session->set_userdata('error_msg', 'Nastala chyba, skúste to znova.');
            }
        }
        redirect('/cesty');
    }
}
