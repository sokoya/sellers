<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orders extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $id = $this->session->userdata('logged_id');
        $status = cleanit($this->input->get('type'));
        $page_data['page_title'] = 'Manage all orders - ' . lang('app_name');
        $page_data['pg_name'] = 'orders';
        $page_data['sub_name'] = 'order_' . $status;
        $page_data['profile'] = $this->seller->get_profile_details($id,
            'first_name,last_name,email,profile_pic');
        $page_data['orders'] = $this->seller->get_orders($id, $status
        );
        $this->load->view('orders', $page_data);
    }
}
