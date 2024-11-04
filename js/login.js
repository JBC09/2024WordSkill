let randomV ;

const userId = document.querySelector("#userId");
const password = document.querySelector("#password");
const range = document.querySelector("#range");

const puzzleModal = document.querySelector("#puzzleModal");
const puzzleBox = document.querySelector("#puzzleBox");
const grayBox = document.querySelector("#grayBox");
const puzzle = document.querySelector("#puzzle");

range.addEventListener("input",(e)=>{
    puzzle.style.left = e.target.value + "px";
})

range.value = 0;


range.addEventListener("input",(e)=>{
    var gradient_value = 100 / event.target.attributes.max.value;
    event.target.style.background = 'linear-gradient(to right, #FFE283 0%, #FFE283 '+gradient_value * event.target.value +'%, rgb(236, 236, 236) ' +gradient_value *  event.target.value + '%, rgb(236, 236, 236) 100%)';
    puzzle.style.left = e.target.value + "px";
})


range.addEventListener("mouseup",(e)=>{
    let v =  Math.abs(e.target.value - randomV);

    if(v >= 80) {
       v = 0;
    }
    else {
        v = 100 -  v / 80 * 100;
    }

    alert(`일치율이 ${v.toFixed(2)}%입니다.`);
    
    if(v >= 90) {
        go();
    }
 

})

function showView() {

    const inputs = document.querySelectorAll("#login input");

    for (const element of inputs) {
        if(element.value == "") {
            alert("기입되지 않은 값이 있습니다.");
            return false;
        }
    }


    range.value = 0;
    puzzleModal.style.display = "flex";

    let idx = Math.ceil(Math.random() * 5);

    randomV = Math.ceil(Math.random() * 720);
    grayBox.style.left = randomV + "px";

    puzzleBox.style.backgroundImage = `url('../capcha/${idx}.jpg')`;
    puzzle.style.backgroundImage = `url('../capcha/${idx}.jpg')`;

    puzzle.style.backgroundPosition = `${-randomV}px 50%`
}


function go() {

  

    const newForm = new FormData();

    newForm.append("userId", userId.value);
    newForm.append("password", password.value);

    fetch("./backend/backLogin.php",{
        method:"POST",
        body: newForm
    })
    .then((res) => res.json())
    .then((data) =>{
        if(data["state"] == "ok"){
            alert("로그인에 성공하였습니다.");
            location.href = "./index.php";
        }
        else {
            alert("로그인에 실패하였습니다.");
        }
    })
}