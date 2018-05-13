<?php

class Oblast extends CI_Controller
{

    function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('Oblast_model');
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
        $data['oblast'] = $this->Oblast_model->getRows();
        $data['title'] = 'Zoznam oblastí';
        //nahratie zoznamu oblastí

        $this->load->view('oblast/index', $data);

    }





    // Zobrazenie detailu
    public function view($id){
        $data = array();

        //kontrola, ci bolo zaslane id riadka
        if(!empty($id)){
            $data['oblast'] = $this->Oblast_model->getRows($id);
            $data['title'] = $data['oblast']['Stat'];
            //nahratie detailu zaznamu

            $this->load->view('oblast/view', $data);

        }else{
            redirect('/oblast');

        }
    }


    // pridanie zaznamu
    public function add(){
        $data = array();
        $postData = array();

        //zistenie, ci bola zaslana poziadavka na pridanie zazanmu
        if($this->input->post('postSubmit')){
            //definicia pravidiel validacie
            $this->form_validation->set_rules('Stat', 'Stat', 'required');
            $this->form_validation->set_rules('Kraj', 'Kraj', 'required');
            $this->form_validation->set_rules('Okres', ' Okres', 'required');
            $this->form_validation->set_rules('Mesto', ' Mesto', 'required');

            //priprava dat pre vlozenie
            $postData = array(
                'Stat' => $this->input->post('Stat'),
                'Kraj' => $this->input->post('Kraj'),
                'Okres' => $this->input->post('Okres'),
                'Mesto' => $this->input->post('Mesto'),

            );

            //validacia zaslanych dat
            if($this->form_validation->run() == true){
                //vlozenie dat
                $insert = $this->Oblast_model->insert($postData);

                if($insert){
                    $this->session->set_userdata('success_msg', 'Záznam bol úspešne vložený.');
                    redirect('/oblast');
                }else{
                    $data['error_msg'] = 'Nastala chyba, skúste to znova.';
                }
            }
        }
        $data['post'] = $postData;
        $data['title'] = 'Create Oblast';

        $data['action'] = 'Pridať';
        //zobrazenie formulara pre vlozenie a editaciu dat

        $this->load->view('oblast/add-edit', $data);

    }

    // aktualizacia dat
    public function edit($id){
        $data = array();
        //ziskanie dat z tabulky
        $postData = $this->Oblast_model->getRows($id);

        //zistenie, ci bola zaslana poziadavka na aktualizaciu
        if($this->input->post('postSubmit')){
            //definicia pravidiel validacie
            $this->form_validation->set_rules('Stat', 'Stat', 'required');
            $this->form_validation->set_rules('Kraj', 'Kraj', 'required');
            $this->form_validation->set_rules('Okres', ' Okres', 'required');
            $this->form_validation->set_rules('Mesto', ' Mesto', 'required');

            // priprava dat pre aktualizaciu
            $postData = array(
                'Stat' => $this->input->post('Stat'),
                'Kraj' => $this->input->post('Kraj'),
                'Okres' => $this->input->post('Okres'),
                'Mesto' => $this->input->post('Mesto'),
            );

            //validacia zaslanych dat
            if($this->form_validation->run() == true){
                //aktualizacia dat
                $update = $this->Oblast_model->update($postData, $id);

                if($update){
                    $this->session->set_userdata('success_msg', 'Záznam bol úspešne upravený.');
                    redirect('/oblast');
                }else{
                    $data['error_msg'] = 'Nastala chyba, skúste to znova.';
                }
            }
        }

        $data['post'] = $postData;
        $data['title'] = 'Update Temperature';
        $data['action'] = 'Upraviť';
        //zobrazenie formulara pre vlozenie a editaciu dat

        $this->load->view('oblast/add-edit', $data);

    }

    // odstranenie dat
    public function delete($id){


        if($id){
            //odstranenie zaznamu
            $delete = $this->Oblast_model->delete($id);
            if($delete){
                $this->session->set_userdata('success_msg', 'Záznam bol úspešne odstránený.');
            }else{
                $this->session->set_userdata('error_msg', 'Nastala chyba, skúste to znova.');
            }
        }
        redirect('/oblast');
    }
}
