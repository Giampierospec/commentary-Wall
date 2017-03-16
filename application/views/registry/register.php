<div class="jumbotron jb-reduced">
  <div class="row">
    <div class="col-sm-12">
        <legend><h2>Registrese en el sitio</h2></legend>
        <form class="form-horizontal" action="" method="post" name="login_form">
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
              <input type="file" name="photo" class="form-control" id="photo"required accept="image/jpeg" placeholder="busque su imagen"/>
            </div>

            <div class="text-center">
              <button type="button" class="btn bg-purple" id="reg_btn">Registrarse</button>
            </div>
            <div class="row">
              <div class="col-sm-12">
                <a href="<?php echo base_url('admin') ?>"><p>¿Tiene cuenta? Ingrese aquí</p></a>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                <div id="message" class="alert alert-danger" style="display:none;">

              </div>
            </div>
        </form>
  </div>
</div>
</div>
</div>
