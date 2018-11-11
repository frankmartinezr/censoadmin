<main>

<div class="row">
<div class="col s12">
    <div class="card hoverable">
        <div class="card-content">
        <!--<span class="card-title center-align">Modulos de sistema</span>-->
        <!-- -->
        <ul class="collection with-header">
            <li class="collection-header">
                <h4 class="center-align">Mobiliario</h4>
            </li>

            <?php foreach ($registros as $reg): ?>
                <li class="collection-item">
                    <div>
                        <input class="check-status" type="checkbox" id="test<?= $reg->idmobiliario; ?>" data-value='<?= json_encode($reg); ?>' <?= $reg->activo > 0? 'checked': ''; ?>/>
                        <label for="test<?= $reg->idmobiliario; ?>"><?= $reg->descripcion; ?></label>
                        <div class="secondary-content">
                            <a href="#modal1" class="modal-trigger btn-edit"><i class="material-icons blue-text">edit</i></a>&nbsp;&nbsp;
                            <a href="#!" class="btn-delete"><i class="material-icons red-text">delete_forever</i></a>
                            <input type="hidden" name="jsonvalues" value="0" data-value='<?= json_encode($reg); ?>'>
                        </div>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
        <!-- -->
        </div>
        <div class="card-action hide">
            <!-- -->
        </div>
    </div>
</div>
</div>

<!-- Modal agregar registro -->
<div id="modal2" class="modal modal-fixed-footer">
    <div class="modal-content">
        <h5 class="green white-text center-align">Agregar</h5>
        <div class="row">
            <form action="<?= base_url('cat/mobiliario/create'); ?>" method="POST" id="form_create">
                <div class="input-field col s12">
                    <input id="descripcion_add" name="descripcion" type="text" class="validate" data-length="50" maxlength="50" placeholder="" autocomplete="off" required>
                    <label for="descripcion_add">*Descripción</label>
                </div>
                <button class="btn-floating btn-large waves-effect waves-light green" type="submit"><i class="material-icons">save</i></button>
                <!-- campos ocultos -->
                <input type="hidden" name="idmobiliario" value="0">
                <input type="hidden" name="activo" value="0">
                <input type="hidden" name="usumodif" value="<?= $this->session->userdata('user_id'); ?>">

            </form>
        </div>
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-action modal-close waves-effect waves-red btn-flat "><u>CERRAR</u></a>
    </div>
</div>
<!-- /Modal agregar registro -->

<!-- Modal editar registro -->
<div id="modal1" class="modal modal-fixed-footer">
    <div class="modal-content">
        <h5 class="blue white-text center-align">Editar</h5>
        <div class="row">
            <form action="<?= base_url('cat/mobiliario/edit'); ?>" method="POST" id="form_edit">
                <div class="input-field col s12">
                    <input id="descripcion" name="descripcion" type="text" class="validate" data-length="50" maxlength="50" placeholder="" autocomplete="off" required>
                    <label for="descripcion">*Descripción</label>
                </div>
                <button class="btn-floating btn-large waves-effect waves-light blue" type="submit"><i class="material-icons">edit</i></button>
                <!-- campos ocultos -->
                <input type="hidden" name="idmobiliario" id="idmobiliario" value="0">
                <input type="hidden" name="activo" id="activo" value="0">
                <input type="hidden" name="usumodif" id="usumodif" value="<?= $this->session->userdata('user_id'); ?>">

            </form>
        </div>
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-action modal-close waves-effect waves-red btn-flat "><u>CERRAR</u></a>
    </div>
</div>
<!-- /Modal editar registro -->

<!-- fixed-btn -->
<div class="fixed-action-btn">
    <a href="#modal2" class="btn-floating btn-large waves-effect waves-light green pulse modal-trigger"><i class="large material-icons">add</i></a>
</div>
<!-- /fixed-btn -->
</main>
<script type="text/javascript">
$(document).ready(function() {

    $("#form_create").submit(function(event) {
        event.preventDefault();

        var form    = $(this).serialize();
        var action  = $(this).prop('action');
        var method  = $(this).prop('method');

        //console.log(method);
        $.ajax({
            url: action,
            type: method,
            data: form

        }).done(function(response, textStatus, jqXHR) {
            //console.log(response);
            var json = $.parseJSON(response);
            swal({ title: json.header, text: json.msg, icon: json.icon, button: "Aceptar" }).then((value) => { location.reload(); });

        }).fail(function(jqXHR, textStatus, thrown) {
            console.log(jqXHR);
            console.log(textStatus);
            swal({ title: "Error", text: textStatus, icon: "error", button: "Aceptar" });
        });
    });

    $(".btn-edit").click(function(event) {

        var json    = $(this).siblings('input[name=jsonvalues]').data("value");
        json.activo = $(this).parent('div').siblings('input[type=checkbox]').is(':checked');
        //console.log(json);
        $("#idmobiliario").val(json.idmobiliario);
        $("#activo").val(json.activo);
        $("#descripcion").val(json.descripcion);
    });

    $("#form_edit").submit(function(event) {
        event.preventDefault();

        var form    = $(this).serialize();
        var action  = $(this).prop('action');
        var method  = $(this).prop('method');

        //console.log(method);
        $.ajax({
            url: action,
            type: method,
            data: form

        }).done(function(response, textStatus, jqXHR) {
            //console.log(response);
            var json = $.parseJSON(response);
            swal({ title: json.header, text: json.msg, icon: json.icon, button: "Aceptar" }).then((value) => { location.reload(); });

        }).fail(function(jqXHR, textStatus, thrown) {
            console.log(jqXHR);
            console.log(textStatus);
            swal({ title: "Error", text: textStatus, icon: "error", button: "Aceptar" });
        });
    });

    $(".check-status").change(function(event) {

        var json    = $(this).data("value");
        json.activo = $(this).is(':checked');
        
        //console.log(json);
        $.ajax({
            url: "<?= base_url('cat/mobiliario/edit'); ?>",
            type: "POST",
            data: json

        }).done(function(response, textStatus, jqXHR) {
            //console.log(response);
            var json = $.parseJSON(response);
            Materialize.toast(json.msg, 1800);

        }).fail(function(jqXHR, textStatus, thrown) {
            console.log(jqXHR);
            console.log(textStatus);
            swal({ title: "Error", text: textStatus, icon: "error", button: "Aceptar" });
        });
    });

    $(".btn-delete").click(function(event) {

        var json = $(this).siblings('input[name=jsonvalues]').data("value");

        swal({
            title: "Seguro de continuar?",
            text: "Esta opción borrará el registro permanentemente!",
            icon: "warning",
            buttons: ["Cancelar", "Continuar"],
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                //console.log(json);
                $.ajax({
                    url: "<?= base_url('cat/mobiliario/delete'); ?>",
                    type: "POST",
                    data: json

                }).done(function(response, textStatus, jqXHR) {
                    //console.log(response);
                    var json = $.parseJSON(response);
                    swal({ title: json.header, text: json.msg, icon: json.icon, button: "Aceptar" }).then((value) => { location.reload(); });

                }).fail(function(jqXHR, textStatus, thrown) {
                    console.log(jqXHR);
                    console.log(textStatus);
                    swal({ title: "Error", text: textStatus, icon: "error", button: "Aceptar" });
                });
            }
        });
    });
});
</script>