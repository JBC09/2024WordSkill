const file = document.querySelector("#file");
const title = document.querySelector("#title");
const startdate = document.querySelector("#startdate");
const enddate = document.querySelector("#enddate");
const place = document.querySelector("#place");
const type = document.querySelector("#type");

function go() {
    const inputs = document.querySelectorAll("#admin input");

    for (const element of inputs) {
        if(element.value == "") {
            alert("모든 입력값은 필수 항목입니다.");
            return false;
        }
    }
    
    

    const newForm = new FormData();

    newForm.append("file", file.files[0]);
    newForm.append("title", title.value);
    newForm.append("startdate", startdate.value);
    newForm.append("enddate", enddate.value);
    newForm.append("place", place.value);
    newForm.append("type", type.value);

    fetch("./backend/cultureInsert.php",{
        method:"POST",
        body: newForm
    })

    alert("문화달력이 정상적으로 등록되었습니다.");
    location.reload();
}


