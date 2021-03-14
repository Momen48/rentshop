<?php

//helper
function redirect($location){
    header("Location: $location");
}

function query($sql){
    global $connection;
    return mysqli_query($connection,$sql);
}

function confirm($result){
    global $connection;
    if(!$result){
        die("QUERY FAILED" . mysqli_error($connection));
    }
}

function escape_string($string){
global $connection;
return mysqli_real_escape_string($connection,$string);
}

function fetch_array($result){
    return mysqli_fetch_array($result); 
}

function set_msg($msg){
    if(!empty($msg)){
        $_SESSION['message']=$msg;
    }
    else{
        $msg = "";
    }
}
function display_msg(){
    if (isset($_SESSION['message'])){
        echo $_SESSION['message'];
        unset($_SESSION['message']);
    }
}

//get products

function get_product(){
    $query = query("SELECT * FROM products ORDER BY rand() LIMIT 12 ");
    confirm($query);
    while($row=fetch_array($query)){
    $product = <<<DELIMETER
    <div class="col-md-3">
    <div class="product-top">
        <a href="product.php?id={$row['id']}"><img src="admin/{$row['thumb']}"></a>
        <div class="overlay-right">
        <a href="checkout.php"><button type="button" class="btn btn-secondary" title="Quick Shop">
        <i class="fa fa-eye"></i> 
        </button></a>
        <a href="#"><button type="button" class="btn btn-secondary" title="Add to Wishlist">
        <i class="fa fa-heart-o"></i> 
        </button></a>
        <a href="addtocart.php?id={$row['id']}"><button type="button" class="btn btn-secondary" title="Add to Cart">
        <i class="fa fa-shopping-cart"></i> 
        </button></a>
        </div>
    </div>
    <div class="product-bottom text-center">
    <i class="fa fa-star"></i>  
    <i class="fa fa-star"></i>  
    <i class="fa fa-star"></i>  
    <i class="fa fa-star"></i>  
    <i class="fa fa-star"></i>  
        <h3><a href="product.php?id={$row['id']}">{$row['name']}</a></h3>
        <h5>BDT {$row['price']}</h5>
    </div>
    </div>
    DELIMETER;
    
    echo $product;
    }
    
    }


    //get product by category

function get_categories(){
    $query = query("SELECT * FROM category");
    confirm($query);

    while($row = mysqli_fetch_array($query)){

        $category_links = <<<DELIMETER
        <a href="category.php?id={$row['id']}" class='list-group-item'>{$row['name']}</a>
        DELIMETER;

        echo $category_links;
    }
}

function CatPage(){
    $query = query("SELECT * FROM products WHERE catid=".escape_string($_GET['id'])." " );
    confirm($query);
    while($row=fetch_array($query)){
    $product = <<<DELIMETER
    <div class="col-md-3">
    <div class="product-top">
        <a href="product.php?id={$row['id']}"><img src="admin/{$row['thumb']}"></a>
        <div class="overlay-right">
        <a href="checkout.php"><button type="button" class="btn btn-secondary" title="Quick Shop">
        <i class="fa fa-eye"></i> 
        </button></a>
        <a href="#"><button type="button" class="btn btn-secondary" title="Add to Wishlist">
        <i class="fa fa-heart-o"></i> 
        </button></a>
        <a href="addtocart.php?id={$row['id']}"><button type="button" class="btn btn-secondary" title="Add to Cart">
        <i class="fa fa-shopping-cart"></i> 
        </button></a>
        </div>
    </div>
    <div class="product-bottom text-center">
    <i class="fa fa-star"></i>  
    <i class="fa fa-star"></i>  
    <i class="fa fa-star"></i>  
    <i class="fa fa-star"></i>  
    <i class="fa fa-star"></i>  
        <h3><a href="product.php?id={$row['id']}">{$row['name']}</a></h3>
        <h5>BDT {$row['price']}</h5>
    </div>
    </div>
    DELIMETER;
    
    echo $product;
    }    
}
    
function shop_Page(){
    $query = query("SELECT * FROM products");
    confirm($query);
    while($row=fetch_array($query)){
        $product = <<<DELIMETER
        <div class="col-md-3">
        <div class="product-top">
            <a href="product.php?id={$row['id']}"><img src="admin/{$row['thumb']}"></a>
            <div class="overlay-right">
            <a href="checkout.php"><button type="button" class="btn btn-secondary" title="Quick Shop">
            <i class="fa fa-eye"></i> 
            </button></a>
            <a href="#"><button type="button" class="btn btn-secondary" title="Add to Wishlist">
            <i class="fa fa-heart-o"></i> 
            </button></a>
            <a href="addtocart.php?id={$row['id']}"><button type="button" class="btn btn-secondary" title="Add to Cart">
            <i class="fa fa-shopping-cart"></i> 
            </button></a>
            </div>
        </div>
        <div class="product-bottom text-center">
        <i class="fa fa-star"></i>  
        <i class="fa fa-star"></i>  
        <i class="fa fa-star"></i>  
        <i class="fa fa-star"></i>  
        <i class="fa fa-star"></i>  
            <h3><a href="product.php?id={$row['id']}">{$row['name']}</a></h3>
            <h5>BDT {$row['price']}</h5>
        </div>
        </div>
        DELIMETER;
    
    echo $product;
    }    
}



function men_product(){
    $query = query("SELECT * FROM `products` WHERE `catid`=2 ORDER BY rand() LIMIT 8");
    confirm($query);
    while($row=fetch_array($query)){
    $product = <<<DELIMETER
    <div class="col-md-3">
    <div class="product-top">
        <a href="product.php?id={$row['id']}"><img src="admin/{$row['thumb']}"></a>
        <div class="overlay-right">
        <a href="checkout.php"><button type="button" class="btn btn-secondary" title="Quick Shop">
        <i class="fa fa-eye"></i> 
        </button></a>
        <a href="#"><button type="button" class="btn btn-secondary" title="Add to Wishlist">
        <i class="fa fa-heart-o"></i> 
        </button></a>
        <a href="addtocart.php?id={$row['id']}"><button type="button" class="btn btn-secondary" title="Add to Cart">
        <i class="fa fa-shopping-cart"></i> 
        </button></a>
        </div>
    </div>
    <div class="product-bottom text-center">
    <i class="fa fa-star"></i>  
    <i class="fa fa-star"></i>  
    <i class="fa fa-star"></i>  
    <i class="fa fa-star"></i>  
    <i class="fa fa-star"></i>  
        <h3><a href="product.php?id={$row['id']}">{$row['name']}</a></h3>
        <h5>BDT {$row['price']}</h5>
    </div>
    </div>
    DELIMETER;
    
    echo $product;
    }
    
    }


    
function women(){
    $query = query("SELECT * FROM `products` WHERE `catid`=3 ORDER BY rand() LIMIT 8");
    confirm($query);
    while($row=fetch_array($query)){
    $product = <<<DELIMETER
    <div class="col-md-3">
    <div class="product-top">
        <a href="product.php?id={$row['id']}"><img src="admin/{$row['thumb']}"></a>
        <div class="overlay-right">
        <a href="checkout.php"><button type="button" class="btn btn-secondary" title="Quick Shop">
        <i class="fa fa-eye"></i> 
        </button></a>
        <a href="#"><button type="button" class="btn btn-secondary" title="Add to Wishlist">
        <i class="fa fa-heart-o"></i> 
        </button></a>
        <a href="addtocart.php?id={$row['id']}"><button type="button" class="btn btn-secondary" title="Add to Cart">
        <i class="fa fa-shopping-cart"></i> 
        </button></a>
        </div>
    </div>
    <div class="product-bottom text-center">
    <i class="fa fa-star"></i>  
    <i class="fa fa-star"></i>  
    <i class="fa fa-star"></i>  
    <i class="fa fa-star"></i>  
    <i class="fa fa-star"></i>  
        <h3><a href="product.php?id={$row['id']}">{$row['name']}</a></h3>
        <h5>BDT {$row['price']}</h5>
    </div>
    </div>
    DELIMETER;
    
    echo $product;
    }
    
    }





function rand_prod(){
    $query = query("SELECT * FROM `products` ORDER BY rand() LIMIT 4");
    confirm($query);
    while($row=fetch_array($query)){
    $product = <<<DELIMETER
    <div class="col-md-3">
    <div class="product-top">
        <a href="product.php?id={$row['id']}"><img src="admin/{$row['thumb']}"></a>
        <div class="overlay-right">
        <a href="checkout.php"><button type="button" class="btn btn-secondary" title="Quick Shop">
        <i class="fa fa-eye"></i> 
        </button></a>
        <a href="#"><button type="button" class="btn btn-secondary" title="Add to Wishlist">
        <i class="fa fa-heart-o"></i> 
        </button></a>
        <a href="addtocart.php?id={$row['id']}"><button type="button" class="btn btn-secondary" title="Add to Cart">
        <i class="fa fa-shopping-cart"></i> 
        </button></a>
        </div>
    </div>
    <div class="product-bottom text-center">
    <i class="fa fa-star"></i>  
    <i class="fa fa-star"></i>  
    <i class="fa fa-star"></i>  
    <i class="fa fa-star"></i>  
    <i class="fa fa-star"></i>  
        <h3><a href="product.php?id={$row['id']}">{$row['name']}</a></h3>
        <h5>BDT {$row['price']}</h5>
    </div>
    </div>
    DELIMETER;
    
    echo $product;
    }
    
    }