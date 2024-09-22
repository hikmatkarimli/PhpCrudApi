<?php
include "./Database.php";
include "./Post.php";

$db = new Database();
$post = new Post($db);

$post->id = $_GET["id"];
$post->title = $_POST["title"];
$post->body = $_POST["body"];

if ($post->update()) {
    echo "Post updated sucessfully!";
} else {
    echo "Post haven't been updated";
}