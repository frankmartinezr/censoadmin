<li>
  <a class="collapsible-header"><?= $header; ?><i class="material-icons">arrow_drop_down</i></a>

  <div class="collapsible-body">
    <ul>
      <?php foreach ($body as $item): ?>
        <li><a class="waves-effect waves-light" href="<?= base_url($item->ruta); ?>"><?= $item->modulo ?></a></li>
      <?php endforeach; ?>
    </ul>
  </div>
</li>