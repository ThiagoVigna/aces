<?php


class Posts_model extends CI_Model{

	/* Retorna um único post */
	public function getOne(int $postId){
		$sql = "SELECT * FROM post WHERE Id= ?;";
		$query = $this->db->query($sql, [$postId]);
		return $query->row();
	}

    /**
     * Salva ou atualiza um post no banco de dados
     * @method bool save(int $personId, string $message, int $id = null, int $communityId = null)
     * @param int $personId
     * @param string $message
     * @param int $postMainId
     * @param int $id
     * @param int|null $communityId
     * @return bool
     */
	public function save( int $personId, string $message, $postMainId = 0, int $id = 0, int $communityId = null) : bool{
		$this->db->set('PersonId', $personId);
		$this->db->set('Message', $message);

		if(!is_null($communityId)) $this->db->set('CommunityId', $communityId);
		if($postMainId > 0) $this->db->set('PostMainId', $postMainId);

		if( $id == 0 ): // inserir
			$execute_query = $this->db->insert('post');
		else: // atualizar
			$this->db->where('Id', $id);
			$execute_query = $this->db->update('post');
		endif;

		if ($this->db->affected_rows() > 0):
			return TRUE;
		else:
			return FALSE;
		endif;
	}

	/* Retorna os últimos registros */
	public function lastPosts(int $postMainId = null){
		$postMainId = is_null($postMainId)? 'NULL': $postMainId;

		$sql = "CALL spPostList({$postMainId}, NULL)";

		$query = $this->db->query($sql, [$postMainId]);
		$result = $query->result();
		$query->free_result();
		return $result;
	}

}
