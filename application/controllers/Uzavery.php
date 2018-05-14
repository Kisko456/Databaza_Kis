<?php

class Uzavery extends CI_Controller
{

    function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('Uzavery_model');
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
        $data['uzavery'] = $this->Uzavery_model->getRows();
        $data['title'] = 'Zoznam uzáver';
        //nahratie zoznamu oblastí

        $this->load->view('uzavery/index', $data);

    }





    // Zobrazenie detailu
    public function view($id){
        $data = array();

        //kontrola, ci bolo zaslane id riadka
        if(!empty($id)){
            $data['uzavery'] = $this->Uzavery_model->getRows($id);
            $data['title'] = $data['uzavery']['Priemerne_zdrzanie'];
            //nahratie detailu zaznamu

            $this->load->view('uzavery/view', $data);

        }else{
            redirect('/uzavery');

        }
    }


    // pridanie zaznamu
    public function add(){
        $data = array();
        $postData = array();

        //zistenie, ci bola zaslana poziadavka na pridanie zazanmu
        if($this->input->post('postSubmit')){
            //definicia pravidiel validacie
            $this->form_validation->set_rules('Datum_od', 'Datum_od', 'required');
            $this->form_validation->set_rules('Datum_do', 'Datum_do', 'required');
            $this->form_validation->set_rules('Km_od', ' Km_od', 'required');
            $this->form_validation->set_rules('Km_do', 'Km_do', 'required');
            $this->form_validation->set_rules('Priemerne_zdrzanie', 'Priemerne_zdrzanie', 'required');
            $this->form_validation->set_rules('Dovod_uzavery', ' Dovod_uzavery', 'required');
            $this->form_validation->set_rules('Dlzka_obchadzky', 'Dlzka_obchadzky', 'required');
            $this->form_validation->set_rules('idCesty', 'idCesty', 'required');


            //priprava dat pre vlozenie
            $postData = array(
                'Datum_od' => $this->input->post('Datum_od'),
                'Datum_do' => $this->input->post('Datum_do'),
                'Km_od' => $this->input->post('Km_od'),
                'Km_do' => $this->input->post('Km_do'),
                'Priemerne_zdrzanie' => $this->input->post('Priemerne_zdrzanie'),
                'Dovod_uzavery' => $this->input->post('Dovod_uzavery'),
                'Dlzka_obchadzky' => $this->input->post('Dlzka_obchadzky'),
                'idCesty' => $this->input->post('idCesty'),


            );

            //validacia zaslanych dat
            if($this->form_validation->run() == true){
                //vlozenie dat
                $insert = $this->Uzavery_model->insert($postData);

                if($insert){
                    $this->session->set_userdata('success_msg', 'Záznam bol úspešne vložený.');
                    redirect('/uzavery');
                }else{
                    $data['error_msg'] = 'Nastala chyba, skúste to znova.';
                }
            }
        }
        $data['post'] = $postData;
        $data['title'] = 'Create kategoriu';

        $data['action'] = 'Pridať';
        //zobrazenie formulara pre vlozenie a editaciu dat

        $this->load->view('uzavery/add-edit', $data);

    }

    // aktualizacia dat
    public function edit($id){
        $data = array();
        //ziskanie dat z tabulky
        $postData = $this->Uzavery_model->getRows($id);

        //zistenie, ci bola zaslana poziadavka na aktualizaciu
        if($this->input->post('postSubmit')){
            //definicia pravidiel validacie
            $this->form_validation->set_rules('Datum_od', 'Datum_od', 'required');
            $this->form_validation->set_rules('Datum_do', 'Datum_do', 'required');
            $this->form_validation->set_rules('Km_od', ' Km_od', 'required');
            $this->form_validation->set_rules('Km_do', 'Km_do', 'required');
            $this->form_validation->set_rules('Priemerne_zdrzanie', 'Priemerne_zdrzanie', 'required');
            $this->form_validation->set_rules('Dovod_uzavery', ' Dovod_uzavery', 'required');
            $this->form_validation->set_rules('Dlzka_obchadzky', 'Dlzka_obchadzky', 'required');
            $this->form_validation->set_rules('idCesty', 'idCesty', 'required');

            // priprava dat pre aktualizaciu
            $postData = array(
                'Datum_od' => $this->input->post('Datum_od'),
                'Datum_do' => $this->input->post('Datum_do'),
                'Km_od' => $this->input->post('Km_od'),
                'Km_do' => $this->input->post('Km_do'),
                'Priemerne_zdrzanie' => $this->input->post('Priemerne_zdrzanie'),
                'Dovod_uzavery' => $this->input->post('Dovod_uzavery'),
                'Dlzka_obchadzky' => $this->input->post('Dlzka_obchadzky'),
                'idCesty' => $this->input->post('idCesty'),
            );

            //validacia zaslanych dat
            if($this->form_validation->run() == true){
                //aktualizacia dat
                $update = $this->Uzavery_model->update($postData, $id);

                if($update){
                    $this->session->set_userdata('success_msg', 'Záznam bol úspešne upravený.');
                    redirect('/uzavery');
                }else{
                    $data['error_msg'] = 'Nastala chyba, skúste to znova.';
                }
            }
        }

        $data['post'] = $postData;
        $data['title'] = 'Update Temperature';
        $data['action'] = 'Upraviť';
        //zobrazenie formulara pre vlozenie a editaciu dat

        $this->load->view('uzavery/add-edit', $data);

    }

    // odstranenie dat
    public function delete($id){


        if($id){
            //odstranenie zaznamu
            $delete = $this->Uzavery_model->delete($id);
            if($delete){
                $this->session->set_userdata('success_msg', 'Záznam bol úspešne odstránený.');
            }else{
                $this->session->set_userdata('error_msg', 'Nastala chyba, skúste to znova.');
            }
        }
        redirect('/uzavery');
    }
}
