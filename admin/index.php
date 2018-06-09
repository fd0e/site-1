<?php
include __DIR__.'/../header.php';

if (empty($_POST["username"]) || empty($_POST["password"])) {

} else {
    $usr = urlencode($_POST["username"]);
    $pwd = urlencode($_POST["password"]);
    $auth = json_decode(file_get_contents("https://auth.tilde.team/?json&user=$usr&pw=$pwd"))->sudoer;
    if ($auth) {
        echo "you're a sudoer";
    } else {
        echo "you don't have sudo. go away.";
    }
}
?>

<h1>tilde.team admin console</h1>

<form method="post">
    <input class="form-control" name="username" type="text">
    <input class="form-control" name="password" type="password">
    <input class="btn btn-default" type="submit" value="log in">
</form>

<?php
include __DIR__.'/../footer.php';
