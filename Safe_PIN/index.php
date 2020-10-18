<?php declare(strict_types=1);

require_once 'Session.php';

session_start();
$pin = Session::enterPin();

$unlocked = $pin == '1234';

?>

<html>
    <head>
        <link rel="stylesheet" href="stylesheet.css">
    </head>
    <body>
        <?php if (strlen($pin) < 4): ?>
            <h3><?= 'Enter PIN'; ?></h3>
        <?php elseif (strlen($pin) == 4): ?>
            <h3><?= $unlocked ? 'Unlocked' : 'Locked'; ?></h3>
        <?php endif; ?>

        <h3><?= str_repeat('*', strlen($pin)); ?></h3>
        <div class="centered">
            <form action="/" method="post">
                <?php for ($i = 1; $i < 10; $i++) { ?>
                <button type="submit" name="pin" value="<?= $i; ?>"><?= $i; ?></button>
                <?php } ?>
            </form>
        </div>
    </body>
</html>

