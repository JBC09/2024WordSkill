
const gabberBody = document.querySelector("#gabberBody");

fetch("./backend/courseGabberList.php")
.then((res) => res.json())
.then((data) => {
   
    data.forEach(element => {

        let states = "대기 중";

        if(new Date().getHours() ==  element.time) {
            states == "<p class='btnSmall red'>완료</p>"
        }

        if(element.status == 1) {
            states = "코스 완료";
        }

        gabberBody.innerHTML += `
             <tr>
                <td>${element.courseName}</td>
                <td>${element.date.slice(0,10)}</td>
                <td>${element.time}시</td>
                <td>${element.count}명</td>
                <td>${states}</td>
               
            </tr>
        `
    });
})


function okCourse(pk){
    const newForm = new FormData();

    newForm.append("pk", pk);

    fetch("./backend/")
}