<main class="valign-wrapper">
<div class="container">
    <div class="row">
        <div class="col s12">
            <div class="card hoverable z-depth-2">
                <form id="form_login" action="<?= base_url('welcome/login'); ?>" method="POST">
                    <div class="card-content">
                        <span class="card-title center-align">Iniciar sesión</span>
                        <!-- -->
                        <div class="row">
                            <div class="input-field col s12 m6 l6">
                                <i class="material-icons prefix">account_circle</i>
                                <input id="input_user" type="text" name="input_user" class="validate" required>
                                <label for="input_user">Usuario</label>
                            </div>
                            <div class="input-field col s12 m6 l6">
                                <i class="material-icons prefix">lock</i>
                                <input id="input_psw" type="password" name="input_psw" class="validate" required>
                                <label for="input_psw">Contraseña</label>
                            </div>
                        </div>      
                    </div>
                    <div class="card-action">
                        <!-- -->
                        <button type="submit" class="waves-effect waves-light btn btn-login blue"><i class="material-icons right">check</i>ENTRAR</button>
                    </div>
                </form>
            <div class="progress progress-login blue hide"><div class="indeterminate red"></div></div>
            </div>
        </div>
    </div>
</div>
</main>
<script type="text/javascript">
$(document).ready(function(){
    $("#form_login").submit(function(e){
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

            if (json.logged_in) {
                disableComponents();
                setTimeout(function(){window.location.replace(json.main);}, 1500);
            }
            else {

                swal({ title: json.title, text: json.txt, icon: json.icon, button: "Aceptar" });    
            }
            

        }).fail(function(jqXHR, textStatus, thrown) {
            console.log(jqXHR);
            console.log(textStatus);
            swal({ title: "Error", text: textStatus, icon: "error", button: "Aceptar" });
        });
    });

    function disableComponents() {
        $("#input_user").prop('disabled', 'true');
        $("#input_psw").prop('disabled', 'true');
        $(".btn-login").addClass('disabled');
        $(".progress-login").removeClass('hide');
    }
});
</script>