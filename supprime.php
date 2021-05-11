



    <?php


    supprime_emp($_GET['id']);
    header('Location: gestion.php');

    ?>





<?php
function supprime_emp($id)
{

    $bdd = mysqli_init();
    mysqli_real_connect($bdd, "127.0.0.1", "root", "", "newtest");
    $insert = mysqli_query($bdd, "DELETE FROM employes WHERE noemp='$id';");
    mysqli_close($bdd);
}
?>