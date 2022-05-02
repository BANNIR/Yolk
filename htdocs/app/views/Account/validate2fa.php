<html>
    <head>
        <title>Yolk</title>
    </head>
    <body>
        <?php
            if ($data)
                echo $data . "<br>";
        ?>
       <?= _("Please enter your secret key to log into this application:") ?>
        <form method="post" action="">
            <label><?= _('Secret key') ?>:<input type="text" name="code"
            /></label>
            <input type="submit" name="action" value='<?= _('Verify key') ?>' />
        </form>
    </body>
</html>