<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Dashboard</li>
</ol>

<form method="POST" action="./projet5/admin/index.php?action=description&amp;save=ok&amp;<?php

    if($nombre != 0) {
        echo 'etat=update';
    }
    else {
        echo 'etat=insert';
    }
?>">

    <div>
        <label for="contenu_edit" class="label-contenu">Contenu du chapitre </label>
        <textarea name="contenu" id="contenu_edit"><?= $desc['contenu'] ?></textarea>
    </div>

</form>