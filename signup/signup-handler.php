<?php
require __DIR__.'/../vendor/autoload.php';

$transport = (new Swift_SmtpTransport('smtp.mailgun.org', 465, 'ssl'))
    ->setUsername('postmaster@mg.tilde.team')
    ->setPassword(file_get_contents("mg.key"));
$mailer = new Swift_Mailer($transport);

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

    if ($_REQUEST["sshkey"] == "") {
        $message .= "<li>ssh key required: please create one and submit the public key</li>";
    }


    if ($message == "") { // no validation errors
        $forwardmail = $_REQUEST["forward_email"] == "on"
            ? '<a href="https://domains.google.com/registrar#z=e&d=3471834,tilde.team&chp=z,d">yes</a>' : "no";

        $msgbody = "<h1>tilde.team signup</h1>
                    <hr>
                    desired username: <strong>{$_REQUEST["username"]}</strong><br>
                    contact email: <strong><a href=\"mailto:{$_REQUEST["email"]}\">{$_REQUEST["email"]}</a></strong><br>
                    reason: <strong>{$_REQUEST["interest"]}</strong><br>
                    forward mail?: <strong>$forwardmail</strong><br>
                    ssh key: <pre>{$_REQUEST["sshkey"]}</pre>";

        $message = (new Swift_Message('tilde.team signup'))
            ->setFrom(['sys@tilde.team' => 'tilde'])
            ->setTo(['admin@tilde.team'])
            ->setReplyTo([$_REQUEST["email"]])
            ->setBody($msgbody, 'text/html');

        $result = $mailer->send($message);

       echo '<div class="alert alert-success" role="alert">
                email sent! i\'ll get back to you soon with login instructions! <a href="/">back to tilde.team home</a>
             </div>';
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