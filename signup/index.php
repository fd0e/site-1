<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="tilde.team unix group">
    <meta name="author" content="Ben Harris">
    <title>signup~tilde.team</title>

    <link rel="manifest" href="/manifest.json">
    <meta name="theme-color" content="#00cc00">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-310x310.png">
    <link rel="icon" type="image/png" sizes="192x192" href="/apple-touch-icon-precomposed.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">

    <script src="/js/vue.min.js"></script>
    <link rel="stylesheet" href="https://tilde.team/css/hacker.css">

</head>

<body>
    <div class="container" id="app">
        <h1>
            tilde.team signup
            <div class="pull-right">
                <small><a href="/">&lt; back</a></small>
            </div>
        </h1>
        <h3>so you wanna join the tilde.team?</h3>

        <p>hi there. fill out this form and i'll get back to you with your account info.</p>

        <hr>

        <form method="post">

            <?php
            if ($_SERVER["SERVER_NAME"] != "localhost")
                require_once "/home/ben/ultimate-email/support/smtp.php";

            $message = "";
            if (isset($_REQUEST["username"]) && isset($_REQUEST["email"])) {
                // Check the name.
                $name = trim($_REQUEST["username"]);
                if ($name == "")
                    $message .= "<li>please fill in your desired username</li>";
                if (strlen($name) > 32)
                    $message .= "<li>username too long (32 character max)</li>";
                if (!preg_match('/^[A-Za-z][A-Za-z0-9]{2,31}$/', $name))
                    $message .= "<li>username contains invalid characters (lowercase only, must start with a letter)</li>";
                if (posix_getpwnam($name))
                    $message .= "<li>sorry, the username $name is unavailable</li>";

                // Check the e-mail address.
                $email = trim($_REQUEST["email"]);
                if ($email == "")
                    $message .= "<li>please fill in your email address</li>";
                else {
                    $result = SMTP::MakeValidEmailAddress($_REQUEST["email"]);
                    if (!$result["success"])
                        $message .= "<li>invalid email address: " . htmlspecialchars($result["error"]) . "</li>";
                    elseif ($result["email"] != $email)
                        $message .= "<li>invalid email address. did you mean:  " . htmlspecialchars($result["email"]) . "</li>";
                }

                if ($message == "") {
                    $headers = "From: {$_REQUEST["username"]} <{$_REQUEST["email"]}>\n";
                    $headers .= "Sender: www-data@tilde.team\n";
                    $headers .= "To: admin@tilde.team\n";
                    $headers .= "Reply-To: {$_REQUEST["email"]}\n";
                    $headers .= "MIME-Version: 1.0\r\n";
                    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
                    $forwardmail = $_REQUEST["forward_email"] == "on" ? '<a href="https://domains.google.com/registrar#z=e&d=3471834,tilde.team&chp=z,d">yes</a>' : "no";

                    $msgbody = "<h1>New tilde.team signup</h1>
                                <hr>
                                Desired username: <strong>{$_REQUEST["username"]}</strong><br>
                                Contact email: <strong><a href=\"mailto:{$_REQUEST["email"]}\">{$_REQUEST["email"]}</a></strong><br>
                                Reason: <strong>{$_REQUEST["interest"]}</strong><br>
                                Forward mail?: <strong>$forwardmail</strong><br>
                                SSH Key: <pre>{$_REQUEST["sshkey"]}</pre>";

                    if (mail('bharrismac@gmail.com', 'tilde.team signup', $msgbody, $headers)) {
                       echo '<div class="alert alert-success" role="alert">
                                email sent! i\'ll get back to you soon with login instructions! <a href="/">back to tilde.team home</a>
                             </div>';
                    } else {
                       echo 'The email has failed! Send me a message manually at <a href="mailto:ben@tilde.team">ben@tilde.team</a>';
                    }
                } else {
                    ?>
                    <div class="alert alert-warning" role="alert">
                        <strong>please correct the following errors: </strong>
                        <?=$message?>
                    </div>
                    <?php
                }
            }
            ?>

            <div class="form-group">
                <label>your desired username (numbers and lowercase letters only, no spaces)</label>
                <input v-model="username" class="form-control" name="username" value="<?=$_REQUEST["username"] ?? ""?>" type="text" required>
            </div>

            <div class="form-group">
                <label>email to contact you with account info</label>
                <input v-model="email" class="form-control" name="email" value="<?=$_REQUEST["email"] ?? ""?>" type="text" required>
                <div class="checkbox">
                    <label>
                        <input type="checkbox" <?=isset($_REQUEST["forward_email"]) && $_REQUEST["forward_email"] == "on" ? 'checked="checked"' : ""?> name="forward_email">
                        forward mail sent to {{ username || 'username' }}@tilde.team to {{ email || 'this address' }}?
                    </label>
                </div>
            </div>

            <div class="form-group">
                <label>what interests you about tilde.team?</label>
                <textarea class="form-control" name="interest" id="" cols="30" rows="10"><?=$_REQUEST["interest"] ?? ""?></textarea>
            </div>

            <div class="form-group">
                <label>SSH public key (optional)</label>
                <textarea class="form-control" name="sshkey" id="" cols="30" rows="10"><?=$_REQUEST["sshkey"] ?? ""?></textarea>
            </div>

            <button class="btn btn-primary" type="submit">submit</button>

        </form>
        <br>
    </div>

    <script>
        var vm = new Vue({
            el: '#app',
            data: {
                username: '',
                email: ''
            }
        })
    </script>

</body>
</html>


