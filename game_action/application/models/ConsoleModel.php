<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class ConsoleModel extends CI_Model
	{
		public function viewConsoles()
		{
			$this->db->where('actief', 0);

			$query = $this->db->get('console');
			return $query->result();
		}

		public function wijzigenConsoles()
		{
			$wijzigen = $this->input->post('wijzigen');
			$this->db->where('id', $wijzigen);

			$query = $this->db->get('console');
			return $query->result();
		}

		public function verwijderConsoles()
		{
			$verwijderen = $this->input->post('verwijderen');
			$this->db->where('id', $verwijderen);

			$query = $this->db->get('console');
			return $query->result();
		}
	}
?>