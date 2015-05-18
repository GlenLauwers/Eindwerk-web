<?php

	class PagesAdmin extends CI_Controller
	{
		
		public function view($page = 'home')
		{

			if (! file_exists(APPPATH.'/views/admin/'.$page.'.php')) 
			{
				show_404();
			}

			$data['titel'] = ucfirst($page). ' Admin - Game Action';

			$this->load->view('templates/admin-hoofding', $data);
			$this->load->view('admin/'.$page, $data);
			$this->load->view('templates/admin-voet', $data);

		}
	}

?>