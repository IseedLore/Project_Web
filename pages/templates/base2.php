<!DOCTYPE html>
<html lang="it">
<head>
    <title><?php echo $templateParams["title"]; ?></title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../css/style.css" />
</head>
<body class="container-fluid p-0">
    <?php require('header2.php'); ?>   
    <?php require($templateParams["page"]); ?>    
    <?php require('footer2.php'); ?>
</body>
</html>