<?php
include("../checkinfo/connect.php");
function emp_delete($connect, $id){
        $query = "DELETE FROM employe WHERE id = '$id'";
        $result = mysqli_query($connect, $query);
        if ($result != null) :
            return $result;
        else :
            return false;
        endif;
}
// function redirect($page)
// {
//     header('location:' . $page);
// }
$id = $_GET['id'];
if (emp_delete($connect, $id)):
//    redirect('./m_employe.php?message=deleted');
     echo "<script> alert ('L'employé a été supprimé avec succès')</script>";
endif;    