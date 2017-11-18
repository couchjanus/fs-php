<?php

/**
 * Модель для работы с posts
 */

class Post {

    public static function index () {
        $db = require ROOT.'/config/db.php';
        $con = Connection::make($db['database']);

        //Подготавливаем данные

        $sql = "SELECT id, title, content, created_at, status FROM posts ORDER BY id ASC";

        // $con->exec("set names utf8");

        //Выполняем запрос
        $res = $con->query($sql);

        //Получаем и возвращаем результат
        $posts = $res->fetchAll(PDO::FETCH_ASSOC);

        return $posts;

    }

    public static function view($id){

        $db = require ROOT.'/config/db.php';

        $con = Connection::make($db['database']);
        // $con->exec("set names utf8");

        $sql = "SELECT * FROM posts WHERE id = :id";

        $res = $con->prepare($sql);
        $res->bindParam(':id', $id, PDO::PARAM_INT);
        $res->execute();

        $post = $res->fetch(PDO::FETCH_ASSOC);

        return $post;
    }

 }
