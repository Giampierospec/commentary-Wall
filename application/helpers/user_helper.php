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
function getResponseCommentary($idCommentary,$currentUserId){
$CI =& get_instance();
$sql = 'select * from respondcommentary where idUserRespond = ? and idCommentary = ?';
$rs = $CI->db->query($sql,array($idCommentary,$currentUserId));
$rs = $rs->result();
$response = $rs[0];
return $response;
}
 ?>
