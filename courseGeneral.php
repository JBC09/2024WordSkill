<div id="wrap">
    
<div id="courseList">
                <div class="title">
                    <div class="title">
                        <h1>COURSE LIST</h1>
                        <h2>코스 리스트</h2>
                    </div>

                    <table id="tableList">
                        <thead>
                            <th>코스이름</th>
                            <th>코스진행날짜</th>
                            <th>시작시간</th>
                            <th>예약인원</th>
                            <th>예약버튼</th>
                        </thead>

                        <tbody id="tbody"></tbody>
                    </table>
                </div>
            </div>
</div>

<div class="modal" id="reservationModal">
    <div class="form">
        <div class="title">
            <h1>RESERVATION</h1>
            <h2>예약하기</h2>
        </div>

        <div >
            <p>이름</p>
            <input type="text" name="" id="name" placeholder="이름을 입력하세요">
        </div>

        <div >
            <p>전화번호</p>
            <input type="tel" name="" id="tel" placeholder="전화번호를 입력하세요">
        </div>

        <div >
            <p>이메일</p>
            <input type="email" name="" id="email" placeholder="이메일을 입력하세요">
        </div>

        <div >
            <p>참가인원</p>
            <input type="number" min=1 max=10 value=5 name="" id="person" placeholder="참가인원을 입력하세요">
        </div>


        <p class="btn red" onclick="ok()">예약하기</p>
    </div>
</div>

<script src="./js/courseGeneral.js"></script>