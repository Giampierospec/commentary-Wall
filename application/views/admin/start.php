<?php
//This is to insert my commentary to the database
$currentUser = $_SESSION['comment_user'];

$CI =& get_instance();
if($_POST){
  $com = new stdClass();
  $com->comment = $_POST['commentary'];
  $com->idUser = $currentUser->id;
  $CI->db->insert('commentary',$com);
}

 ?>
 <div class="text-right">
  <!-- This is to know who is accessing at the moment -->
   <p>Usted ha ingresado como <?php echo  $currentUser->email?> <a href="<?php echo base_url('wall/logout') ?>">| Salir |</a></p>
 </div>
 <h2>Muro de Comentarios</h2>
<div class="jumbotron jb-reduced-in-form">
  <?php
    $comment = loadCommentary();
    $photoPath = base_url('userPhotos').$currentUser->imgContent;
    foreach ($comment as $commentary) {
      echo "<div class='row'>
              <div class='col-sm-12'>
                <div class='well well-specific'>
                <div class='row'>
                  <div class='col-sm-6'>
                    <p>{$commentary->comment}</p>
                  </div>
                  <div class='col-sm-6'>
                    <div class = 'row'>
                      <div class='col-sm-6'>
                        <p>{$currentUser->name} {$currentUser->lastname}<p>
                        </div>
                      <div class='col-sm-4'>
                        <img src='{$photoPath}' class='img-circle img-responsive little_img'/>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
                </div>
            </div>
      ";
    }

   ?>
</div>

<div class="jumbotron jb-reduced">
  <div class="row">
    <div class="col-sm-12">
      <form class="" action="" method="post">
        <div class="row">
          <div class="col-sm-8">
            <textarea name="commentary" rows="1" cols="80" class="form-control" placeholder="Introduzca su comentario" required></textarea>
          </div>
          <div class="col-sm-4">
            <button type="submit" name="commentbtn" class="btn bg-purple">Comentar</button>
          </div>
        </div>

      </form>
</div>
  </div>

</div>
