<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
        include './header.php';

        ?>

        <?php
            if(isLogin()){
                $grade = $_SESSION["grade"];

                if($grade == 2) {
                    include './courseAdmin.php';
                }
                else if($grade == 1) {
                    include './courseGabber.php';
                }
                else {
                    include './courseGeneral.php';
                }
            }
            else {
                echo "
                    <div id='wrap' >
                        <div class='title' style='margin: 0px auto'>
                            <h1>Need For Login</h1>
                            <h2>로그인이 필요합니다</h2>

                        </div>

                    </div>
                ";
            }

        ?>

        <?php
        include './footer.php';

        ?>
</body>
</html>