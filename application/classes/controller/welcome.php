<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Welcome extends Controller_Application {

	public function action_index()
	{
	$session = Session::instance();
        $username = $session->get('username');

        if (!isset($username)){
          $this->request->redirect('login');
       }


        $view = View::factory('welcome')
            ->bind('users', $users)
            ->bind('pager_links', $pager_links);

        $user = new Model_User;
        $user_count = $user->count_all();

        $pagination = Pagination::factory(array(
            'total_items'
            => $user_count,
            'items_per_page' => 3,
        ));
        $pager_links = $pagination->render();


        $users = $user->get_all($pagination->items_per_page,
            $pagination->offset);

        $this->template->view = $view;
	}



} // End Welcome
