<main>

<div class="row">
<div class="col s12">
    <div class="card hoverable">
        <div class="card-content">
        <!--<span class="card-title center-align">Modulos de sistema</span>-->
        <!-- -->
        <ul class="collection with-header">
            <li class="collection-header"><h4 class="center-align">Modulos</h4></li>

            <?php foreach ($registros as $reg): ?>
                <li class="collection-item avatar">
                    <a href="#modal1" class="modal-trigger btn-vals"><i class="material-icons circle blue waves-effect waves-light hoverable z-depth-2">edit</i></a>
                        <span class="title"><?= $reg->descripcion; ?></span>
                        <!--<p>Second Line</p>-->
                        <div class="switch"><label>Inactivo<input type="checkbox" <?= $reg->activo? 'checked': ''; ?>><span class="lever"></span>Activo</label></div>  
                        <a href="#!" class="secondary-content"><i class="material-icons red-text">close</i></a>

                        <input type="hidden" name="jsonvalues" value="0" data-value='<?= json_encode($reg); ?>'>
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

<!-- Modal editar registro -->
<div id="modal1" class="modal modal-fixed-footer">
    <div class="modal-content">
        <h5 class="blue white-text center-align">Editar</h5>
        <div class="row">
            <form action="<?= base_url('adming/modulo/edit'); ?>" method="POST" id="form_edit">
                <div class="input-field col s12">
                    <input id="descripcion" name="descripcion" type="text" class="validate" data-length="50" maxlength="50" placeholder="" autocomplete="off" required>
                    <label for="descripcion">*Descripción</label>
                </div>
                <div class="input-field col s12">
                    <input id="icono" name="icono" type="text" class="validate" data-length="25" maxlength="25" placeholder="" autocomplete="off" required>
                    <label for="icono">*Icono</label>
                </div>
                <div class="input-field col s12">
                    <input id="ruta" name="ruta" type="text" class="validate" data-length="250" maxlength="250" placeholder="" autocomplete="off" required>
                    <label for="ruta">*Ruta</label>
                </div>
                <div class="input-field col s12">
                    <select id="parent" name="parent">
                        <?php foreach ($categorias as $cat): ?>
                            <option value="<?= $cat->idmodulo; ?>"><?= $cat->descripcion; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <label>*Categoria</label>
                </div>
                <button class="btn-floating btn waves-effect waves-light blue" type="submit"><i class="material-icons">edit</i></button>
                <!-- campos ocultos -->
                <input type="hidden" name="idmodulo" id="idmodulo" value="0">
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

</main>