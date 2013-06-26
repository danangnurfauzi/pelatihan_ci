<?php 

class Welcome extends CI_Controller {
    
    var $template = 'template';
    
	public function __construct(){
		parent::__construct();
        $this->load->model('pelatihan_model');		
	}
	
	public function index()
	{		        
        if($this->session->userdata('logged_in') == true):
            redirect('welcome/dashboard');
        else:      
        
        
            if($this->input->post('submit')):
                
                if( ($this->input->post('username') == 'admin') && ($this->input->post('password') == 'admin')):
                    
                    $userdata = array(
                                    'nama'=>'admin',
                                    'logged_in'=> TRUE
                                    );
                    $this->session->set_userdata($userdata);
                    
                    redirect('welcome/dashboard');
                    
                else:
                
                    $this->session->set_flashdata('message','<strong>error password or username</strong>');
                    redirect('welcome');
                    
                endif;
                
            endif;
            
            
        endif;
        
        $this->load->view('login');
	}
    
    public function logout(){
        $this->session->sess_destroy();
        redirect('welcome');
    }
	
	public function dashboard(){
	   $data['title'] = 'dashboard';
       $data['title_header'] = 'Dashboard';
       
       $data['page'] = 'content/dashboard';
       
	   $this->load->view($this->template,$data);
	}
	
	public function form_user(){
	
		$data['title'] = "Form User";
		$data['title_header'] = "Form Karyawan";
        
        $data['data_jabatan'] = $this->pelatihan_model->data_jabatan();
        $data['karyawan'] = $this->pelatihan_model->get_karyawan($idkary="");
                        
        if($this->input->post('submit')):
            
            $this->pelatihan_model->input_karyawan($idkary="");
            
            redirect('welcome/form_user');
            
        endif;   
		
        $data['page'] = 'content/form_user';
        
		$this->load->view($this->template,$data);
	}
	
    public function form_user_edit($id){
        $data['title'] = "Form User";
		$data['title_header'] = "Form Karyawan";
        
        $data['data_jabatan'] = $this->pelatihan_model->data_jabatan();
        $data['ubah_karyawan'] = $this->pelatihan_model->get_karyawan($id)->row();
                        
        if($this->input->post('submit')):
            
            $this->pelatihan_model->input_karyawan($id);
            
            redirect('welcome/form_user');
            
        endif;   
		
		$data['page'] = 'content/form_user_edit';
        
		$this->load->view($this->template,$data);
    }
    
	public function input_jabatan(){
	
		$data['title'] = "Input Jabatan";
		$data['title_header'] = "Form Input Jabatan";
        
        $data['data_jabatan'] = $this->pelatihan_model->data_jabatan();                
		
		if($this->input->post('submit')):
		
			//print_r($this->input->post());exit;
		    
            $jabatan = $this->input->post('jabatan');  
            
            $this->pelatihan_model->input_jabatan($jabatan);  
            
            redirect('welcome/input_jabatan');
              
		endif;
	
		$data['page'] = 'content/input_form_jabatan';
        
		$this->load->view($this->template,$data);
	}
    
    public function delete_jabatan($id_jabatan){
        
        $this->pelatihan_model->hapus_jabatan($id_jabatan);
        
        redirect('welcome/input_jabatan');
        
    }
    
    public function ubah_jabatan($id){
        
        $data['title'] = "Edit Jabatan";
		$data['title_header'] = "Form Ubah Jabatan";
        
        $data['data_jab'] = $this->pelatihan_model->get_data_jabatan($id)->row();
        //print_r($tes->result());exit;
        
        if($this->input->post('submit')):
        
            $jab = $this->input->post('jabatan');
        
            $this->pelatihan_model->ubah_data_jabatan($id,$jab);
            
            redirect('welcome/input_jabatan');
        
        endif;
        
        $data['page'] = 'content/ubah_form_jabatan';
        
		$this->load->view($this->template,$data);
    }
    
    public function delete_karyawan($id){
        
        $this->pelatihan_model->delete_karyawan($id);
        
        redirect('welcome/form_user');
        
    }
    
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */