<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <nav>
        <ul>
            <li><a href="?menu=category">category</a></li>
            <li><a href="?menu=genre">genre</a></li>
            <li><a href="?menu=book">book</a></li>
        </ul>
        <main>
            <?php
            $navigation = filter_input(INPUT_GET, 'menu');
            switch ($navigation) {
                case 'category':
                    include_once 'category.php';
                    break;
                case 'genre':
                    include_once 'genre.php';
                    break;
                case 'book':
                    include_once 'book.php';
                    break;
            }

            ?>

        </main>

    </nav>

</body>

</html>