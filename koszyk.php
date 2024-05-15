<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Koszyk</title>
</head>
<body>
    <?php
        session_start();
        $imie = ucfirst($_SESSION['log']);
        if (isset($_SESSION["log"]) ) {
            if(!empty($_SESSION['koszyk'])){
                $koszyk = array_unique(
                    array_merge(
                        unserialize($_SESSION['koszyk']),
                        $_POST['kosyk']
                    ));
                    $_SESSION['koszyk'] = serialize($koszyk);
            }
            else
            {
                $_SESSION['koszyk'] = serialize($_POST['kosyk']);
            }
            header("location: index.php")
            ;die()
        ;}

        
        foreach (unserialize($_SESSION['koszyk']) as $produkt) {
            print($produkt . "<br>");
        }
    ?>
</body>
</html>