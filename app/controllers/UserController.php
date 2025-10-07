<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

/**
 * Controller: UserController
 * 
 * Automatically generated via CLI.
 */
class UserController extends Controller {
    public function __construct()
    {
        parent::__construct();
        $this->call->database();
        $this->call->model('UserModel');
        $this->call->library('Session');
    }

    public function index()
    {
        // Check if user is logged in
        if (!$this->session->userdata('user_id')) {
            redirect('/');
        }

       // Get current page (default 1)
        $page = 1;
        if(isset($_GET['page']) && ! empty($_GET['page'])) {
            $page = $this->io->get('page');
        }

        // Get search query (optional)
        $q = '';
        if(isset($_GET['q']) && ! empty($_GET['q'])) {
            $q = trim($this->io->get('q'));
        }

        $records_per_page = 10; // number of users per page

        // Call model's pagination method
        $all = $this->UserModel->page($q, $records_per_page, $page);
        $data['users'] = $all['records'];
        $total_rows = $all['total_rows'];

        // Configure pagination
        $this->pagination->set_options([
            'first_link'     => '⏮ First',
            'last_link'      => 'Last ⏭',
            'next_link'      => 'Next →',
            'prev_link'      => '← Prev',
            'page_delimiter' => '&page='
        ]);
        $this->pagination->set_theme('tailwind'); // themes: bootstrap, tailwind, custom
        $this->pagination->initialize($total_rows, $records_per_page, $page, site_url('/user/view').'?q='.$q);

        // Send data to view
        $data['page'] = $this->pagination->paginate();
        $data['current_role'] = $this->session->userdata('role') ?? 'user';
        $this->call->view('user/view', $data);
    }
    public function create()
    {
        if (!$this->session->userdata('user_id')) {
            redirect('login');
        }

        if($this->io->method() == 'post') {
            $username = $this->io->post('username');
            $email = $this->io->post('email');

            $data = [
                'username' => $username,
                'email' => $email
            ];

            $this->UserModel->insert($data);
            redirect('/user/view');
            
        }else {
            $this->call->view('user/create');
        }
    }
    public function update($id)
    {
        if (!$this->session->userdata('user_id') || $this->session->userdata('role') !== 'admin') {
            redirect('login');
        }

        $user = $this->UserModel->find($id);
        if(!$user){
            echo "User not found.";
            return;
        }

        if ($this->io->method() == 'post') {
            $data = [
                'username' => $this->io->post('username'),
                'email'    => $this->io->post('email')
            ];

            $this->UserModel->update($id, $data);

            redirect('/user/view');
        } else {
            $data['user'] = $user;
            $this->call->view('user/update', $data);
        }
    }
    public function delete($id)
    {
        if (!$this->session->userdata('user_id') || $this->session->userdata('role') !== 'admin') {
            redirect('login');
        }

        if($this->UserModel->delete($id)){
            redirect('/user/view');
        }else{
            echo "Error in deleting user.";
        }
    }

    public function login() {
        if ($this->io->method() == 'post') {
            $username = $this->io->post('username');
            $password = $this->io->post('password');

            $user = $this->UserModel->user_login($username, $password);
            if ($user) {
                $this->session->set_userdata('user_id', $user['id']);
                $this->session->set_userdata('username', $user['username']);
                $this->session->set_userdata('role', $user['role']);
                redirect('/user/view');
            } else {
                $data['error'] = 'Invalid username or password';
                $this->call->view('user_auth/login', $data);
            }
        } else {
            $this->call->view('user_auth/login');
        }
    }

    public function register() {
        if ($this->io->method() == 'post') {
            $username = $this->io->post('username');
            $email = $this->io->post('email');
            $password = $this->io->post('password');
            $role = $this->io->post('role') ?? 'user';

            $data = [
                'username' => $username,
                'email' => $email,
                'password' => $password,
                'role' => $role
            ];

            if ($this->UserModel->user_register($data)) {
                redirect('/');
            } else {
                $data['error'] = 'Registration failed. Please try again.';
                $this->call->view('user_auth/register', $data);
            }
        } else {
            $this->call->view('user_auth/register');
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('/');
    }
}
