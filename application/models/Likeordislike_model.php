<?php

class Likeordislike_model extends CI_Model{

	 public function save(int $PersonId, string $_type, int $PostId  ){
	// 	$sql= "CALL spLikeOrDislikeSave(?, ?, ?)";
	// 	$query = $this->db->query($sql, [$_personId, $_type, $_postId]);
	// 	return $query->row();
	// }
	$stmt = $this->db->conn_id->prepare("CALL spLikeOrDislikeSave(?, ?, ?)");
    $stmt->bind_param('iii',$PersonId, $_type, $PostId);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_object();
	}

	public function get_by_person_post($personId, $postId) {
    $this->db->where('PersonId', $personId);
    $this->db->where('PostId', $postId);
    $query = $this->db->get('likeOrDislike');
    return $query->row();
}

}
