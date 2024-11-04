const courseName = document.querySelector("#courseName");
const date = document.querySelector("#date");
const time = document.querySelector("#time");
const person = document.querySelector("#person");


for(let i = 0; i < 24; i++) {
    let op = document.createElement("option");

    op.textContent = i+"시";

    op.value = i;

    time.appendChild(op);
}

function go(){
    if(person.value < 5 || person.value > 20) {
        alert("코스의 최소인원은 5명 최대인원은 20명입니다.");
        return false;
    }

    if(courseName.value == "" || date.value == "") {
        alert("코스와 날짜를 선택해주세요.");
        return false;
    }

    const newForm = new FormData();

    newForm.append("courseName",courseName.value);
    newForm.append("date",`${date.value} ${time.value}:00:00`);
    newForm.append("time",time.value);
    newForm.append("person",person.value);

    fetch("./backend/courseInsert.php",{
        method:"POST",
        body: newForm
    })
    .then((res) => res.json())
    .then((data) =>{
        if(data["state"] == "ok"){
            alert("코스가 등록되었습니다.");
            location.href = "./index.php";
        }
        else {
            alert("중복된 날짜입니다.");
        }
    })
}



