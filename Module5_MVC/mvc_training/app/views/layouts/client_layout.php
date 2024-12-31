<!DOCTYPE html>
<html lang="en">

<head>
    <title><?php echo $dataView['page_title'] ?? 'Duchuong'; ?></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website</title>
    <link rel="stylesheet" type="text/css" href="<?= _WEB_ROOT ?>/public/assets/clients/css/style.css">
</head>

<body>
    <?php
    // Hiển thị header
    $this->render('blocks/header');

    $this->render($content, $sub_content);

    $this->render('blocks/footer');
    ?>

    <script type="text/javascript" src="<?= _WEB_ROOT ?>/public/assets/clients/js/script.js"></script>
</body>

</html>