<link rel="stylesheet" href="./css/style.css">


<?php
    session_start();

    function isLogin(){
        if(isset($_SESSION["userId"])){
            return true;
        }
        else {
            return false;
        }
    }

?>
<header>
        <div id="headerWrap">
            <a href="./index.php"><img src="./image/logo.png" alt="logo" title="logo" class="logo"></a>

            <input type="radio" name="bb" id="barsCheck" >
            <input type="radio" name="bb" id="barsCheck2" checked>

            <nav>
                <div>
                    <a href="#">소개</a>
                    <div>
                        <a href="./sub01.php">달빛기행축제란</a>
                        <a href="./wordCloude.php">지역별 달빛기행축제란</a>
                        <a href="./sub03.php">코스소개</a>
                    </div>
                </div>

                <div>
                    <a href="#">참여/소식</a>
                    <div>
                        <a href="#">공지사항</a>
                        <a href="./sub02.php">문화달력</a>
                        <a href="./quiz.php">퀴즈 이벤트 참가</a>
                    </div>
                </div>

                <div>
                    <a href="./goods.php">굿즈SHOP</a>
                </div>

                <div>
                    <a href="./course.php">예약하기</a>
                </div>

                <div>
                    <a href="./mypage.php">마이페이지</a>
                </div>

            </nav>


            <div>
                <input type="text" name="" id="" placeholder="검색어를 입력해주세요.">
                <p class="btnSmall gold">검색</p>
            </div>

            <div>
              
                <?php
                    if(isLogin()){

                        $userId = $_SESSION["userId"];
                        $userName = $_SESSION["userName"];
                        $grade = $_SESSION["grade"];

                        echo "<script>
                            let loginId = '$userId'
                        </script>";

                        echo '
                              <a href="#"><p class="btnSmall red">'.$userName.'</p></a>
                <a href="./logout.php"><p class="btnSmall red">로그아웃</p></a>
                        ';
                    }else {
                        echo '
                          <a href="./login.php"><p class="btnSmall red">로그인</p></a>
                <a href="./sign.php"><p class="btnSmall red">회원가입</p></a>';
                    }
                ?>

                <div>
                    <label for="barsCheck">
                        <svg id="bar" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--! Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) Copyright 2024 Fonticons, Inc. --><path d="M0 96C0 78.3 14.3 64 32 64H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 128 0 113.7 0 96zM0 256c0-17.7 14.3-32 32-32H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32c-17.7 0-32-14.3-32-32zM448 416c0 17.7-14.3 32-32 32H32c-17.7 0-32-14.3-32-32s14.3-32 32-32H416c17.7 0 32 14.3 32 32z"/></svg>
                    </label>
                    <label for="barsCheck2">
                        <svg id="xmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><!--! Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) Copyright 2024 Fonticons, Inc. --><path d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z"/></svg>
                    </label>
                </div>
            </div>
        </div>
    </header>    
