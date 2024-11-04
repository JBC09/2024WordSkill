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

        if(!isLogin()){

            echo "
                <script>
                    alert('로그인 한 회원만 접근 가능합니다.');
                    location.href= './index.php';
                </script>
                
            ";
        }
        ?>

        <?php
            if(isLogin()){
                $grade = $_SESSION["grade"];

                if($grade == 1) {
                    include './mypageGabber.php';
                }
                else if($grade == 0) {
                    include './mypageGeneral.php';
                }
                
            }

        ?>

<?php
        include './footer.php';

        ?>
</body>
</html>