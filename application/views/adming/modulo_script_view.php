<script type="text/javascript">
$(document).ready(function(){

    $(".btn-vals").click(function(event) {

        var json = $(this).siblings('input[name=jsonvalues]').data("value");

        $("#idmodulo").val(json.idmodulo);
        $("#activo").val(json.activo);
        $("#descripcion").val(json.descripcion);
        $("#icono").val(json.icono);
        $("#ruta").val(json.ruta);
        $("#parent").val(json.parent).material_select();
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
            console.log(json);
            swal({ title: json.title, text: json.msg, icon: json.icon, button: "Aceptar" });

        }).fail(function(jqXHR, textStatus, thrown) {
            console.log(jqXHR);
            console.log(textStatus);
            //swal({ title: "Error", text: textStatus, icon: "error", button: "Aceptar" });
        });
    });
});
</script>