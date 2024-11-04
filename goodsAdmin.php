<div id="wrap" >
    <div class="form" id="goods">
        <div class="title">
            <h1>GOODS</h1>
            <h2>굿즈등록</h2>
        </div>

        <div>
            <p>이미지</p>
            <input type="file" name="" id="file">
        </div>

        <div>
            <p>굿즈명</p>
            <input type="text" name="" id="title" placeholder="인형">
        </div>

        <div>
            <p>상세설명</p>
            <textarea name="" id="content"></textarea>
        </div>

        <div>
            <p>가격</p>
            <input type="number" name="" id="price" value=10000>
        </div>

        <p class="btn red" onclick="go()">굿즈등록</p>
    </div>
</div>

<script src="./js/goodsAdmin.js"></script>