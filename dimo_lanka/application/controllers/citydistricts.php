<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of citydistricts
 *
 * @author Iresha Lakmali
 */
class citydistricts extends C_Controller {

    private $resours = array(
        'JS' => array('citydistricts/js/city'),
        'CSS' => array());

    public function __construct() {
        parent::__construct();
    }

    public function drawIndexCityDistricts() {
        $this->template->attach($this->resours);
        $this->template->draw('citydistricts/index_citydistricts', true);
    }

    public function drawCreateCity() {
        $this->template->draw('citydistricts/create_city', false);
    }

    public function drawCreateDistricts() {
        $this->template->draw('citydistricts/create_districts', false);
    }

    public function createCity() {
        $this->form_validation->set_rules('city_code', 'City Code', 'required');
        $this->form_validation->set_rules('city_name', 'City Name', 'required');
        $this->form_validation->set_rules('postal_code', 'Postal Code', 'required');
        $this->form_validation->set_rules('txt_city_id', 'District Name', 'required');
        if ($this->form_validation->run()) {
            $this->load->model('citydistricts/citydistricts_model');
            $city=$this->citydistricts_model->createCity($_POST);
            //redirect('citydistricts/drawIndexCityDistrictsView');
			if ($city) {
                $this->session->set_flashdata('insert_bank', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#00BFFF;border:solid 1px #00BFFF;padding:2px;border-radius: 5px 5px 5px 5px">Successfully registered City</spam>');
            
                
            } else {
                $this->session->set_flashdata('insert_bank', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#ff0000;border:solid 1px #ff99cc;padding:2px;border-radius: 5px 5px 5px 5px">City name already exist</spam>');
            }


            redirect('citydistricts/drawIndexCityDistricts');
			
			
        } else {
            $this->drawIndexCityDistricts();
        }
    }

    public function createDistricts() {
        $this->form_validation->set_rules('district_code', 'District Code', 'required');
        $this->form_validation->set_rules('district_name', 'District Name', 'required');
        if ($this->form_validation->run()) {
            $this->load->model('citydistricts/citydistricts_model');
            $distict=$this->citydistricts_model->createDistricts($_POST);
            //redirect('citydistricts/drawIndexCityDistrictsView');
			
			if ($distict) {
                $this->session->set_flashdata('insert_district', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#00BFFF;border:solid 1px #00BFFF;padding:2px;border-radius: 5px 5px 5px 5px">Successfully registered District</spam>');
            
                 
            } else {
                $this->session->set_flashdata('insert_district', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#ff0000;border:solid 1px #ff99cc;padding:2px;border-radius: 5px 5px 5px 5px">District name or Postal Code already exist</spam>');
            }
            
            redirect('citydistricts/drawIndexCityDistricts');
			
        } else {
            $this->drawIndexCityDistricts();
        }
    }

    public function get_all_city() {
        $q = strtolower($_GET['term']);
        $this->load->model('citydistricts/citydistricts_model');
        $column = array('city_name', 'city_id');
        $result = $this->citydistricts_model->get_all_city($q, $column);
        $no_result = array('label' => 'no result found');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($no_result);
        }
    }

    public function get_all_district() {

        $q = strtolower($_GET['term']);
        $this->load->model('citydistricts/citydistricts_model');
        $column = array('district_name', 'district_id');
        $result = $this->citydistricts_model->get_all_district($q, $column);
        $no_result = array('label' => 'no result found');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($no_result);
        }
    }

    public function drawIndexCityDistrictsView() {
        $this->template->attach($this->resours);
        $this->template->draw('citydistricts/index_citydistricts_view', true);
    }

    public function drawViewAllCity() {
        $this->load->model('citydistricts/citydistricts_model');
        $viewAllCity = $this->citydistricts_model->viewAllCity();
        $this->template->draw('citydistricts/view_all_city', false, $viewAllCity);
    }

    public function drawViewAllDistricts() {
        $this->load->model('citydistricts/citydistricts_model');
        $viewAllDistricts = $this->citydistricts_model->viewAllDistricts();
        $this->template->draw('citydistricts/view_all_districts', false, $viewAllDistricts);
    }

    public function drawIndexManageDistricts() {
        $this->template->attach($this->resours);
        $this->template->draw('citydistricts/index_districts', true);
    }

    public function drawIndexManageCity() {
        $this->template->attach($this->resours);
        $this->template->draw('citydistricts/index_city', true);
    }

    public function drawManageCity() {
          $this->template->draw('citydistricts/manage_city', false);
    }

    public function drawManageDistricts() {
          $this->template->draw('citydistricts/manage_districts', false);
    }
    
    public function updateDistricts(){
        $this->load->model('citydistricts/citydistricts_model');
        $this->citydistricts_model->updateDistricts($_POST);
         redirect('citydistricts/drawIndexCityDistrictsView');
        
        
    }
    
     public function updateCity(){
        $this->load->model('citydistricts/citydistricts_model');
        $this->citydistricts_model->updateCity($_POST);
      //   redirect('citydistricts/drawIndexCityDistrictsView');
        
        
    }

	 public function remooveCity() {
        $this->load->model('citydistricts/citydistricts_model');
        $id = $this->input->get('city_id');
        $this->citydistricts_model->remooveCity($id);
        redirect('citydistricts/drawIndexCityDistrictsView');
    }

    public function remooveDistricts() {
        $this->load->model('citydistricts/citydistricts_model');
        $id = $this->input->get('district_id');
        $this->citydistricts_model->remooveDisrict($id);
        redirect('citydistricts/drawIndexCityDistrictsView');
    }
	
}

?>
