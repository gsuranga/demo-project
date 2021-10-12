<html>
    <head>
        <title> <?= $title ?></title>
    </head>
    <body>
<!--        <h1><?=$header ?></h1>
        <p><?= $body ?></p>-->
        
        
        <h4>A Category With an ID of 1</h4>
 
<!--                <p>{myCat}</p>-->

                <h4>All Category List</h4>
                    <ul>
                        <?php foreach($allCategory as $cat){?>
                            <li>
                            <?= $cat['cat_name']; ?>
                            </li>
                        <?php } ?>
                    </ul>

                <hr />

                <h4>A Product With an ID of 1</h4>

<!--                <p>{myProduct}</p>-->

                <h4>All Product List</h4>

                    <ul>
                        <?php foreach($allProducts as $product){?>
                            <li>
                            <?= $product['prod_name']; ?>
                            </li>
                        <?php } ?>
                    </ul>
        
        
        
    </body>
</html>