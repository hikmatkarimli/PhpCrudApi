<?php
include "./Database.php";
include "./Post.php";

$db = new Database();
$post = new Post($db);

$post = $post->read();
$rowCount = $post->rowCount();
$posts = [];
if ($rowCount > 0) {
    while ($currentPost = $post->fetch(PDO::FETCH_ASSOC)) {
        // print_r($currentPost);
        extract($currentPost);
        $posts[] = ["id" => $id, "title" => $title, "body" => $body];
    }
    echo json_encode($posts);
} else {
    echo "Please enter post!";
}