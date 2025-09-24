<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class UsersController extends Controller {
    public function __construct()
    {
        parent::__construct();
        $this->call->model('UsersModel');
    }

    public function index()
    {
        $page = 1;
        if(isset($_GET['page']) && ! empty($_GET['page'])) {
            $page = $this->io->get('page');
        }

        $q = '';
        if(isset($_GET['q']) && ! empty($_GET['q'])) {
            $q = trim($this->io->get('q'));
        }

        $records_per_page = 10;

        $all = $this->UsersModel->page($q, $records_per_page, $page);
        $data['user'] = $all['records'];
        $total_rows = $all['total_rows'];

        $this->pagination->set_options([
            'first_link'     => '⏮ First',
            'last_link'      => 'Last ⏭',
            'next_link'      => 'Next →',
            'prev_link'      => '← Prev',
            'page_delimiter' => '&page='
        ]);
        $this->pagination->set_theme('tailwind');

        // ✅ Fixed pagination to keep search working
        $this->pagination->initialize($total_rows, $records_per_page, $page, '?q='.$q);

        $data['page'] = $this->pagination->paginate();
        $data['q'] = $q;

        $this->call->view('users/index', $data);
    }
    
    public function create()
    {
        if($this->io->method()== 'post') {
            $username = $this->io->post('username');
            $email = $this->io->post('email');

            $data = array(
                'username' => $username,
                'email' => $email,
            );

            if ($this->UsersModel->insert($data)) {
                redirect();
            } else {
                echo "Error";
            }
        } else {
            $this->call->view('users/create');
        }        
    }

    public function update($id)
{
    // siguraduhing naka-load ang UsersModel sa constructor
    // $this->call->model('UsersModel');

    $user = $this->UsersModel->find($id);
    if (!$user) {
        echo "User not found";
        return;
    }

    if ($this->io->method() == 'post') {
        $username = trim($this->io->post('username'));
        $email    = trim($this->io->post('email'));

        // Server-side: kung walang pagbabago, huwag mag-update — i-redirect lang
        if ($username === $user['username'] && $email === $user['email']) {
            if (session_status() == PHP_SESSION_NONE) session_start();
            $_SESSION['flash_message'] = 'No changes detected.';
            redirect(); // balik sa index o kung saan mo gustong ilagay
        }

        $data = [
            'username' => $username,
            'email'    => $email
        ];

        if ($this->UsersModel->update($id, $data)) {
            if (session_status() == PHP_SESSION_NONE) session_start();
            $_SESSION['flash_message'] = 'User updated successfully.';
            redirect();
        } else {
            echo "Error updating";
        }
    } else {
        $data['user'] = $user;
        $this->call->view('users/update', $data);
    }
}


    public function delete($id)
    {
        if($this->UsersModel->delete($id)) {
            redirect();
        } else {
            echo "Error deleting";
        }
    }   
}
