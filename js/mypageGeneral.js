const courseTbody = document.querySelector("#courseTbody");
const goodsList = document.querySelector("#goodsList");

fetch("./backend/courseUserList.php")
.then((res) => res.json())
.then((data) => {
    data.forEach(element => {

        let states = "";

        if(5 > element.count) {
            states = "인원부족";
        }

        if(element.maxPerson <= element.count){
            states = "해설가 대기"
        }

        if(element.gabber != "") {
            states = "대기 중"
        }

        if(element.date == new Date().toISOString().slice(0,10)) {
            states =  "코스 시작"
        }

        if(element.status == 1) {
            states = "코스 완료"
        }



        courseTbody.innerHTML += `
             <tr>
                <td>${element.courseName}</td>
                <td>${element.date.slice(0,10)}</td>
                <td>${element.time}시</td>
                <td>${element.count}명</td>
                <td>${element.count}명</td>
                <td>${element.gabber}</td>
                <td>${states}</td>
                <td>
                    <p class="btnSmall gray">취소</p>
                </td>
            </tr>
        `
    });
})

fetch("./backend/buyUserList.php")
.then((res) => res.json())
.then((data) =>{

    Data= data;

    data.forEach((element,idx) => {
       

        goodsList.innerHTML += `
            <div class="items">
                <div class="img" style="background-image:url('./goods/${element.img}')">

                </div>

                <div class="text">
                    <p>상품명: ${element.title}</p>
                    <p>개당: ${(element.price) / element.count}원</p>
                    <p>수량: ${element.count}개</p>
                    <p>총 금액: ${(element.price).toLocaleString('ko-kr')}원</p>
                    <p>날짜: ${element.date}</p>
                </div>
            </div>
        `
    });
})
