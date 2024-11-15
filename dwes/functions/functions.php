<?php
function asingSessionRols ($user) {
         // if rolss is not empty
         if(!empty($user['rols'])) {
            $rols =  explode(',', $user['rols']);
            // for($i = 0; $i < count($rols); $i++) {
               $_SESSION['rols'][] = $rols;
            // }
         }else {
            echo "This user don't have any role";
         };
         };

         function datediff ($date_in,$date_out) {
            $dateIn = new DateTime($date_in);
            $dateOut = new DateTime($date_out); 
            $diff = $dateIn->diff($dateOut);
             return $diff->d;
         };

?>