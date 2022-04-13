<?php

require_once '../core/pass.php';
  $host_name = 'db5005933086.hosting-data.io';
  $database = 'dbs4972359';
  $user_name = 'dbu2433709';
  $pdo = null;

  try {
    $pdo = new PDO("mysql:host=$host_name; dbname=$database;", $user_name, $password);
  } catch (PDOException $e) {
    echo "Erreur!: " . $e->getMessage() . "<br/>";
    die();
  }
  
?>

    <link href="../css/style.css" rel="stylesheet" type="text/css">

<?php

// NOUVEAU MOT DE PASSE 
if(isset($_GET['token']) && $_GET['token'] != ''){

    $stmt = $pdo->prepare('SELECT email FROM users WHERE token = ?');
    $stmt->execute([$_GET['token']]);
    $email = $stmt->fetchColumn();

    
    if(isset($_POST['newpassword'])){
        $hashedPassword = password_hash($_POST['newpassword'], PASSWORD_DEFAULT);
        $sql = "UPDATE users SET password =?,token = NULL WHERE email = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$hashedPassword, $email]);
        $succes = "Mot de passe modifié!";
    }
    
    if($email){//si l'email existe
        ?>
            <div class="page_container forgot_container token_container">
                <div class="token_box reveal">
                    <form method="post">
                        <h3>Entrez votre nouveau mot de passe</h3>
                        <span class='formSucces'><?php if(isset ($succes)){echo $succes;}?></span><br/>
                        <span class='formErrors'><?php if(isset ($errors)){echo $errors;}?></span><br/>

                        <input type="password" name="newpassword" class="hide-pass inputs" required><br/>
                        <input type="checkbox" class="show_password" onclick="showPass()">Montrer le mot de passe<br>
                        <input type="submit"  class="inputs"value="Confirmer">
                    </form>
                </div>
            </div>

            <script defer src="../js/app.js" ></script>
            
    

<?php
    }
    else{
        ?>
         <div class="no_result_finded">
            <div class="no_result_finded_box">
               <h3>Aucun membre trouvé à cette adresse</h3> 
               <button class="button">Devenez partenaire</button> 
            </div>
         </div>
   <?php } 

} ?>