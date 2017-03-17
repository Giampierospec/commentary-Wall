<?php
defined('BASEPATH') OR exit('No direct script access allowed');
session_start();

class Wall extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $data['title'] = '';
    $method = $this->router->fetch_method();
    if(!isset($_SESSION["comment_user"]) && $method != 'login'){
      redirect('wall/login');
    }
  }

  function index()
  {
    $this->load->view('templates/top');
    $this->load->view('admin/start');
    $this->load->view('templates/footer');
  }
  function login(){
    $data['title'] = "Ingrese sus credenciales";
    $this->load->view('templates/top');
    $this->load->view('admin/login');
    $this->load->view('templates/footer');
  }
  function register(){
    $this->load->view('templates/top');
    $this->load->view('admin/register');
    $this->load->view('templates/footer');
  }
  //This function logs out the user
  function logout(){
    unset($_SESSION['comment_user']);
    redirect(wall);
  }
  //This function deletes the comment
  function delete($commentId=0){
    if($commentId == 0){
      redirect('wall');
    }
    $CI =& get_instance();
    $CI->db->where('id',$commentId);
    $CI->db->delete('commentary');
    redirect('wall');
  }
//This function edits the current comment
  function edit(){
    $commentId = $this->uri->segment(3);
    $f = new stdClass();
    $f->comment = urldecode($this->uri->segment(4));
    if($commentId == 0){
      redirect('wall');
    }
    $CI =& get_instance();
    $CI->db->where('id',$commentId);
    $CI->db->update('commentary',$f);
    redirect('wall');

  }

}
