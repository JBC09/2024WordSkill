<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/main.css">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>
<body>
<?php
        include './header.php';

        ?>

    <div id="visual">
        <div id="imgWrap">
            <div style="background-image: url('./image/3.jpg');">
                <h1>01</h1>
            </div>
            <div style="background-image: url('./image/1.jpg');">
                <h1>02</h1>
            </div>
            <div style="background-image: url('./image/2.jpg');">
                <h1>03</h1>
            </div>
            <div style="background-image: url('./image/3.jpg');">
                <h1>01</h1>
            </div>
        </div>

        <div class="tri" style="left: 35%; bottom: 0%;"></div>
        <div class="tri" style="left: -6%; bottom: 0%;"></div>
        <div class="tri" style="left: -6%; bottom: 0%;"></div>


        <div class="tri reverse big" style="left: -6%; top: 0%;"></div>
     

        <div class="tri reverse big" style="right:10%; top: 0%;"></div>
        <div class="tri big" style="right: 10%; bottom: 0%;"></div>

        <div class="tri reverse big" style="right:17%; top: 0%;"></div>
        <div class="tri big" style="right: 17%; bottom: 0%;"></div>


        <img src="./image/back.png" alt="img" title="img" id="back">
        <div id="text"> 

            <h1>WELCOME TO <br>
            KOREA FESTIVAL</h1>

            <div id="tab">
                <p>조화로운 한국의 축제를 볼 수 있는 곳</p>
                <p>시원한 바람과 물결이 몰아치는 곳</p>
                <p>사랑하는 사람과 함께 어울리는 곳</p>
            </div>

            <p class="btnSmall red">더보기</p>

            <div id="miri">
                
            </div>
        </div>

    </div>


    <div id="wrap">
        <div id="notice">

            <div class="title">
                <h1>NOTICE</h1>
                <h2>공지사항</h2>
            </div>

            <input type="radio" name="notice" id="n1" checked>
            <input type="radio" name="notice" id="n2">
            <input type="radio" name="notice" id="n3">

            <div class="nav">
                <label for="n1"><p>문화</p></label>
                <label for="n2"><p>교육</p></label>
                <label for="n3"><p>체험</p></label>
            </div>

     

            <div class="content">
                <div>
                    <div>
                        1.
                        제목 : 사랑만 남기는 문화들
                        <br>날짜 : 2024-05-02
                    </div>
                    <div>
                        2.
제목 : 문화체험, 모든 것을 놀이 하듯이
<br>날짜 : 2024-04-19
                    </div>
                    <div>
                        3.
제목 : 함께하면 더욱 즐거운 문화축제
<br>날짜 : 2024-03-15
                    </div>

                    <div>
                        4.
                        제목 : 달빛과 함께 하는 문화축제
<br>날짜 : 2024-02-25
                    </div>
                    <div>
                        5.
                        제목 : 다시 도약하는 전통, 함께 즐기는 문화
<br>날짜 : 2024-01-02
                    </div>
                    <div class="img" style="background-image: url('./image/28.jpg');"></div>
                </div>

                <div>
                    <div>
                        1.
                        제목 : 잊을 수 없는 역사, 그 날의 진실
<br>날짜 : 2024-04-24
                    </div>
                    <div>
                        2. 
제목 : 재밌게 배우는 문화활동
<br>날짜 : 2024-04-20
                    </div>
                    <div>
                        3.
제목 : 더욱 생생하게, 현장체험실습
<br>날짜 : 2024-03-21

                    </div>

                    <div>
                        4.
제목 : 한국에는 이런 문화까지 있다
<br>날짜 : 2024-02-29
                    </div>
                    <div>
                        5.
제목 : 다시 시작하는 역사 돌아보기
<br>날짜 : 2024-01-30
                    </div>
                    <div class="img" style="background-image: url('./image/35.jpg');"></div>
                </div>


                <div>
                    <div>
                        1.
제목 : 이렇게 다양한 우리 문화들
<br>날짜 : 2024-04-29
                    </div>
                    <div>
                        2.
제목 : 역사 속의 물건들 체험하기
<br>날짜 : 2024-03-25
                    </div>
                    <div>
                        3.
제목 : 모든게 새로워진 달빛기행 축제
<br>날짜 : 2024-03-14

                    </div>

                    <div>
                        4.
제목 : 100년전 그 날, 다시보는 과거
<br>날짜 : 2024-03-10
                    </div>
                    <div>
                        
5.
제목 : 새로운 여행, 또 다른 시작
<br>날짜 : 2024-01-31
                    </div>
                    <div class="img" style="background-image: url('./image/44.jpg');"></div>
                </div>
            </div>
        </div>

        <div id="gallery">
            <div class="title">
                <h1>GALLERY</h1>
                <h2>갤러리</h2>
            </div>


            <div class="content">
                <div id="gal">
                    <div style="background-image: url('./image/19.jpg');">
                        <h1>은은한 달빛이 비치는 물결을 따라서</h1>
                    </div>
                    <div style="background-image: url('./image/26.jpg');">
                        <h1>
                            우뚝선 5층 목탑이 뿜어내는 밝은 빛을
                        </h1>
                    </div>
                    <div style="background-image: url('./image/28.jpg');">
                        <h1>불국사의 풍경이 한눈에 펼쳐지는 경주</h1>
                    </div>
                </div>

                <div id="galText">
                    <h1>대한민국의 <br>아름다운 사진들</h1>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Fugiat, voluptate.</p>
                    <p class="btnSmall white">더보기</p>
                </div>
            </div>
        </div>
    </div>

    <?php
        include './footer.php';

        ?>
</body>
</html>