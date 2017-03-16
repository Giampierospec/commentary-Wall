<?php
//This will load everything from my commentary
function loadCommentary(){
  $CI =& get_instance();
  $sql = "select * from commentary";
  $rs = $CI->db->query($sql);
  return $rs->result();
}
 ?>
