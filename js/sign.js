const userId = document.querySelector("#userId");
const userName = document.querySelector("#userName");
const password = document.querySelector("#password");
const tbody = document.querySelector("#tbody");

userId.addEventListener("input",(e)=>{
    userId.value = userId.value.replace(/[^a-zA-Z0-9]/g,"");
})


function go() {

    const inputs = document.querySelectorAll("#sign input");

    for (const element of inputs) {
        if(element.value == "") {
            alert("모든 입력값은 필수 항목입니다.");
            return false;
        }
    }

    const newForm = new FormData();

    newForm.append("userId", userId.value);
    newForm.append("userName", userName.value);
    newForm.append("password", password.value);

    fetch("./backend/backSign.php",{
        method:"POST",
        body: newForm
    })
    .then((res) => res.json())
    .then((data) =>{
        if(data["state"] == "ok"){
            alert("회원가입이 완료되었습니다.");
            location.href = "./index.php";
        }
        else {
            alert("사용중인 ID입니다.");
        }
    })
}


