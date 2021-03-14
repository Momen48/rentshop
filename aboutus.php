<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title></title>
    <style>
*{
    margin: 0;
    padding: 0;
    font-family: "Open Sans",sans-serif;
    box-sizing: border-box;
}

body{
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: #f1f1f1;
}

.about-section{
    background: url(images/aboutus.jpg) no-repeat left;
    background-size: 55%;
    background-color: #fdfdfd;
    overflow: hidden;
    padding: 100px 0;
}

.inner-container{
    width: 55%;
    float: right;
    background-color: #fdfdfd;
    padding: 150px;
}

.inner-container h1{
    margin-bottom: 30px;
    font-size: 30px;
    font-weight: 900;
}

.text{
    font-size: 13px;
    color: #545454;
    line-height: 30px;
    text-align: justify;
    margin-bottom: 40px;
}

.skills{
    display: flex;
    justify-content: space-between;
    font-weight: 700;
    font-size: 13px;
}

@media screen and (max-width:1200px){
    .inner-container{
        padding: 80px;
    }
}

@media screen and (max-width:1000px){
    .about-section{
        background-size: 100%;
        padding: 100px 40px;
    }
    .inner-container{
        width: 100%;
    }
}

@media screen and (max-width:600px){
    .about-section{
        padding: 0;
    }
    .inner-container{
        padding: 60px;
    }
}
    
    </style>
</head>
<body>

    <div class="about-section">
        <div class="inner-container">
            <h1>About Us</h1>
            <p class="text">
            Erent is the first rental shop in chittagong. It is a self-made rental shop,
            the main purpose of which is to provide maximum service to everyone.
            We mainly rent dresses for various occasions, weddings, parties etc. 
            Any drama company can rent their dress from us if they want.

            </p>
            <div class="skills">
                <span><a href="shop.php"> Rent Now </a> </span>
                <span>Rent stylish accessories</span>
                <span><a href="index.php">Go home</a></span>
            </div>

<br />
            <h3>Address</h3>
            <p>House no- 65, Nasirabad Housing Society,      </p>
            <p>East Nasirabad, Chittagong.         </p>
            <p>mobile: 01198526518 .            </p>
        </div>


    </div>
</body>
</html>