<?php

	class Login extends CI_Controller {

		public function index() {
			$this->load->view('includes/header');
			$this->load->view('FLogin/view_login');
			$this->load->view('includes/footer');
		}

		public function register_user() {

			$this->load->library('form_validation');

			$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[3]|max_length[25]|xss_clean');
			$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[25]|matches[password_conf]|xss_clean');

			if ($this->form_validation->run() == FALSE) {

				//user tidak valid, kembali ke form login dan tampil errors
				$this->load->view('includes/header');
				$this->load->view('FLogin/view_login');
				$this->load->view('includes/footer');
			}
			else {

				//registrasi sukses
				$this->load->view('includes/header');
				$this->load->view('FLogin/view_login_success');
				$this->load->view('includes/footer');
			}
		}
	}