<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="./css/style.css">


    <title>Document</title>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<?php
        include './header.php';

        ?>



   
    <div id="wrap">
        <div id="intro">
            <div class="title">
                <h1>FESTIVAL INTRODUCE</h1>
                <h2>축제소개영역</h2>
            </div>

            <div class="content">
                <div id="introText">
                    <h1>Introduce</h1>

                    <p>새로운 시작, 문화의 향연</p>

                    <p>저희 '달빛기행축제'는 전국의 문화 유산들을 같이 걷고 여행하며 <br> 되돌아보고 여행해 보자는 의도로 기획되었습니다. <br> 여러분도 저희 '달빛기행축제'에 참여하여 여러 명소들을 들러보세요!
                    </p>

                    <span>* 본 이벤트는 달빛기행축제에서 진행하는 이벤트 입니다.</span>

                    <p class="btnSmall white">더보기</p>
                </div>
                <div id="introImage"></div>

                <div class="tri big" style="right: -5%; bottom: 0%;"></div>
                <div class="tri " style="left: 48%; bottom: 0%;"></div>
            </div>
        </div>


        <div id="rule">
            <div class="title">
                <h1>RULE</h1>
                <h2>이용수칙</h2>
            </div>

            <div class="content">
                <div>
                    <h1>01</h1>
                    <p>
코스를 진행하는 도중 마음대로 이탈하지 말아주세요.</p>
                </div>

                <div>
                    <h1>02</h1>
                    <p>
                        코스를 시작하고 해설가가 설명해 주는 내용을 잘 들어주세요.</p>
                </div>

                <div>
                    <h1>03</h1>
                    <p>해설을 받을때는 해설가의 목소리가 잘 들릴 수 있도록 조용히 있어주세요.</p>
                </div>

                <div>
                    <h1>04</h1>
                    <p>코스 내에 있는 먹거리 외에 다른 먹거리(음료 및 생수등은 제외)는 가져오지 말아주세요.</p>
                </div>
                
            </div>
        </div>


        <div id="map">
            <div class="title">
                <h1>VIEW COURSE MAP</h1>
                <h2>관람동선</h2>
            </div>

            <div class="content">
                <div id="mapWrap">
                    <svg id="svgMap">
                        <line x1="350" y1="120" x2="400" y2="80" class="reds"></line>
                        <line x1="400" y1="80" x2="450" y2="85" class="reds"></line>
    
                        <circle cx="350" cy="120"  class="reds"></circle>
                        <circle cx="400" cy="80" class="reds"></circle>
                        <circle cx="450" cy="85" class="reds"></circle>
    
    
                        <!-- 오렌지 -->
                        <line x1="350" y1="200" x2="330" y2="250" class="oranges"></line>
                        <line x1="330" y1="250" x2="370" y2="280" class="oranges"></line>
    
                        <circle cx="350" cy="200" class="oranges"></circle>
                        <circle cx="330" cy="250" class="oranges"></circle>
                        <circle cx="370" cy="280"  class="oranges"></circle>
    
                        <!-- 핑크 -->
                        <line x1="450" y1="180" x2="500" y2="220" class="pink"></line>
                        <line x1="500" y1="220" x2="450" y2="270" class="pink"></line>
    
                        <circle cx="450" cy="180" class="pink"></circle>
                        <circle  cx="500" cy="220"   class="pink"></circle>
                        <circle cx="450" cy="270" class="pink"></circle>
                    </svg>

                    <div id="mapView">
                        <div>
                            <h1>RED COURSE</h1>
                            <p>
                                레드코스는 경기도 및 강원도 지역을 <br> 중점으로 구경할 수 있는  한 코스입니다.
                            </p>
                        </div>
                        <div>
                            <h1>ORANGE COURSE</h1>
                            <p>
                                오렌지코스는 충청도 및 전라도 지역을 <br> 중점으로 구경할 수 있는  한 코스입니다.
                            </p>
                        </div>
                        <div>
                            <h1>PINK COURSE</h1>
                            <p>
                                핑크코스는 경상북도 지역을  <br> 중점으로 구경할 수 있는  한 코스입니다.
                            </p>
                        </div>
                    </div>
                </div>

                <div id="mapText">
                    <h1>대한민국의 축제 코스를 <br> 
                    <span>한눈에</span></h1>

                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quas, laudantium?</p>

                    <p class="btnSmall white">더보기</p>
                </div>
            </div>
        </div>
    </div>

    <footer>
        <div id="footerWrap">
            <img src="./image/logo.png" alt="img" title="img" class="logo">

            <p>
                [Copyright]
- © Moonlight Travel Festival all rights reserved.
            </p>

            <div id="social">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) Copyright 2024 Fonticons, Inc. --><path d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z"/></svg>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--! Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) Copyright 2024 Fonticons, Inc. --><path d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"/></svg>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) Copyright 2024 Fonticons, Inc. --><path d="M512 256C512 114.6 397.4 0 256 0S0 114.6 0 256C0 376 82.7 476.8 194.2 504.5V334.2H141.4V256h52.8V222.3c0-87.1 39.4-127.5 125-127.5c16.2 0 44.2 3.2 55.7 6.4V172c-6-.6-16.5-1-29.6-1c-42 0-58.2 15.9-58.2 57.2V256h83.6l-14.4 78.2H287V510.1C413.8 494.8 512 386.9 512 256h0z"/></svg>
            </div>
        </div>
    </footer>
</body>
</html>