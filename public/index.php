<meta charset="utf-8" />
<?php
// require_once realpath(__DIR__).'/../bootstrap/bootstrap.php';
switch ($_SERVER['REQUEST_URI']) {
    case '/':
        # code...
        require_once realpath(__DIR__).'/../views/home/index.php';
        break;
    case '/about':
        # code...
        require_once realpath(__DIR__).'/../views/about.php';
        break;
    case '/blog':
        # code...
        require_once realpath(__DIR__).'/../views/blog.php';
        break;
    default:
        # code...
        $url = $_SERVER['REQUEST_URI'];
                 echo $url;
}
