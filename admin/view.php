<?php
   require 'database.php';
       

   if(!empty($_GET['id']))
   {
       $id = checkInput($_GET['id']);
   }

   $db = Database::connect();
   $statement = $db->prepare('SELECT items.id, items.name, items.description, items.price, items.image, categories.name AS category
                              FROM items LEFT JOIN categories ON items.category = categories.id
                              WHERE items.id = ?');

  $statement->execute(array($id));
  $item = $statement->fetch();
  Database::disconnect();
 




//sécurité
function checkInput($data)
  {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
      
  }

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
            
            <div class="row">
                <div class="col-md-6">
                    <h1><strong>Voir un item   </strong></h1>
                    <br>
                    <form>
                        
                            <div class="form-group"><label>Nom: </label><?php  echo ' ' . $item['name'];  ?></div>
                            <div class="form-group"><label>Description: </label><?php  echo ' ' . $item['description'];  ?></div>
                            <div class="form-group"><label>Prix: </label><?php  echo ' ' . number_format((float)$item['price'],2,'.','') . ' ' . '€';  ?></div>
                            <div class="form-group"><label>Catégorie: </label><?php  echo ' ' . $item['category'];  ?></div>
                            <div class="form-group"><label>Image: </label><?php  echo ' ' . $item['image'];  ?></div>
                            
                    </form>
                    <br>
                    <div class="form-actions">
                        <a class="btn btn-primary" href="index.php"><i class="fas fa-backward"></i> Retour</a>
                    </div>
                    
                    
                </div>
                <div class="col-md-6 site">
                            <div class="img-thumbnail">
                                <img style="width: 100%;"src="<?php echo '../images/' . $item['image']; ?>" alt="img_error">
                                <div class="price"><?php  echo number_format((float)$item['price'],2,'.','') . ' ' . '€';  ?></div>
                                <div class="caption">
                                    <h4><?php  echo $item['name'];  ?></h4>
                                    <p><?php  echo $item['description'];  ?></p>
                                    <a href="#" class="btn btn-order" role="button"><span><i class="fas fa-shopping-cart"></i></span> Commander</a>
                                </div>
                            </div>
                </div>
                
            </div>
        </div>
    </body>
</html>