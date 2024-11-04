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

        if(isLogin()){

            echo "
                <script>
                    alert('로그인 된 회원은 접근할수 없습니다.');
                    location.href= './index.php';
                </script>
                
            ";
        }
        ?>
    <link rel="stylesheet" href="./css/login.css">
        <div id="wrap">
            <div class="form" id="sign">
                <div class="title">
                    <h1>SIGN UP</h1>
                    <h2>회원가입</h2>
                </div>

                <div>
                    <p>아이디</p>
                    <input type="text" name="" id="userId" placeholder="아이디를 입력해주세요.">
                </div>

                <div>
                    <p>이름</p>
                    <input type="text" name="" id="userName" placeholder="이름을 입력해주세요.">
                </div>

                <div>
                    <p>비밀번호</p>
                    <input type="password" name="" id="password" placeholder="비밀번호를 입력해주세요.">
                </div>

                <p class="btn red" onclick="go()">가입하기</p>
            </div>
        </div>

        <script src="./js/sign.js"></script>

    <?php
        include './footer.php';

        ?>
</body>
</html>