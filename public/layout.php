<!doctype html>
<head>
    <meta charset="utf-8">
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="all" href="/styles/compiled/styles.css"/>
</head>
<body id="<?=$page?>">

<!-- views --->
<?php require('views/pages/' . $route . '/view.php'); ?>

<script src="/js/libs/head.min.js"></script>
<script src="/js/main.js?<?= rand(1000,9999)?>"></script>

</body>
</html>
