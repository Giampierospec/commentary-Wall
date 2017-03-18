<?php
//This will load everything from my commentary
function loadCommentary(){
  $CI =& get_instance();
  $sql = "select * from commentary";
  $rs = $CI->db->query($sql);
  return $rs->result();
}
//This function gets me all the users based on an id
function getUserCommentary($userId){
  $CI =& get_instance();
  $sql = "select * from user where id = ?";
  $rs = $CI->db->query($sql,$userId);
  $rs = $rs->result();
  $user = $rs[0];
  return $user;
}
//This will give me the respondcommentary table according to users
function getRespondonUser($userId){
  $CI =& get_instance();
  $sql = "select * from respondcommentary where idUserRespond = ?";
  $rs = $CI->db->query($sql,array($userId));
  return $rs->result();
}
 ?>
