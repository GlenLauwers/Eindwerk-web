<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Console extends CI_Controller
	{
		public function nieuwe_console()
		{
			if (empty($this->input->post('console'))) 
			{		
				$this->session->set_flashdata('fout', 'Uw console-veld is leeg.');
				redirect("admin-console?toevoegen");
			}

			else
			{
				$console = $this->input->post('console');
				$this->db->where('naam_console', $console);
				$query = $this->db->get('console');
				
				if ($query->num_rows()>0) 
				{
					$this->session->set_flashdata('fout', "De console '" . $console . "' komt al voor in onze database.");
					redirect("admin-console?toevoegen");
				}

				else
				{
					$data = array(
									'naam_console' => $console,
									'actief' => 0
								);

					$this->db->insert('console', $data);

					$this->session->set_flashdata('correct', "De console '".$console."' is toegevoegd aan de database");
					redirect("admin-console");
				}
			}
		}

		public function wijzigen()
		{
			if (empty($this->input->post('console'))) 
			{		
				$this->session->set_flashdata('fout', 'Uw beschrijving is leeg.');
				redirect("admin-console");
			}

			else
			{
				$console = $this->input->post('console');
				$this->db->where('naam_console', $console);
				$query = $this->db->get('console');
				
				if ($query->num_rows()>0) 
				{
					$this->session->set_flashdata('fout', "De console '" . $console . "' komt al voor in onze database.");
					redirect("admin-console");
				}

				else
				{
					$id = $this->input->post('id');
						$data= array(
									'naam_console' => $console
							);
						
					$this->db->where('id',$id);
					$this->db->update('console',$data);
					$this->session->set_flashdata('correct', "De console '".$console."' werd gewijzigd");
					redirect("admin-console");
				}
			}
		}

		public function verwijderen()
		{
			if (!empty($this->input->post('verwijderen_ja'))) 
			{
				$console = $this->input->post('naam_console');
				$id = $this->input->post('id');
						$data= array(
									'actief' => 1
							);
						
				$this->db->where('id',$id);
				$this->db->update('console',$data);
				$this->session->set_flashdata('correct', "De console werd verwijderd");
				redirect("admin-console");
			}

			if (!empty($this->input->post('verwijderen_neen'))) 
			{	
				$console = $this->input->post('naam_console');
				$this->session->set_flashdata('fout', "De console werd niet verwijderd.");
				redirect("admin-console");
			}
		}
	}

?>