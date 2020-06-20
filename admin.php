<?php
include("include/header.php");
include("include/navadmin.php");
include("checkinfo/checkadmin.php");


function emp_insert($connect, $values = array())
{
    $params = "'" . implode("','", $values) . "'";
    $query = "INSERT INTO employe (nom,prenom,CIN,Tel,email,date_embauche,id_service,matricule,date_de_naissance)
              VALUES (" . $params . ")";
    // die($query);
    if (mysqli_query($connect, $query)) :
        return true;
    else :
        return false;
    endif;
}
function redirect($page){
     header('location:' .$page);
}
$errors = [];
$message = "";
//check formule employe
if (isset($_POST['submit'])) :

    // check the information
    $Nom = htmlentities($_POST['nom']);
    $Prénom = htmlentities($_POST['prenom']);
    $Cin = htmlentities($_POST['CIN']);
    $Télé = htmlentities($_POST['Tel']);
    $Email = htmlentities($_POST['email']);
    $Date_Embauche = htmlentities($_POST['date_embauche']);
    $Sérvice = htmlentities($_POST['Service']);
    $matricule = htmlentities($_POST['matricule']);
    $date_naissance = htmlentities($_POST['date_de_naissance']);
    if (empty($Nom)) :
        $errors = '*veuillez entrer le nom';
    elseif (empty($Prénom)) :
        $errors = '*veuillez entrer le Prénom';
    elseif (empty($Cin)) :
        $errors = '*veuillez entrer le CIN';
    elseif (empty($Télé)) :
        $errors = '*veuillez entrer numéro téléphone ';
    elseif (empty($Email)) :
        $errors = '*veuillez entrer votre email';
    elseif (empty($Date_Embauche)) :
        $errors = '*veuillez entrer Date Embauche';
    elseif (empty($Sérvice)) :
        $errors = '*veuillez entrer sérvice';
    elseif (empty($matricule)) :
        $errors = '*veuillez entrer matricule';
    elseif (empty($date_naissance)) :
        $errors = '*veuillez entrer date naissance';
    else :
        $values = array(
            'Nom' => $Nom,
            'prenom' => $Prénom,
            'CIN' => $Cin,
            'Tel' => $Télé,
            'email' => $Email,
            'sate_embauche' => $Date_Embauche,
            'id_service' => $Sérvice,
            'matricule' => $matricule,
            'date_de_naissance' => $date_naissance,
        );
        //submit information
        if (emp_insert($connect, $values) === true) :
            redirect('m_employe.php?message=success');
        else :
            $message = '*Veuillez réessayer';
        endif;
    endif;
endif;




?>

<!-- --main-- -->
<section>

    <article class="content">
        <!-- --formule-- -->
        <p class="errors" >
            <?php
            if (!empty($errors)) :
                echo $errors;
            else:
                echo $message;
            endif;
            ?>
            <hr style="width: 23rem;">
        </p>
        <form class=" formule" action="" method="POST">
            <div class="parent section affiche">

                <div class="parent__children">
                    <!-- <label class="parent__label" for="nom">Nom*</label><br> -->
                    <input class="parent__input" type="text" name="nom" placeholder="Entrer le Nom" value="<?php echo isset($_POST['nom']) ? $_POST['nom'] : ''; ?>" ><br><br>
                </div>

                <div class="parent__children">
                    <!-- <label class="parent__label" for="prenom">prénom*</label><br> -->
                    <input class="parent__input" type="text" name="prenom" placeholder="Entrer le prenom " value="<?php echo isset($_POST['prenom']) ? $_POST['prenom'] : ''; ?>" ><br><br>
                </div>

                <div class="parent__children">
                    <!-- <label class="parent__label" for="CIN">CIN*</label><br> -->
                    <input class="parent__input" type="text" name="CIN" placeholder="N° CIN" value="<?php echo isset($_POST['CIN']) ? $_POST['CIN'] : ''; ?>" ><br><br>
                </div>


                <div class="parent__children">
                    <!-- <label class="parent__label" for="Tel"> Numéro de téléphone*</label><br> -->
                    <input class="parent__input" type="number" name="Tel" placeholder="Entrer Numéro de téléphone " value="<?php echo isset($_POST['Tel']) ? $_POST['Tel'] : ''; ?>" ><br><br>
                </div>

                <div class="parent__children">
                    <!-- <label class="parent__label" for="Tel"> Numéro de téléphone*</label><br> -->
                    <input class="parent__input" type="text" name="email" placeholder="Entrer votre email " value="<?php echo isset($_POST['email']) ? $_POST['email'] : ''; ?>" ><br><br>
                </div>

                <div class="parent__children">
                    <label class="parent__label" for="Date Embauche"> Date Embauche*</label><br>
                    <input class="parent__input" type="date" name="date_embauche" placeholder="Entrer date embauche " value="<?php echo isset($_POST['date_embauche']) ? $_POST['date_embauche'] : ''; ?>" ><br><br>
                </div>
                <div class="parent__children">
                    <label class="parent__label" for="date embauche">Service*</label><br>
                    <select style="width: 119%;margin-bottom: 21px;" class="parent__input" name="Service">
                        <?php
                        $query_service = "SELECT * FROM Service";
                        $result = mysqli_query($connect, $query_service);
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                                <option value="<?= $row['id']; ?>"><?= $row["Service"]; ?></option>
                        <?php
                            }
                        } else {
                            echo "0 result";
                        }
                        ?>
                    </select>
                </div>

                <div class="parent__children">
                    <!-- <label class="parent__label" for="Tel"> Numéro de téléphone*</label><br> -->
                    <input class="parent__input" type="number" name="matricule" placeholder="Entrer matricule " value="<?php echo isset($_POST['matricule']) ? $_POST['matricule'] : ''; ?>" ><br><br>
                </div>

                <div class="parent__children">
                    <label class="parent__label" for="Tel"> date de naissance*</label><br>
                    <input class="parent__input" type="date" name="date_de_naissance" placeholder="Entrer date de naissance " value="<?php echo isset($_POST['date_de_naissance']) ? $_POST['date_de_naissance'] : ''; ?>" ><br><br>
                </div>

                <div class="parent__div">
                    <button id="envoyés" class="parent__btn" type="submit" name="submit">Ajouté</button>
                </div>
            </div>
            </form>
    </article>
</section>
<script src="js/script.js">
</script>
</body>

</html>