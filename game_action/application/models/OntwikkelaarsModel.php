<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class OntwikkelaarsModel extends CI_Model
	{
		public function viewontwikkelaars()
		{
			$this->db->where('actief', 0);

			$query = $this->db->get('ontwikkelaars');
			return $query->result();
		}

		public function wijzigenontwikkelaars()
		{
			$wijzigen = $this->input->post('wijzigen');
			$this->db->where('id', $wijzigen);

			$query = $this->db->get('ontwikkelaars');
			return $query->result();
		}

		public function verwijderontwikkelaars()
		{
			$verwijderen = $this->input->post('verwijderen');
			$this->db->where('id', $verwijderen);

			$query = $this->db->get('ontwikkelaars');
			return $query->result();
		}
	}
?> 