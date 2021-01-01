<?php
class form extends CI_Controller
{

    public function __construct(){
        parent::__construct();
        $this->load->database();
        $this->load->model('form_model');
        $this->load->library('form_validation');
        $this->load->library('upload');
    }

    public function savedata(){
        $this->load->view('form_view');
        if ($this->input->post('save'))
        {
            $f=$this->input->post('firstname');
            $l=$this->input->post('lastname');
            $sa=$this->input->post('street_addres');
            $sad=$this->input->post('street_add');
            $c=$this->input->post('city');
            $st=$this->input->post('state_name');
            $z=$this->input->post('zip');
            $d=$this->input->post('dob');
            $g=$this->input->post('gender');
            $h=$this->input->post('hobbies');
            $ph=$this->input->post('phone');
            $e=$this->input->post('email');
            
            if(empty($h)){
                echo("<p>You didn't select any any hobby.</p>\n");
            } 
            else{
                $N = count($h);
                echo("<p>You selected $N hobbies(s): ");
                for($i=0; $i < $N; $i++){
                    if($i==0)
                        $var1 = $h[$i];
                    else
                        $var1 = $var1.'&'.$h[$i];
                }  
            
            }
            

            
            if($_FILES['profilePic']['error'] > 0){
                $pp = addslashes(file_get_contents($this->input->post('profileimg')));
            }else{
                if(count($_FILES) > 0) {
                    if(isset($_FILES["profilePic"]) && !empty($_FILES["profilePic"]) ){
                        $pp = addslashes(file_get_contents($_FILES["profilePic"]['tmp_name']));
                    }
                }
            }
           

            if(isset($_FILES["pdffile"]) && !empty($_FILES["pdffile"])){
            $pdffile = "upload/".$_FILES["pdffile"]["name"];
            move_uploaded_file($_FILES["pdffile"]["tmp_name"], $pdffile);
            $pf=$pdffile;
            }
            else{
                $pf=$this->input->post('pdf_at');
            }

          
            $registerid=$this->input->post('registerid');
            if($registerid){
                $this->form_model->update_records($f,$l,$sa,$sad,$c,$st,$z,$d,$g,$var1,$ph,$e,$pp,$pf,$registerid);
                echo "Data updated successfully !";
            }
            else{
                $this->form_model->saverec($f,$l,$sa,$sad,$c,$st,$z,$d,$g,$var1,$ph,$e,$pp,$pf);
                echo"Record Saved";
            }
            redirect("/form/displaydata");
        }

    }
    
    public function displaydata(){
        $result['data']=$this->form_model->disrecords();
        $this->load->view('form_records', $result);
    }

    public function updatedata(){
        $id=$this->input->get('id');
        $result['data']=$this->form_model->displayrecordsById($id);
        // var_dump($result['data']);
        $this->data["userdata"] = $result['data'];
        $this->load->view('form_view',$this->data);	
    }
    
    public function deldata(){
        $id=$this->input->get('id');
        $this->form_model->deleterec($id);
        redirect("/form/displaydata");
    }
    public function info(){
       echo $this->input->ip_address();
       echo $this->router->fetch_class();
       echo APP_URL;
    
    }



    public function createTable(){

        if( $this->db->table_exists('register') == FALSE ){

            $query = "CREATE TABLE register(
                    id int AUTO_INCREMENT PRIMARY KEY,
                    firstname char(30) NOT NULL,
                    lastname char(10) NOT NULL,
                    street_addres varchar(50) NOT NULL,
                    street_add varchar(50) NOT NULL,
                    city varchar(20) NOT NULL,
                    state_name varchar(50) NOT NULL,
                    zip  varchar(10) NOT NULL,
                    dob date NOT NULL,
                    gender enum('male','female') NOT NULL,
                    hobbies varchar(50) NOT NULL,
                    phone bigint(10) NOT NULL,
                    email varchar(30) NOT NULL,
                    profilePic longblob NOT NULL,
                    pdffile varchar(50) NOT NULL
            )ENGINE = InnoDB;";
                    
              $this->db->query($query);

        }

    }




}
