<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Login extends CI_Controller
	{
		public function validate()
		{
			$gebruikersnaam = $this->input->post('gebruikersnaam');
			$wachtwoord = $this->input->post('wachtwoord');
			$hashed_wachtwoord = md5($wachtwoord);

			if ((empty($gebruikersnaam)) || (empty($wachtwoord)))
			{		
				$this->session->set_flashdata('fout', 'Gebruikersnaam en/of wachtwoord is niet correct. Probeer opnieuw');
				redirect("admin-login");
			}

			else
			{
				$this->db->select('id', 'gebruikersnaam', 'wachtwoord', 'salt');
				$this->db->from('admin_users');
				$this->db->where('gebruikersnaam', $gebruikersnaam);
				$this->db->where('wachtwoord', $hashed_wachtwoord);
				$this->db->limit(1);

				$query = $this->db->get();

				if ($query ->num_rows() == 1) 
				{
					$this->setCookie();

					$this->setSession();				

					$this->session->set_flashdata('succes', 'Welkom, u bent ingelogd.');
					redirect("admin");
				}
			
				else
				{
					$this->session->set_flashdata('fout', 'Gebruikersnaam en/of wachtwoord is niet correct. Probeer opnieuw');
					redirect("admin-login");
				}
			}
		}

		public function setCookie()
		{
			$this->load->helper('cookie');

			$gebruikersnaam = $this->input->post('gebruikersnaam');
			$wachtwoord = $this->input->post('wachtwoord');

			$hashed_gebruiker  = md5($gebruikersnaam);

			$cookie = array(
                   'name'   => 'authenticated',
                   'value'  => $hashed_gebruiker.$gebruikersnaam,
                   'expire' => '3600'
               		);
 
			set_cookie($cookie); 
		}

		public function setSession()
		{
			$gebruikersnaam = $this->input->post('gebruikersnaam');
			$id = $this->db->get_where('admin_users', array('gebruikersnaam' => $gebruikersnaam));

			$this->load->library('session');

			$session= array(
					'name'=>'sessie',
					'value' => $gebruikersnaam,
					''
					);

			$this->session->set_userdata($session);
		}

		public function logout()
		{
			$this->load->helper('cookie');
			delete_cookie("authenticated");
			$this->session->set_flashdata('succes', 'U bent uitgelogd. Tot een volgende keer.');
			redirect("admin-login");
		}
	}

?>

