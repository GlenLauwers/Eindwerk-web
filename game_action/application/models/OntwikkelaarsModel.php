<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class OntwikkelaarsModel extends CI_Model
	{
		public function viewontwikkelaars()
		{
			$this->db->where('actief', 0);

			$query = $this->db->get('ontwikkelaars');
			return $query->result();
		}
	}
?>