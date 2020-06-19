<!-- <?php
function emp_get($connect)
{
    $query = "SELECT * FROM employe";
    $result = mysqli_query($connect, $query);
    if ($result != null) :
        return $result;
    else :
        return false;
    endif;
}