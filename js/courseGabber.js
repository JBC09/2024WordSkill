let Data;
let selectIdx;

const tbody = document.querySelector("#tbody");

fetch("./backend/courseList.php")
.then((res) => res.json())
.then((data) =>{

    Data= data;

    data.forEach((element,idx) => {

        if(element.count < 5) {
            return false;
        }

        let btn = `<p class="btnSmall gray">해설가신청</p>`

        
        if( element.gabber != loginId &&
            new Date(new Date(new Date().setDate(new  Date().getDate() + 7)).toISOString().slice(0,10)) < new Date(element.date.slice(0,10))) {
            btn = `<p class="btnSmall red" onclick="ok(${idx})">해설가신청</p>`
        }
        if(element.gabber == loginId) {
              btn = `<p class="btnSmall red" onclick="no(${idx})">신청취소</p>`
        }
         if(element.gabber != ""  &&  loginId != element.gabber) {
            btn = element.gabber;
        }

        tbody.innerHTML += `
            <td>${element.courseName}</td>
            <td>${element.date.slice(0,10)}</td>
            <td>${element.time}시</td>
            <td>${element.count}명</td>
            <td>${btn}</td>
        `;


    });
})

function ok(idx) {
    
    let element = Data[idx];
    const newForm = new FormData();

    newForm.append("pk", element.pk);
    newForm.append("courseName", element.courseName);
    newForm.append("start", `${element.date} 00:00:00`);
    newForm.append("end", `${element.date} 23:59:59`);


    fetch("./backend/courseOk.php",{
        method:"POST",
        body: newForm
    })
    .then((res) => res.json())
    .then((data) =>{
        if(data["state"] == "ok"){
            alert("코스 신청이 완료되었습니다.");
            location.reload();
        }
        else {
            alert("해당 날짜에 신청한 코스 정보가 있습니다.");
        }
    })
}


function no(idx) {
    
    let element = Data[idx];
    const newForm = new FormData();

    newForm.append("pk", element.pk);


    fetch("./backend/courseNo.php",{
        method:"POST",
        body: newForm
    })
    
    setTimeout(() => {
        alert("신청이 취소되었습니다.");
        location.reload();
    }, 100);
}


