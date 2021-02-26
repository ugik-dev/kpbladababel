<?php
class NewsController extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('NewsModel');
        $this->load->library('upload');
    }
    function index(){
        $this->load->view('admin/NewNewPost');
    }
 
    function simpan_post(){
        $config['upload_path'] = './assets/img/news/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['encrypt_name'] = TRUE; //nama yang terupload nantinya
 
        $this->upload->initialize($config);
        if(!empty($_FILES['filefoto']['name'])){
            if ($this->upload->do_upload('filefoto')){
                $gbr = $this->upload->data();
                //Compress Image
                $config['image_library']='gd2';
                $config['source_image']='./assets/img/news/'.$gbr['file_name'];
                $config['create_thumb']= FALSE;
                $config['maintain_ratio']= FALSE;
                $config['quality']= '60%';
                // $config['width']= 710;
                // $config['height']= 420;
                $config['new_image']= './assets/img/news/'.$gbr['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
 
                $gambar=$gbr['file_name'];
                $jdl=$this->input->post('judul');
                $berita=$this->input->post('berita');
 
                $this->NewsModel->simpan_berita($jdl,$berita,$gambar);
                redirect('AdminController/news_post');
        }else{
            redirect('AdminController/news_post');
        }
                      
        }else{
            redirect('AdminController/news_post');
        }
                 
    }
 
    function lists(){
        $x['data']=$this->NewsModel->get_all_berita();
        $this->load->view('v_post_list',$x);
    }
 
    function view(){
        $kode=$this->uri->segment(3);
        $x['data']=$this->NewsModel->get_berita_by_kode($kode);
        $this->load->view('v_post_view',$x);
    }

    public function getAll(){
        try{
          // $this->SecurityModel->userOnlyGuard(TRUE);
          $data = $this->NewsModel->getAll($this->input->get());
                echo json_encode(array("data" => $data));
        } catch (Exception $e){
          ExceptionHandler::handle($e);
        }
      }

      public function get(){
        try{
          // $this->SecurityModel->userOnlyGuard(TRUE);
          // var_dump($this->input->get()['id_berita']);
          $data = $this->NewsModel->get($this->input->get()['id_berita']);
        
                echo json_encode(array("data" => $data));
        } catch (Exception $e){
          ExceptionHandler::handle($e);
        }
      }


      public function edit_post(){
        try{
          $this->SecurityModel->userOnlyGuard(TRUE);
          // $data = $this->input->post();
          // $this->load->view('admin/EditNewsPost');

          $input = $this->input->get();
        //  / $data = $this->NewsModel->get($input['id_news']);
          $pageData = array(
            'title' => 'Edit News Post',
            'content' => 'admin/EditNewsPost',
            'breadcrumb' => array(
              'Home' => base_url(),
            ),
            'berita_id' => $input['id_news']
          );
          $this->load->view('Page', $pageData);

        } catch (Exception $e){
          ExceptionHandler::handle($e);
        }
      }

      public function delete(){
        try{
          $this->SecurityModel->userOnlyGuard('admin');
          $this->NewsModel->delete($this->input->post());
          echo json_encode([]);
        } catch (Exception $e){
          ExceptionHandler::handle($e);
        }
      }
}