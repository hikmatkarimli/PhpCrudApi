<?php
include "./Database.php";
include "./Post.php";

$db = new Database();
$post = new Post($db);

$post->title = $_POST["title"];
$post->body = $_POST["body"];

if ($post->create()) {
    echo "Post created sucessfully!";
} else {
    echo "Post haven't been created";
}