<!DOCTYPE html>
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
                <h1><strong>Liste des items   </strong><a href="insert.php" class="btn btn-success btn-lg"><i class="fas fa-plus"></i> Ajouter</a></h1>
                <table class="table table-stripped table-bordered">
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Description</th>
                            <th>Prix</th>
                            <th>Catégorie</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require 'database.php';
                        $db = Database::connect();
                        $statement = $db->query('SELECT items.id, items.name, items.description, items.price, categories.name AS category
                                                 FROM items LEFT JOIN categories ON items.category = categories.id
                                                 ORDER BY items.id DESC');
                        while($item = $statement->fetch())
                        {
                            echo'<tr>';
                                echo'<td>' . $item['name'] . '</td>';
                                echo'<td>' . $item['description'] . '</td>';
                                echo'<td>' . number_format((float)$item['price'],2,'.','') . '</td>';
                                echo'<td>' . $item['category'] . '</td>';
                                
                                echo'<td width=350>';
                                    echo'<a href="view.php?id=' . $item['id'] .'" class="btn btn-outline-secondary"><i class="fas fa-eye"></i> Voir</a>';
                                    echo'<a href="update.php?id=' . $item['id'] .'" class="btn btn-primary"><i class="fas fa-pen"></i> Modifier</a>';
                                    echo'<a href="delete.php?id=' . $item['id'] .'" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Supprimer</a>';
                                echo'</td>';
                            
                            echo'</tr>';
                        }
                        Database::disconnect();
                        ?>
                   
                    </tbody>
                </table>
            </div>
            
        </div>
        
        
    </body>
</html>



