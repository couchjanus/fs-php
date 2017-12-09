<?php

/**
 * Модель для работы с posts
 */

class Post {

    //Количество отображаемых по умолчанию
    const SHOW_BY_DEFAULT = 2;


    public static function index () {
        
        $con = Connection::make();
        //Подготавливаем данные

        $sql = "SELECT * FROM posts ORDER BY id ASC";

        //Выполняем запрос
        $res = $con->query($sql);

        //Получаем и возвращаем результат
        $posts = $res->fetchAll(PDO::FETCH_ASSOC);

        return $posts;

    }


    public static function view($id){

        $con = Connection::make();
        // $con->exec("set names utf8");

        $sql = "SELECT * FROM posts WHERE id = :id";

        $res = $con->prepare($sql);
        $res->bindParam(':id', $id, PDO::PARAM_INT);
        $res->execute();

        $post = $res->fetch(PDO::FETCH_ASSOC);

        return $post;
    }

    public static function addPost ($options) {

        $db = Connection::make();
        // $db->exec("set names utf8");

        $sql = "
                INSERT INTO posts(title, content,  status)
                VALUES (:title, :content, :status)
                ";

        $res = $db->prepare($sql);

        $res->bindParam(':title', $options['title'], PDO::PARAM_STR);
        
        $res->bindParam(':content', $options['content'], PDO::PARAM_STR);
        $res->bindParam(':status', $options['status'], PDO::PARAM_INT);

        //Если запрос выполнен успешно
        if ($res->execute()) {
            return $db->lastInsertId();
        } else {
            return 0;
        }
    }

    public static function updatePost ($id, $options) {

        $db = Connection::make();
        // $db->exec("set names utf8");

        $sql = "
                UPDATE posts
                SET
                    title = :title,
                    content = :content,
                    status = :status
                WHERE id = :id
                ";

        $res = $db->prepare($sql);

        $res->bindParam(':title', $options['title'], PDO::PARAM_STR);
       
        $res->bindParam(':content', $options['content'], PDO::PARAM_STR);
        $res->bindParam(':status', $options['status'], PDO::PARAM_INT);
        $res->bindParam(':id', $id, PDO::PARAM_INT);

        return $res->execute();
    }

    public static function deletePostById ($id) {
        $db = Connection::make();

        $sql = "
                DELETE FROM posts WHERE id = :id
                ";

        $res = $db->prepare($sql);
        $res->bindParam(':id', $id, PDO::PARAM_INT);
        return $res->execute();
    }

    public static function getPostById ($postId) {

        $db = Connection::make();
        $db->exec("set names utf8");

        $sql = "
        SELECT id, title, content, DATE_FORMAT(`create_at`, '%d.%m.%Y %H:%i:%s') AS formated_date, status FROM posts WHERE id = :id";

        $res = $db->prepare($sql);
        $res->bindParam(':id', $postId, PDO::PARAM_INT);
        $res->execute();

        $post = $res->fetch(PDO::FETCH_ASSOC);

        return $post;
    }

     /**
     * Общее кол-во 
     *
     * @return mixed
     */
    public static function getTotalPosts () {

        // Соединение с БД
        $db = Connection::make();

        // Текст запроса к БД
        $sql = "SELECT count(id) AS count FROM posts";

        // Выполнение коменды
        $res = $db->query($sql);

        // Возвращаем значение count - количество
        $row = $res->fetch();
        return $row['count'];
    }


    public static function getLatestPosts ($page = 1) {

        $limit = self::SHOW_BY_DEFAULT;

        //Задаем смещение
        $offset = ($page - 1) * self::SHOW_BY_DEFAULT;

        $con = Connection::make();

        $sql = "
                SELECT *
                  FROM posts
                    WHERE status = 1
                      ORDER BY id DESC
                        LIMIT :limit OFFSET :offset
                ";

        //Подготавливаем данные
        $res = $con->prepare($sql);
        $res->bindParam(':limit', $limit, PDO::PARAM_INT);
        $res->bindParam(':offset', $offset, PDO::PARAM_INT);

        //Выполняем запрос
        $res->execute();

        //Получаем и возвращаем результат
        $posts = $res->fetchAll(PDO::FETCH_ASSOC);

        return $posts;
    }


 }
