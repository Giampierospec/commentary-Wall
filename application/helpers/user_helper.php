<?php
//This will load everything from my commentary
function loadUserCommentary($user){
  $CI =& get_instance();
  $idUser = $user;
  $sql = "select * from commentary where id = ?";
  $rs = $CI->db->query($sql,array($idUser));
  return $rs->result();
}
 ?>
