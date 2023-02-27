<?php
$articles = [
    ['libelle' => "Pigeon",
        'image' => 'https://loremflickr.com/cache/resized/7673_27524679540_31df892678_n_320_240_g.jpg',
        'prix' => 49.99,
        'promo' => true,
        'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
        Praesent magna quam, aliquet ut commodo non, ullamcorper a sapien. 
        Nunc ullamcorper massa quam, quis facilisis ipsum vestibulum vel. 
        Phasellus finibus dictum diam. Duis vestibulum cursus lorem molestie hendrerit. 
        Aliquam quis lectus quis justo blandit ullamcorper. Interdum et malesuada fames ac ante ipsum primis in faucibus. 
        Pellentesque rutrum lorem vitae nisi interdum, tempor convallis tortor fringilla. Sed aliquet rhoncus bibendum. 
        Praesent rhoncus et est ac tempor. Interdum et malesuada fames ac ante ipsum primis in faucibus. 
        Proin et quam ac magna scelerisque rutrum. Praesent sodales vel nunc id dapibus. 
        Nullam rutrum ligula vitae ante euismod, et bibendum ante tempor.'
    ]];
?>

<!doctype html>
<html lang=fr>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>CSS Card</title>
</head>
<body>

<div class="card">
    <div class="card-header">
        <img class="card-img"  src="<?php echo $articles[0]['image']?>"  alt="">
    </div>
    <div class="card-body">
        <h2 class="card-title"> <?php echo $articles[0]['libelle'] ?> </h2>
        <p class="card-price"> <?php
            if ($articles[0]['promo'] ==  true) {
                echo $articles[0]['prix']." euros ";
                echo '<i class="fa-solid fa-tags"></i>';
            } else {
                echo $articles[0]['prix']."euros";
            }
            ?></>
        <p class="card-text"> <?php
            if (strlen($articles[0]['description']) > 100) {
                echo substr($articles[0]['description'],0,100)."..." ;
            } else {
                echo substr($articles[0]['description'],0,strlen($articles[0]['description'])) ;
            }
             ?> </p>
        <div class="card-btn-detail">
            <a href="#">Voir</a>
        </div>
    </div>
</div>

</body>
</html>