<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login | TokoBuku';
            $this->load->view('templates/auth_header',  $data);
            $this->load->view('auth/login');
            $this->load->view('templates/auth_footer');
        } else {
            $this->_login();
        }
    }

    public function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');


        $user = $this->db->get_where('tb_user', ['email' => $email])->row_array();

        //jika usernya ada
        if ($user) {

            if ($user['role_id'] == 2) {
                # 

                //jika user aktif
                if ($user['is_active'] == 1) {
                    //cek password
                    if (password_verify($password, $user['password'])) {
                        $data = [
                            'email'     => $user['email']
                        ];
                        $this->session->set_userdata($data);
                        redirect(base_url());
                    } else {
                        echo '<script type="text/javascript">';
                        echo 'alert("Password Salah!");';
                        echo 'window.location.href ="' . base_url() .  '/auth";';
                        echo '</script>';
                    }
                } else {
                    echo '<script type="text/javascript">';
                    echo 'alert("User tidak aktif");';
                    echo 'window.location.href ="' . base_url() .  '/auth";';
                    echo '</script>';
                }
            } else {
                //cek password
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'email'     => $user['email']
                    ];
                    $this->session->set_userdata($data);
                    redirect(base_url('admin/produk'));
                } else {
                    echo '<script type="text/javascript">';
                    echo 'alert("Password Salah!");';
                    echo 'window.location.href ="' . base_url() .  '/auth";';
                    echo '</script>';
                }
            }
        } else {
            echo '<script type="text/javascript">';
            echo 'alert("User belum terdaftar!");';
            echo 'window.location.href ="' . base_url() .  '/auth";';
            echo '</script>';
        }
    }

    public function registration()
    {
        $password = password_hash($this->input->post('password1', true), PASSWORD_DEFAULT);
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[tb_user.email]');
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'Password dont match!',
            'min_length' => 'Password too short'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|min_length[3]|matches[password1]');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'TokoBuku';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/registration');
            $this->load->view('templates/auth_footer');
        } else {
            $data = [
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'image' => 'default.jpg',
                'password' => $password,
                'role_id' => 2,
                'is_active' => 1,
                'registerDate' => time()
            ];

            $this->db->insert('tb_user', $data);
            echo '<script type="text/javascript">';
            echo 'alert("Register Sukses");';
            echo 'window.location.href ="' . base_url() .  '/auth";';
            echo '</script>';
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('email');

        echo '<script type="text/javascript">';
        echo 'alert("Berhasil Logout!");';
        echo 'window.location.href ="' . base_url() .  'auth";';
        echo '</script>';
    }
}
