<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class GenreModel extends CI_Model
	{
		public function viewgenres()
		{
			$this->db->where('actief', 0);

			$query = $this->db->get('genre');
			return $query->result();
		}

		public function wijzigenGenre()
		{
			$wijzigen = $this->input->post('wijzigen');
			$this->db->where('id', $wijzigen);

			$query = $this->db->get('genre');
			return $query->result();
		}

		public function verwijderGenre()
		{
			$verwijderen = $this->input->post('verwijderen');
			$this->db->where('id', $verwijderen);

			$query = $this->db->get('genre');
			return $query->result();
		}
	}

?>