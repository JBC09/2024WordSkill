const file = document.querySelector("#file");
const title = document.querySelector("#title");
const content = document.querySelector("#content");
const price = document.querySelector("#price");

function go() {
    const inputs = document.querySelectorAll("#goods input");

    for (const element of inputs) {
        if(element.value == "") {
            alert("모든 입력값은 필수 항목입니다.");
            return false;
        }
    }
    
    if(content.value == "") {
        alert("모든 입력값은 필수 항목입니다.");
        return false;
    }

    const newForm = new FormData();

    newForm.append("file", file.files[0]);
    newForm.append("title", title.value);
    newForm.append("content", content.value);
    newForm.append("price", price.value);

    fetch("./backend/goodsInsert.php",{
        method:"POST",
        body: newForm
    })
    alert("굿즈가 정상적으로 등록되었습니다.");
    
}


