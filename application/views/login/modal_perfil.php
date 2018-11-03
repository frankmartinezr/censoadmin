<!-- Modal Perfil -->
<div id="modal_perfil" class="modal">
  <div class="modal-content">
    <div class="row">
      <div class="col s12">
        <form id="form_perfil" action="<?= base_url('welcome/cambioperfil'); ?>" method="POST">
          <ul class="collection">
            <li class="collection-item avatar">
            <img src="https://placehold.it/250x250" alt="" class="circle materialboxed">
              <div class="row">
                <div class="input-field col s11">
                  <input placeholder="" id="input_user" name="clave " type="text" class="validate" disabled value="<?= $this->session->userdata('user_cv'); ?>">
                  <label for="input_user">Usuario</label>
                </div>
                <div class="input-field col s11">
                  <input placeholder="" id="input_name" name="nombre" type="text" class="validate" required value="<?= $this->session->userdata('username'); ?>">
                  <label for="input_name">Nombre</label>
                </div>
                <div class="input-field col s11">
                  <input placeholder="" id="input_email" name="correo" type="email" class="validate" required value="<?= $this->session->userdata('email'); ?>">
                  <label for="input_email">Correo</label>
                </div>
              </div>
              <button type="submit" class="btn-floating btn-large btn-perfil blue waves-effect waves-light"><i class="material-icons right">save</i></button>
            <a href="#!" class="secondary-content"><i class="material-icons blue-text">person</i></a>
            </li>
          </ul>

          <input type="hidden" name="idusuario" value="<?= $this->session->userdata('user_id'); ?>">
        </form>
      </div>
    </div>
  </div>
<div class="modal-footer hide">
  <a href="#!" class="modal-action modal1close waves-effect waves-green btn-flat">Agree</a>
</div>
<script type="text/javascript">
$(document).ready(function(){
  $("#form_perfil").submit(function(e){
    e.preventDefault();
    var action      = $(this).attr('action');
    var formdata    = $(this).serialize();

    $.ajax({
      url: action,
      type: "POST",
      data: formdata
    }).done(function(response, textStatus, jqXHR) {
      //console.log(response);
      var json = jQuery.parseJSON(response);

      if (json.result) {

        $("#input_name").prop('disabled', 'true');
        $("#input_email").prop('disabled', 'true');
        $(".btn-perfil").addClass('disabled');

        swal({ title: json.title, text: json.txt, icon: json.icon, button: "Aceptar" });
      }

    }).fail(function(jqXHR, textStatus, thrown) {
      console.log(jqXHR);
      console.log(textStatus);
      swal({ title: "Error", text: textStatus, icon: "error", button: "Aceptar" });
    });
  });
});
</script>