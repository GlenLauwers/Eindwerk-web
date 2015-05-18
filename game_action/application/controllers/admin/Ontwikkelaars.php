<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Ontwikkelaars extends CI_Controller
	{
		public function nieuwe_ontwikkelaar()
		{
			if (empty($this->input->post('ontwikkelaar'))) 
			{		
				$this->session->set_flashdata('fout', 'Uw ontwikkelaars-veld is leeg.');
				redirect("admin-ontwikkelaars?toevoegen");
			}

			else
			{
				$ontwikkelaars = $this->input->post('ontwikkelaar');
				$this->db->where('naam_ontwikkelaar', $ontwikkelaars);
				$query = $this->db->get('ontwikkelaars');
				
				if ($query->num_rows()>0) 
				{
					$this->session->set_flashdata('fout', "De ontwikkelaars '" . $ontwikkelaars . "' komt al voor in onze database.");
					redirect("admin-ontwikkelaars?toevoegen");
				}

				else
				{
					$data = array(
									'naam_ontwikkelaar' => $ontwikkelaars,
									'actief' => 0
								);

					$this->db->insert('ontwikkelaars', $data);

					$this->session->set_flashdata('correct', "De ontwikkelaars '".$ontwikkelaars."' is toegevoegd aan de database");
					redirect("admin-ontwikkelaars");
				}
			}
		}
	}

?>