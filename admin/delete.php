<?php

    require 'database.php';

//
//    if(!empty($_GET['id']))
//    {
//        $id = checkInput($_GET['id']);
//    }
////                                              _get et _post 2 ème facon pour recup l'id dans l'url
//
//    if(!empty($_POST))
//    {
//        $id = checkInput($_POST['id']);
//        $db = Database::connect();
//        $statement = $db->prepare("DELETE FROM items WHERE id = ?");
//        $statement->execute(array($id));
//        Database::disconnect();
//        header ("Location: index.php");
//    }
//  
//
//   function checkInput($data)
//  {
//      $data = trim($data);
//      $data = stripslashes($data);
//      $data = htmlspecialchars($data);
//      return $data;
//      
//  }
//

?>



<!DOCTYPE>
<html>
    <head>
        <title>Burger Code</title>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <script src="https://kit.fontawesome.com/054fdad312.js" crossorigin="anonymous"></script>
        <link type="text/css" rel="stylesheet" href="../style.css"> 
        <link href="https://fonts.googleapis.com/css?family=Holtwood+One+SC&display=swap" rel="stylesheet">
    </head>
    
    
    
    <body>
        <h1 class="text-logo"><span><i class="fas fa-utensils"></i></span> Burger code <span><i class="fas fa-utensils"></i></span></h1>
        
        <div class="container admin">
          
            
                
                    <h1><strong>Supprimer un item   </strong></h1>
                    <br>
                    <form class="form" action="delete.php" method="post">
                       
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <p class="alert alert-warning">Etes vous sur de vouloir supprimer ? ( Fonction désactiver en public )</p>
                        <div class="form-actions">
                        <button type="submit" href="index.php" class="btn btn-warning"> Oui</button>
                        <a class="btn btn-outline-secondary" href="index.php"> Non</a> 

                        </div>
             
                    </form>

        </div>
    </body>
</html>