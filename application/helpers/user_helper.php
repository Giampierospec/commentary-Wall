<?php
//This will load everything from my commentary
function loadCommentary(){
  $CI =& get_instance();
  $sql = "select * from commentary";
  $rs = $CI->db->query($sql);
  return $rs->result();
}
function getUserCommentary($userId){
  $CI =& get_instance();
  $sql = "select * from user where id = ?";
  $rs = $CI->db->query($sql,$userId);
  $rs = $rs->result();
  $user = $rs[0];
  return $user;
}
 ?>
