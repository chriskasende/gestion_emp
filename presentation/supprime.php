



    <?php


    include_once(__DIR__ . '/../DAO/EmployeDAO.php');
    $employeDAO = new EmployeDAO();
    $tab = $employeDAO->supprime_emp($_GET['id']);





    header('Location: gestion.php');


    ?>

