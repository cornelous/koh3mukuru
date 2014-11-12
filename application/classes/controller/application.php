<?php defined('SYSPATH') or die('No direct script access.');

abstract class Controller_Application extends Controller_Template {
    public $assert_auth = FALSE;
    public $assert_auth_actions = FALSE;


    public function before()
    {
        parent::before();
        $this->_user_auth();

        //Global variables
        View::set_global('site_name', 'Mukuru Assignment');

        $this->template->view = '';
        $this->template->styles = array('reset', 'mukuru');
        $this->template->scripts = array();
    }

    protected function _user_auth()
    {
        $session = Session::instance();
        $username = $session->get('username');
        

//        if (!isset($username)){
  //          $this->request->redirect('login');
    //    }
    }
}
