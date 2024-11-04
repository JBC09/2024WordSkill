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


    if (isLogin()) {

        echo "
                <script>
                    alert('로그인 된 회원은 접근할수 없습니다.');
                    location.href= 'index.php';
                </script>
                
            ";
    }
    ?>
    <link rel="stylesheet" href="./css/login.css">
    <div id="wrap">
        <div class="form" id="login">
            <div class="title">
                <h1>LOGIN</h1>
                <h2>로그인</h2>
            </div>

            <div>
                <p>아이디</p>
                <input type="text" name="" id="userId" placeholder="아이디를 입력해주세요.">
            </div>


            <div>
                <p>비밀번호</p>
                <input type="password" name="" id="password" placeholder="비밀번호를 입력해주세요.">
            </div>

            <p class="btn red" onclick="showView()">가입하기</p>
        </div>
    </div>



    <div class="modal" id="puzzleModal">
        <div id="puzzleWrap">
            <div class="title">
                <h1>PUZZLE</h1>
                <h2>퍼즐</h2>
            </div>

            <div id="puzzleBox">
                <div id="grayBox"></div>
                <div id="puzzle"></div>
            </div>

            <input type="range"  class="rangeInput" name="" id="range" min=0 max=720>
        </div>
    </div>


    <?php
    include './footer.php';

    ?>

    <script src="./js/login.js"></script>
</body>

</html>