<?php
echo date_default_timezone_get();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="js/moment.js"></script>
</head>
<body>
<script>
var date = new Date('2018-07-18 10:08:16 UTC');
console.log(moment(date).format('DD/MM/YYYY HH:mm:ss'));
</script>
</body>
</html>
