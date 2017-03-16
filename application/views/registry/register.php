<?php
$data['title'] = "Registro del usuario";
$CI =& get_instance();
$message = '';
if($_POST){
    $sql = 'select * from user where email = ?';
    $f = new stdClass();
    $f->email = $_POST['email'];
    $f->name = $_POST['name'];
    $f->lastName = $_POST['lastname'];
    $f->pass = $_POST['pass'];
    $rs = $CI->db->query($sql, array($f->email));
    $rs = $rs->result();
    $f->imgPath = 'C:/xampp/htdocs/commentaryWall/userPhotos';
    $photo = $_FILES['photo'];
    $f->imgContent = $photo['name'];
    if(count($rs)>0){
      $message = "El usuario ya existe";
    }

else{
  if($photo['error'] == 0 && ($photo['type'] == 'image/jpeg' || $photo['type'] == 'image/png')){
    $CI->db->insert('user',$f);
    move_uploaded_file($photo['tmp_name'],"$f->imgPath".$f->imgContent);
  }
  else{
    $message = "datos incorrectos vuelva a intentarlo";
  }
}

}
 ?>
<div class="jumbotron jb-reduced">
  <div class="row">
    <div class="col-sm-12">
        <legend><h2>Registrese en el sitio</h2></legend>
        <form  enctype="multipart/form-data"class="form-horizontal" action="" method="post" name="login_form">
          <div class="form-group input-group">
            <label for="name" class="input-group-addon bg-purple"> <i class="fa fa-user" aria-hidden="true"></i> Nombre</label>
            <input type="text" name="name" class="form-control" id="name" required/>
          </div>
          <div class="form-group input-group">
            <label for="lastname" class="input-group-addon bg-purple"> <i class="fa fa-user" aria-hidden="true"></i> Apellido</label>
            <input type="text" name="lastname" class="form-control" id="lastname" required/>
          </div>

          <div class="form-group input-group">
            <label for="email" class="input-group-addon bg-purple"> <i class="fa fa-envelope" aria-hidden="true"></i> Email</label>
            <input type="email" name="email" class="form-control" id="email" required/>
          </div>
            <div class="form-group input-group">
              <label for="pass" class="input-group-addon bg-purple"><i class="fa fa-unlock-alt" aria-hidden="true"></i> Contraseña</label>
              <input type="password" name="pass" class="form-control" id="pass"required/>
            </div>
            <div class="form-group input-group">
              <label for="photo" class="input-group-addon bg-purple"><i class="fa fa-picture-o" aria-hidden="true"></i> Haga click aqui para Subir Foto</label>
              <input type="file" name="photo" class="form-control" id="photo"required accept="image/*" placeholder="busque su imagen"/>
            </div>

            <div class="text-center">
              <button type="submit" class="btn bg-purple" id="reg_btn">Registrarse</button>
            </div>
            <div class="row">
              <div class="col-sm-12">
                <a href="<?php echo base_url('admin') ?>"><p>¿Tiene cuenta? Ingrese aquí</p></a>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                <div id="message" class="alert alert-danger" style="display:none;">
                    <?php echo $message ?>
                    <!-- This script will allow me to show the message -->
                    <script type="text/javascript">
                    $(document).ready(initMessage);
                    function initMessage(){
                      //This will retrieve my variable from php verifying that is not empty
                      var message = '<?php echo (isset($message)?$message:'') ?>';
                      if(message != ''){
                        $("#message").show(0,messageAppend).addClass('alert-dismissable fade in');
                      }
                      else{
                        $("#message").hide();
                      }

                    }
                      //function to append the desired message
                      function messageAppend(){
                        $(message).appendTo('#message').fadeIn(5000,closeMessage).addClass("animated bounce");
                      }
                      function closeMessage(){
                        var close = '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
                        $(close).appendTo('#message').fadeIn(5000);
                      }
                    </script>
              </div>
            </div>
        </form>
  </div>
</div>
</div>
</div>
