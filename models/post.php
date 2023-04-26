<?php
include_once 'models/db.php';

function emptyPost() {
  return array(
    'id' => '',
    'title' => '',
    'content' => '',
    'datestamp' => '',
    'tags' => ''
  );
}

function checkPost($post) {
    $errors = array();
    if (!$post['title']) {
      $errors['title'] = "Title may not be empty.";
    }

    if (!$post['content']) {
      $errors['content'] = "Content may not be empty.";
    }

    return $errors;
}

function findAllPosts() {
    global $db;
    $st = $db -> prepare('SELECT * FROM post ORDER BY datestamp DESC LIMIT 5');
    $st -> execute();
    return $st -> fetchAll(PDO::FETCH_ASSOC);
}

function getPostById($id) {
    global $db;
    $st = $db -> prepare('SELECT * FROM post WHERE id = :id');
    $st -> execute(array(':id' => $id));
    return $st -> fetch(PDO::FETCH_ASSOC);
}

function addPost($post) {
    global $db;
    $st = $db -> prepare("INSERT INTO post (title, content, datestamp, tags) VALUES (:title, :content, :datestamp, :tags)");
    $st -> bindParam(':title', $post['title']);
    $st -> bindParam(':tags', $post['tags']);
    $st -> bindParam(':content', $post['content']);
    $st -> bindValue(':datestamp', date('Y-m-d H:i:s T'));
    $st -> execute();
    return $db->lastInsertId();
}

function updatePost($post) {
    global $db;
    $st = $db -> prepare("UPDATE post SET title=:title, content=:content, tags=:tags WHERE id=:id");
    $st -> bindParam(':title', $post['title']);
    $st -> bindParam(':content', $post['content']);
    $st -> bindParam(':tags', $post['tags']);
    $st -> bindValue(':id', $post['id']);
    $st -> execute();
}

function deletePostById($id) {
    global $db;
    $st = $db -> prepare("DELETE FROM post WHERE id=:id");
    $st -> bindValue(':id', $id);
    $st -> execute();
}

?>
