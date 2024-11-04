let Data;
let selectIdx;
const reservationModal = document.querySelector("#reservationModal");
const name = document.querySelector("#name");
const tel = document.querySelector("#tel");
const email = document.querySelector("#email");
const person = document.querySelector("#person");

fetch("./backend/courseList.php")
.then((res) => res.json())
.then((data) =>{

    Data= data;

    data.forEach((element,idx) => {
        let btn = `<p class="btnSmall gray">예약</p>`

        if(element.count < 20 && new Date(new Date().toISOString().slice(0,10)) < new Date(element.date.slice(0,10))) {
            btn = `<p class="btnSmall red" onclick="showModals(${idx})">예약</p>`
        }

        tbody.innerHTML += `
            <td>${element.courseName}</td>
            <td>${element.date.slice(0,10)}</td>
            <td>${element.time}시</td>
            <td>${element.count}명</td>
            <td>${btn}</td>
        `
    });
})

function showModals(idx) {
    selectIdx = idx;

    reservationModal.style.display = "flex";
}

 
function ok() {
    
    const inputs = document.querySelectorAll("#reservationModal input");

    for (const element of inputs) {
        if(element.value == "") {
            alert("모든 입력값은 필수 항목입니다.");
            return false;
        }
    }


    let element = Data[selectIdx];

    if(person.value < 1 || person.value > 10) {
        alert("최소인원은 1명 최대인원은 10명입니다.");
        return false;
    }

    console.log(element.count);

    if(Number(element.count) + Number(person.value) > 20) {
        alert("20명 이상을 신청하실수 없습니다.");
        return false;
    }

    
    const newForm = new FormData();

    newForm.append("fk", element.pk);
    newForm.append("name", name.value);
    newForm.append("tel", tel.value);
    newForm.append("email", email.value);
    newForm.append("person", person.value);

    fetch("./backend/reservationInsert.php",{
        method:"POST",
        body: newForm
    })
    
    
    alert("예약이 완료되었습니다.");
    location.reload();
}