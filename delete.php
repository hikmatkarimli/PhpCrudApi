<?php
include "./Database.php";
include "./Post.php";

$db = new Database();
$post = new Post($db);

$post->id = $_GET["id"];

if ($post->delete()) {
    echo "Post deleted sucessfully!";
} else {
    echo "Post haven't been deleted";
}