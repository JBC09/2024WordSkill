<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/quiz.css">

    <style>
        #wrap {
            margin: 100px auto 200px;
        }
    </style>
</head>
<body>
<?php
        include './header.php';

        ?>

    <canvas></canvas>

    <div id="wrap">
        <div id="quiz">
            <div class="title">
                <h1>QUIZ</h1>
                <h2>퀴즈 이벤트 참가</h2>
            </div>

            <div class="nav">
                <p class="btnSmall red" id="couponBtn">쿠폰발급</p>
                <p class="btnSmall gold" id="quizBtn">퀴즈시작</p>
                <select name="" id="courseSelect">
                    <option value="창덕궁">창덕궁</option>
                    <option value="경복궁">경복궁</option>
                    <option value="신라">신라</option>
                </select>

            </div>

            <div class="content">
                <div id="svgWrap">
                    <svg id="svgMap"></svg>

                    <div id="quizBox">
                        <h1 id="question"></h1>

                        <div id="answerBox"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div id="couponModal" class="modal">
        <div class="form">
            <div class="title">
                <h1>COUPON</h1>
                <h2>쿠폰발급</h2>
            </div>

            <div>
                <p>이름</p>
                <input type="text" name="" id="userName" placeholder="이름을 입력해주세요.">
            </div>
            
            <p class="btn red" onclick="makeCoupon()">발급하기</p>
        </div>

    </div>
    <div id="messageModal" class="modal"></div>

    <script src="./js/script.js"></script>
    <script src="./js/quiz.js"></script>
</body>
</html>