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
        <link type="text/css" rel="stylesheet" href="style.css"> 
        <link href="https://fonts.googleapis.com/css?family=Holtwood+One+SC&display=swap" rel="stylesheet">
    </head>
    
    
    <body>
        <div class="container site">
            <h1 class="text-logo"><span><i class="fas fa-utensils"></i></span> Burger code <span><i class="fas fa-utensils"></i></span></h1>
            <?php 
               require 'admin/database.php';
               echo '<nav>
                        <ul class="nav nav-pills">';
                $db = Database::connect();
                $statement = $db->query('SELECT * FROM categories');
                $categories = $statement->fetchAll();
                foreach($categories as $category)
                {
                    if($category['id'] == '1')
                        echo '<li role="presentation" class="nav-item active"><a class="nav-link active" href="#' . $category['id'] . '" data-toggle="tab">' . $category['name'] .'</a></li>';
                    else
                        echo '<li role="presentation" class="nav-item"><a class="nav-link" href="#' . $category['id'] . '" data-toggle="tab">' . $category['name'] .'</a></li>';
                }
               
                echo    '</ul>
                      </nav>';
            
                echo '<div class="tab-content">';
            
                foreach($categories as $category)
                {
                    if($category['id'] == '1')
                        echo '<div class="tab-pane container active" id="' . $category['id'] . '">';
                    else
                        echo '<div class="tab-pane container fade" id="' . $category['id'] . '">';
                    
                    echo '<div class="row">';
                    
                    $statement = $db->prepare('SELECT * FROM items WHERE items.category = ?');
                    $statement->execute(array($category['id']));
                    
                    while($item = $statement->fetch())
                    {
                        echo '<div class="col-md-6 col-lg-4">
                                <div class="img-thumbnail">
                                    <img style="width: 100%;"src="images/' . $item['image'] . '" alt="img_error">
                                    <div class="price">' . number_format($item['price'], 2, '.', ''). ' €</div>
                                    <div class="caption">
                                        <h4>' . $item['name'] . '</h4>
                                        <p>' . $item['description'] . '</p>
                                        <a href="#" class="btn btn-order" role="button"><span><i class="fas fa-shopping-cart"></i></span> Commander</a>
                                    </div>
                                </div>
                               </div>';
                    }
                    
                    echo '</div>';
                    echo '</div>';
                }
               
                echo '</div>';
                Database::disconnect();
                
            
            ?>
        </div>
    </body>
</html>