<?php
//This is to insert my commentary to the database
$currentUser = $_SESSION['comment_user'];
$commentUser = '';
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

    foreach ($comment as $commentary) {
      $user = getUserCommentary($commentary->idUser);
      $response = getRespondonUser($user->id);
      $photoPath = base_url('').'userPhotos/'.$user->imgContent;
      echo "<div class='row'>
              <div class='col-sm-12'>
                <div class='well well-specific'>
                <div class='row'>
                  <div class='col-sm-6'>
                  <div class = 'row'>
                    <div class='col-sm-4'>
                      <img src='{$photoPath}' class='img-circle img-responsive little_img'/>
                      </div>
                    <div class='col-sm-6'>
                      <p class='normal-font'>{$user->name} {$user->lastname}<p>
                    </div>
                  </div>
                  </div>
                  <div class='col-sm-6'>
                    <div class='row'>
                        <div class='col-sm-6'>
                          <p class='normal-font' id='comment{$commentary->id}'>{$commentary->comment}</p>
                        ";
                        ?>

                          <a href="#" class="btn bg-purple" onclick='showModal(<?php echo $commentary->id ?>, <?php echo $user->id ?>,<?php echo $currentUser->id?>)'><i class='fa fa-reply'></i></a>
                          </div>
                        <?php



                    if($user->email == $currentUser->email){
                      ?>
                      <!-- In this part i show the delete and edit properties of the comments -->
                      <div class="col-sm-6">
                        <a href="#" class=' btn bg-purple' onclick="confirmationDelete('<?php echo $commentary->id ?>');"><i class='fa fa-trash'></i></a>
                        <a href="#" class='btn bg-purple' onclick="confirmationEdit('<?php echo $commentary->id ?>','<?php echo $commentary->comment ?>');"><i class="fa fa-pencil-square-o"></i></a>
                      </div>
                    </div>

                      <?php
                    }
                    echo"<div id='responseModal{$user->id}' class='modal fade' role='dialog'>
                          <div class='modal-dialog'>
                            <div class='modal-content'>
                              <div class='modal-header'>
                                <button type='button'class='close' data-dismiss='modal'>&times;</button>
                                <h4 class='modal-title'>Responda a este comentario</h4>
                              </div>
                              <div class='modal-body'>
                                  <div class = 'row'>
                                    <div class='col-sm-6'>
                                      <textarea name='response-text' rows='1' id='response-text{$user->id}' cols='80' class='form-control' placeholder='responda'></textarea>
                                    </div>
                                  </div>
                              </div>
                              <div class='modal-footer'>
                              <button type='button' class='btn btn-default' id='btn-respond{$user->id}'>Responder</button>
                            </div>
                            </div>

                          </div>
                        </div>";

                echo "</div>
                </div>
                </div>
              </div>
                </div>
            </div>";

            foreach ($response as $rs) {
              $userRespond = getUserCommentary($rs->currentUser);
              $photoPath = base_url('').'userPhotos/'.$userRespond->imgContent;
              if($commentary->id== $rs->idCommentary){
                echo"
                <div class='panel panel-default marginated-to-right'>
                  <div class='panel body'>
                  <div class='row'>
                        <div class='col-sm-6'>
                            <div class='row'>
                              <div class='col-sm-4'>
                              <img src='{$photoPath}' class='img-circle img-responsive little_img'/>
                              </div>
                              <div class='col-sm-6'>
                                <p>{$userRespond->name} {$userRespond->lastname} </p>
                              </div>
                            </div>
                          </div>
                        <div class='col-sm-6'>
                          <p> $rs->comment</p>
                        </div>
                  </div>
                  </div>
                </div>
                ";
              }
            }
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
            <button type="submit" name="commentbtn" class="btn bg-purple"> <i class="fa fa-comment"></i> Comentar</button>
          </div>
        </div>

      </form>
</div>
  </div>

</div>
<script type="text/javascript">
  //This function will delete the commentary
  function confirmationDelete(userId){
    //Checking to make sure you delete your commentary
    if(confirm("¿Estás seguro que quieres eliminar el comentario?")){
      window.open("<?php echo base_url('wall/delete/') ?>"+userId,"_self");
    }

  }
  function confirmationEdit(userId,comment){
    //Here i verify that user confirms editing
    var pId = document.getElementById('comment'+userId);
    if(confirm("¿Estás seguro que quieres editar la fila?")){
      pId.contentEditable = "true";
      pId.focus();
      $(pId).keydown(function(event) {
        console.log(event.keyCode);
        //Verify user hits enter
        if(event.which == 13){
          event.preventDefault();
          //Redirect to edit
          window.open("<?php echo base_url('wall/edit/') ?>"+userId+"/"+pId.textContent,"_self");
        }
      });

    }

  }
  function showModal(commentId, userId, currentUser){
    $("#responseModal"+userId).modal('show');
    var comment = document.getElementById("response-text"+userId);
    $("#btn-respond"+userId).click(function() {
        window.open("<?php echo base_url('wall/insertResponse/') ?>"+commentId+"/"+userId+"/"+currentUser+"/"+comment.value,"_self");
    });

  }
  function insertResponse(){



  }
</script>
