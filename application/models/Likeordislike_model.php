<?php

class Likeordislike_model extends CI_Model{

	public function save(int $personId, int $type, int $postId){
		$sql= "CALL spLikeOrDislikeSave(?, ?, ?)";
		$query = $this->db->query($sql, [$personId, $type, $postId]);
		return $query->row();
	}

	public function delete(int $personId, int $type, int $postId){
		$sql= <<<SQL
DELETE FROM likeOrDislike
WHERE
		PersonId = ?
	AND LikeOrDislike = ?
	AND PostId = ?
SQL;

		$query = $this->db->query($sql, [$personId, $type, $postId]);
		return $query->affected_rows();
	}

}
