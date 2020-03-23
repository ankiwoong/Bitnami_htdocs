<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Array</h1>
    <?php
    $coworkers = array('ankiwoong', 'kimyurim', 'anjia');
    echo $coworkers[0].'<br>';
    echo $coworkers[2].'<br>';
    echo count($coworkers).'<br>';
    var_dump(count($coworkers)).'<br>';
    array_push($coworkers, 'minsunhong', 'anhana').'<br>';
    var_dump($coworkers);
    ?>
</body>
</html>