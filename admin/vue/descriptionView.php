<?php
ob_start();
?>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Description</li>
</ol>


<form method="POST" action="index.php?action=description&amp;save=ok&amp;<?php

    if($nombre['nbrDesc'] == 0) {
        echo 'etat=insert';
    }
    else {
        echo 'etat=update';
    }
?>">

    <div>
        <label for="contenu_edit" class="label-contenu">Ajouter / Modifier la description</label>
        <textarea name="description" id="contenu_edit"><?= $desc['contenu']; ?></textarea>
    </div>
    <input type="submit" value="enregistrer"/>
</form>

<?php

$content = ob_get_clean();

require 'template.php';
?>