<?php
ob_start();
?>
<div class="row">
    <?php

   if(!empty($lesMessages)) {
       foreach ($lesMessages as $message) {

           ?>
           <div class="col-xl-6 col-md-6">
               <div class="card text-black mb-4">
                   <div class="card-body">
                       <div><?= $message['nom'] ?></div>
                       <div><?= $message['email'] ?></div>
                       <div><?= $message['sujet'] ?></div>
                       <div><?= $message['contenu'] ?></div>
                   </div>
                   <a href="index.php?action=messages&amp;supprimer=true&amp;id_message=<?= $message['id']; ?>">&#x1f5d1;</a>
               </div>
           </div>

           <?php
       }

   }
   else {
       echo '<h3 style="text-align: center">Aucun message à afficher</h3>';
   }


    ?>
</div>

<?php

$content = ob_get_clean();
require 'template.php';
?>