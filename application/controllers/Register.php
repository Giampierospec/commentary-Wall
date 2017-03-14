<?php
session_start();
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function index()
  {
    $this->load->view('templates/top');
    $this->load->view('registry/register');
    $this->load->view('templates/footer');
  }

}
