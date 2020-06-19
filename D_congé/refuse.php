<?php
include("../checkinfo/connect.php");
function emp_accepter($connect, $id)
{
    $query = "UPDATE demande_conge SET demande = 'refuse' WHERE id = '$id' ";
    $result = mysqli_query($connect, $query);
    if ($result != null) :
        return $result;
    else :
        return false;
    endif;
}
function redirect($page)
{
    header('location:' . $page);
}
$id = $_GET['id'];
if (emp_accepter($connect, $id)) :
    // redirect('d_congé.php?message=refuse');
echo "<script> alert ('La demande de congé a été refuse')</script>";
endif;  