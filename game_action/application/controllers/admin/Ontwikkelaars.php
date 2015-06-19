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

		public function wijzigen()
		{
			if (empty($this->input->post('ontwikkelaar'))) 
			{		
				$this->session->set_flashdata('fout', 'Uw beschrijving is leeg.');
				redirect("admin-ontwikkelaars");
			}

			else
			{
				$ontwikkelaar = $this->input->post('ontwikkelaar');
				$this->db->where('naam_ontwikkelaar', $ontwikkelaar);
				$query = $this->db->get('ontwikkelaars');
				
				if ($query->num_rows()>0) 
				{
					$this->session->set_flashdata('fout', "De ontwikkelaar '" . $ontwikkelaar . "' komt al voor in onze database.");
					redirect("admin-ontwikkelaars");
				}

				else
				{
					$id = $this->input->post('id');
						$data= array(
									'naam_ontwikkelaar' => $ontwikkelaar
							);
						
					$this->db->where('id',$id);
					$this->db->update('ontwikkelaars',$data);
					$this->session->set_flashdata('correct', "De ontwikkelaar '".$ontwikkelaar."' werd gewijzigd");
					redirect("admin-ontwikkelaars");
				}
			}
		}

		public function verwijderen()
		{
			if (!empty($this->input->post('verwijderen_ja'))) 
			{
				$ontwikkelaar = $this->input->post('naam_ontwikkelaar');
				$id = $this->input->post('id');
						$data= array(
									'actief' => 1
							);
						
				$this->db->where('id',$id);
				$this->db->update('ontwikkelaars',$data);
				$this->session->set_flashdata('correct', "De ontwikkelaar werd verwijderd");
				redirect("admin-ontwikkelaars");
			}

			if (!empty($this->input->post('verwijderen_neen'))) 
			{	
				$ontwikkelaar = $this->input->post('naam_console');
				$this->session->set_flashdata('fout', "De ontwikkelaar'".$ontwikkelaar. "'werd niet verwijderd.");
				redirect("admin-ontwikkelaars");
			}
		}
	}	

?>