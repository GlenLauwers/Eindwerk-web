<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Genre extends CI_Controller
	{
		public function nieuw_genre()
		{
			if (empty($this->input->post('genre'))) 
			{		
				$this->session->set_flashdata('fout', 'Uw genre-veld is leeg.');
				redirect("admin-genres?toevoegen");
			}

			else
			{
				$genre = $this->input->post('genre');
				$this->db->where('genre', $genre);
				$query = $this->db->get('genre');
				
				if ($query->num_rows()>0) 
				{
					$this->session->set_flashdata('fout', "De genre '" . $genre . "' komt al voor in onze database.");
					redirect("admin-genres?toevoegen");
				}

				else
				{
					$data = array(
									'genre' => $genre,
									'actief' => 0
								);

					$this->db->insert('genre', $data);

					$this->session->set_flashdata('correct', "De genre '".$genre."' is toegevoegd aan de database");
					redirect("admin-genres");
				}
			}
		}

		public function wijzigen()
		{
			if (empty($this->input->post('genre'))) 
			{		
				$this->session->set_flashdata('fout', 'Uw genre-veld is leeg.');
				redirect("admin-genres?toevoegen");
			}

			else
			{
				$genre = $this->input->post('genre');
				$this->db->where('genre', $genre);
				$query = $this->db->get('genre');
				
				if ($query->num_rows()>0) 
				{
					$this->session->set_flashdata('fout', "De genre '" . $genre . "' komt al voor in onze database.");
					redirect("admin-genres");
				}

				else
				{
					$id = $this->input->post('id');
						$data= array(
									'genre' => $genre
							);
						
					$this->db->where('id',$id);
					$this->db->update('genre',$data);
					$this->session->set_flashdata('correct', "De genre '".$genre."' werd gewijzigd");
					redirect("admin-genres");
				}
			}
		}

		public function verwijderen()
		{
			if (!empty($this->input->post('verwijderen_ja'))) 
			{
				$genre = $this->input->post('genre');
				$id = $this->input->post('id');
						$data= array(
									'actief' => 1
							);
						
				$this->db->where('id',$id);
				$this->db->update('genre',$data);
				$this->session->set_flashdata('correct', "De genre '".$genre."' werd verwijderd.");
				redirect("admin-genres");
			}

			if (!empty($this->input->post('verwijderen_neen'))) 
			{	
				$genre = $this->input->post('genre');
				$this->session->set_flashdata('fout', "De genre '".$genre."' werd niet verwijderd.");
				redirect("admin-genres");
			}
		}
	}
?>