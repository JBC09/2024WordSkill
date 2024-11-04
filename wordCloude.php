<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/wordCloude.css">
</head>
<body>
<?php
        include './header.php';

        ?>


    <div id="wrap">
       <div id="keyword">
            <div class="title">
                <h1>KEYWORD</h1>
                <h2>키워드 분석</h2>
            </div>

          
            <div class="content">
                <div id="kWrap">
                    
                </div>

                <div id="tableWrap">
                    <table>
                        <thead>
                            <th>체크</th>
                            <th>키워드</th>
                        </thead>

                        <tbody id="tbody">

                        </tbody>
                    </table>
                </div>
            </div>
       </div>
    </div>

    <script src="./js/wordCloude.js"></script>
</body>
</html>