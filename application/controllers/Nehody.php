<?php

class Nehody extends CI_Controller
{

    function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('Nehody_model');
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
        $data['nehody'] = $this->Nehody_model->getRows();
        $data['title'] = 'Zoznam nehôd';
        //nahratie zoznamu oblastí

        $this->load->view('nehody/index', $data);

    }





    // Zobrazenie detailu
    public function view($id){
        $data = array();

        //kontrola, ci bolo zaslane id riadka
        if(!empty($id)){
            $data['nehody'] = $this->Nehody_model->getRows($id);
            $data['title'] = $data['nehody']['Cas'];
            //nahratie detailu zaznamu

            $this->load->view('nehody/view', $data);

        }else{
            redirect('/nehody');

        }
    }


    // pridanie zaznamu
    public function add(){
        $data = array();
        $postData = array();

        //zistenie, ci bola zaslana poziadavka na pridanie zazanmu
        if($this->input->post('postSubmit')){
            //definicia pravidiel validacie
            $this->form_validation->set_rules('idCesty', 'idCesty', 'required');
            $this->form_validation->set_rules('Datum', 'Datum', 'required');
            $this->form_validation->set_rules('Cas', ' Cas', 'required');
            $this->form_validation->set_rules('Zdrzanie', ' Zdrzanie', 'required');
            $this->form_validation->set_rules('KM_nehody', ' KM_nehody', 'required');
            $this->form_validation->set_rules('pricina', ' pricina', 'required');

            //priprava dat pre vlozenie
            $postData = array(
                'idCesty' => $this->input->post('idCesty'),
                'Datum' => $this->input->post('Datum'),
                'Cas' => $this->input->post('Cas'),
                'Zdrzanie' => $this->input->post('Zdrzanie'),
                'KM_nehody' => $this->input->post('KM_nehody'),
                'Pricina' => $this->input->post('pricina'),

            );

            //validacia zaslanych dat
            if($this->form_validation->run() == true){
                //vlozenie dat
                $insert = $this->Nehody_model->insert($postData);

                if($insert){
                    $this->session->set_userdata('success_msg', 'Záznam bol úspešne vložený.');
                    redirect('/nehody');
                }else{
                    $data['error_msg'] = 'Nastala chyba, skúste to znova.';
                }
            }
        }
        $data['post'] = $postData;
        $data['title'] = 'Create Oblast';

        $data['action'] = 'Pridať';
        //zobrazenie formulara pre vlozenie a editaciu dat

        $this->load->view('nehody/add-edit', $data);

    }

    // aktualizacia dat
    public function edit($id){
        $data = array();
        //ziskanie dat z tabulky
        $postData = $this->Nehody_model->getRows($id);

        //zistenie, ci bola zaslana poziadavka na aktualizaciu
        if($this->input->post('postSubmit')){
            //definicia pravidiel validacie
            $this->form_validation->set_rules('idCesty', 'idCesty', 'required');
            $this->form_validation->set_rules('Datum', 'Datum', 'required');
            $this->form_validation->set_rules('Cas', ' Cas', 'required');
            $this->form_validation->set_rules('Zdrzanie', ' Zdrzanie', 'required');
            $this->form_validation->set_rules('KM_nehody', ' KM_nehody', 'required');
            $this->form_validation->set_rules('pricina', ' Pricina', 'required');

            // priprava dat pre aktualizaciu
            $postData = array(
                'idCesty' => $this->input->post('idCesty'),
                'Datum' => $this->input->post('Datum'),
                'Cas' => $this->input->post('Cas'),
                'Zdrzanie' => $this->input->post('Zdrzanie'),
                'KM_nehody' => $this->input->post('KM_nehody'),
                'Pricina' => $this->input->post('pricina'),
            );

            //validacia zaslanych dat
            if($this->form_validation->run() == true){
                //aktualizacia dat
                $update = $this->Nehody_model->update($postData, $id);

                if($update){
                    $this->session->set_userdata('success_msg', 'Záznam bol úspešne upravený.');
                    redirect('/nehody');
                }else{
                    $data['error_msg'] = 'Nastala chyba, skúste to znova.';
                }
            }
        }

        $data['post'] = $postData;
        $data['title'] = 'Update Temperature';
        $data['action'] = 'Upraviť';
        //zobrazenie formulara pre vlozenie a editaciu dat

        $this->load->view('nehody/add-edit', $data);

    }

    // odstranenie dat
    public function delete($id){


        if($id){
            //odstranenie zaznamu
            $delete = $this->Nehody_model->delete($id);
            if($delete){
                $this->session->set_userdata('success_msg', 'Záznam bol úspešne odstránený.');
            }else{
                $this->session->set_userdata('error_msg', 'Nastala chyba, skúste to znova.');
            }
        }
        redirect('/nehody');
    }
}
