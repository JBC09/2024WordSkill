

        <div id="wrap">
            <div class="form" id="sign">
                <div class="title">
                    <h1>COURSE INSERT</h1>
                    <h2>코스등록</h2>
                </div>

                <div>
                    <p>코스</p>
                    <select name="" id="courseName">
                        <option value="">코스선택</option>
                        <option value="창덕궁">창덕궁</option>
                        <option value="경복궁">경복궁</option>
                        <option value="신라">신라</option>
                    </select>
                </div>

                <div>
                    <p>코스진행날짜</p>
                    <input type="date" name="" id="date">
                </div>

                <div>
                    <p>시작시간</p>
                    <select name="" id="time">
                       
                    </select>
                </div>

                <div>
                    <p>코스 최대인원</p>
                    <input type="number" name="" id="person" min=5 max=20 value=5>
                </div>

                <p class="btn red" onclick="go()">코스등록</p>
            </div>

        </div>

        <script src="./js/courseAdmin.js"></script>
