<?php
defined('BASEPATH') OR exit('No direct script access allowed');
session_start();
class Wall extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
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

}
