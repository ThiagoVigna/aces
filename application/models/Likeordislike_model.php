<?php

class Likeordislike_model extends CI_Model{

	public function save(int $personId, int $postId){
		$sql= "CALL spLikeOrDislike(?, ?)";
		$query = $this->db->query($sql, [$personId, $postId]);
		return $query->row();
	}

}
