<!-- This view is for login purposes  -->
<div class="jumbotron jb-reduced">
  <div class="row">
    <div class="col-sm-12">
        <legend><h2>Ingrese al sitio</h2></legend>
        <form class="form-horizontal" action="" method="post" name="login_form">
          <div class="form-group input-group">
            <label for="email" class="input-group-addon bg-purple"> <i class="fa fa-envelope" aria-hidden="true"></i> Email</label>
            <input type="email" name="email" class="form-control" id="email" required/>
          </div>
            <div class="form-group input-group">
              <label for="pass" class="input-group-addon bg-purple"><i class="fa fa-unlock-alt" aria-hidden="true"></i> Contraseña</label>
              <input type="password" name="pass" class="form-control" id="pass"required/>
            </div>
            <div class="text-center">
              <button type="button" class="btn bg-purple" id="ingress_btn">Ingresar</button>
            </div>
            <div class="row">
              <div class="col-sm-12">
                <a href="<?php echo base_url('register') ?>"><p>¿No tiene cuenta? Registrese aquí</p></a>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                <div id="message" class="alert alert-danger" style="display:none;">

                </div>
              </div>
            </div>
        </form>
  </div>
  </div>
  <script src="<?php echo base_url('') ?>js/login_effects.js" charset="utf-8"></script>
</div>
