<?php
include_once "include/util.php";
include_once "models/post.php";

function get_list() {
  $posts = findAllPosts();
  renderTemplate(
    "views/index.php",
    array(
      'title' => 'My Blog Engine',
      'posts' => $posts,
    )
  );
}

function get_add() {
  $post = emptyPost();
  renderTemplate(
    "views/postadd.php",
    array(
      'title' => 'Add a blog post',
      'operation' => 'add',
      'post' => $post
    )
  );
}

function post_add() {
  $post = emptyPost();
  $post['title'] = safeParam($_REQUEST, 'title', false);
  $post['tags'] = safeParam($_REQUEST, 'tags', false);
  $post['content'] = safeParam($_REQUEST, 'content', false);
  $errors = checkPost($post);
  if ($errors) {
    renderTemplate(
      "views/postadd.php",
      array(
        'title' => 'Add a blog post',
        'errors' => $errors,
        'post' => $post
      )
    );
  } else {
    $post['datestamp'] = time();
    addPost($post);
    redirectRelative("index");
  }
}

function get_view($id) {
  $post = getPostById($id); //you have to build this in the model
  renderTemplate(
    "views/postview.php",
    array(
      'title' => 'View blog post',
      'edit' =>'edit',
      'post' => $post
    )
  );
}

function get_edit($id) {
  $post = getPostById($id);
  renderTemplate(
    "views/postadd.php",
    array(
      'title' => 'Edit a blog post',
      'edit' => "edit/$id",
      'post' => $post
    )
  );
}

function postEdit($id) {
  $post = getPostById($id);
  $post['title'] = safeParam($_REQUEST, 'title', false);
  $post['content'] = safeParam($_REQUEST, 'content', false);
  $post['tags'] = safeParam($_REQUEST, 'tags', false);
  $errors = checkPost($post);
  if ($errors) {
    renderTemplate(
      "views/postadd.php",
      array(
        'title' => 'Edit a blog post',
        'edit'  => 'edit/$id',
        'errors' => $errors,
        'post' => $post
      )
    );
  } else {
    updatePost($post);
    redirectRelative("index");
  }
}

function get_delete($id) {
  deletePostByID($id);
  redirectRelative("index");
}

?>
