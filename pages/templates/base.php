<!DOCTYPE html>
<html lang="it">
<head>
    <title><?php echo $templateParams["title"]; ?></title>
    <link rel="stylesheet" type="text/css" href="./css/style.css" />
</head>
<body>
    <?php require('header.php'); ?>   
    <?php require($templateParams["page"]); ?>    
    <?php require('footer.php'); ?>
</body>
</html>
