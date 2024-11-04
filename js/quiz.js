let quizData;
let selectQuizData;
let courseType = "창덕궁";
let quizRunning = false;
let isCoupon = false;
let fileHandle;
let courseCount = 0;
let page = 0;
let startHash;


const quizBox = document.querySelector("#quizBox");
const question = document.querySelector("#question");
const answerBox = document.querySelector("#answerBox");

const couponModal = document.querySelector("#couponModal");
const courseSelect = document.querySelector("#courseSelect");
const couponBtn = document.querySelector("#couponBtn");
const quizBtn = document.querySelector("#quizBtn");
const svgMap = document.querySelector("#svgMap");
const canvas = document.querySelector("canvas");
const ctx = canvas.getContext("2d");

canvas.width = 700;
canvas.height = 400;

let arr = ["창덕궁", "경복궁", "신라"];



quizBtn.addEventListener("click", async (e)=>{
    if(quizRunning) {
        showMessage("이미 퀴즈가 시작되었습니다!");
        return false;
    }

    if(arr[courseCount] != courseType) {
        showMessage("퀴즈 풀이 순서가 올바르지 않습니다.");
        return false;
    }

    [fileHandle] = await window.showOpenFilePicker({
        types: [{
            description: "Image files",
            accept: {"image/*": [".png"]}
        }]
    })

    let file = await fileHandle.getFile();

    let url = URL.createObjectURL(file);

    let img = new Image();

    img.onload = async () => {
        ctx.drawImage(img, 0, 0, 700, 400);

        startHash = await getHash(canvas.toDataURL());
        
        if(!localStorage.getItem(startHash)) {
            showMessage("정상 발행된 쿠폰이 아닙니다.");
            return false;
        }

        let data = localStorage.getItem(startHash);

        let count = 0;

        for (const element of arr) {
            if(data.includes(element)) {
                count++;
            }
        }

        if(count == 3) {
            showMessage("모든 퀴즈가 완료 된 스탬프 카드입니다.");
            return false;
        }

        if(data.includes(courseType)) {
            showMessage("이미 완료한 퀴즈입니다.");
            return false;
        }

        page = 0;
        quizRunning = true;
        viewQuestion();
    }

    img.src = url;
})

courseSelect.addEventListener("change",(e)=>{

    if(quizRunning) {
        showMessage("퀴즈가 진행 중 입니다.");
        e.preventDefault();
        courseSelect.value = courseType;
        return false;
    }
    courseType = e.target.value;

    reData();
    drawMap();
})





function viewQuestion() {
    quizBox.style.display = "none";
    if(page == 6) {
        quizRunning = false;

        let data = localStorage.getItem(startHash);
        let img = new Image();

        img.onload = async () => {
            data += ` ${courseType}`;
            ctx.drawImage(img, 0, 0, 700, 400);

            localStorage.removeItem(startHash);

            startHash = await getHash(canvas.toDataURL());
            
            localStorage.setItem(startHash, data);

            const blob = await new Promise(re => canvas.toBlob(re,"image/png"));
            const writable = await fileHandle.createWritable();
            await writable.write(blob);
            await writable.close();

            let count = 0;

            for (const element of arr) {
                if(data.includes(element)) {
                    count++;
                }
            }
    
            if(count == 3) {
                showMessage("모든 코스를 완주하였습니다.");
            }
            else {
                showMessage("축하합니다! 해당 코스 퀴즈풀이가 완료 되었습니다!");
            }
            courseCount++;
            if(courseCount == 3) {
                courseCount = 0;
            }
            quizRunning = false;
        }
        
        img.src = `../image/${courseType}.png`;
 
        page = 0;
        return false;
    }

    quizBox.style.display = "flex";
    answerBox.innerHTML ="";

    let element = selectQuizData[page];
    question.textContent = `${page+1}번 ${element.question}`;

    let quizs = suffle(suffle([...element.incorrect, element.correct]));

    quizs.forEach(val => {
        let p = document.createElement("p");
        p.textContent = val;
        answerBox.appendChild(p);

        p.addEventListener("click",(e)=>{
            if(val == element.correct) {
                answerBox.innerHTML = `
                    <p class="green">정답입니다!</p>
                `
                page++;
                document.querySelector(`#circle${page}`).classList.add("active");
            }
            else {
                answerBox.innerHTML = `
                <p class="red">오답입니다! 다시 풀어보세요!</p>
            `
            }

            setTimeout(() => {
                viewQuestion();
            }, 2000);
        })
    });
}


function suffle(arr) {
    return arr.sort(()=> Math.random() - 0.5);
}

function reData() {
    quizData.forEach(element => {
        if(element.name.includes(courseType)) {
            selectQuizData = element.quiz;
        }
    });

    drawMap();
}


function drawMap() {
    svgMap.style.backgroundImage = `url(./map/${courseType}.png)`;
    svgMap.innerHTML = ""


    for (let index = 0; index < selectQuizData.length-1; index++) {
        let line = document.createElementNS('http://www.w3.org/2000/svg', "line");
        
        let x1 = selectQuizData[index].location[0];
        let y1 = selectQuizData[index].location[1];

        let x2 = selectQuizData[index+1].location[0];
        let y2 = selectQuizData[index+1].location[1];

        line.setAttribute("x1", x1);
        line.setAttribute("y1", y1);
        line.setAttribute("x2", x2);
        line.setAttribute("y2", y2);

        svgMap.appendChild(line)
    }

    selectQuizData.forEach(element => {
        let circle = document.createElementNS('http://www.w3.org/2000/svg', "circle");
        let text = document.createElementNS('http://www.w3.org/2000/svg', "text");
        
        let x1 = element.location[0];
        let y1 = element.location[1];

        circle.setAttribute("cx", x1);
        circle.setAttribute("cy", y1);

        circle.id = `circle${element.idx}`

        text.setAttribute("x", x1);
        text.setAttribute("y", y1+7);
        text.textContent = element.idx;

        svgMap.appendChild(circle)
        svgMap.appendChild(text)
    });

}

async function getHash(msg) {
    let msgBuffer = new TextEncoder().encode(msg);
    let hashBuffer = await crypto.subtle.digest("SHA-256",msgBuffer);
    let hashArray = Array.from(new Uint8Array(hashBuffer));
    let hashHex = hashArray.map(b => b.toString(16).padStart(2,'0')).join('');

    return hashHex;
}


couponBtn.addEventListener("click",()=> {

    if(quizRunning) {
        showMessage("이미 퀴즈가 시작되어 쿠폰을 발급 받을 수 없습니다!");
        return false;
    }

    if(isCoupon){
        showMessage("스탬프 쿠폰은 1개만 발행가능합니다.");
        return false;
    }

    couponModal.style.display = "flex";
})


function makeCoupon() {
    const userName = document.querySelector("#userName");
    let date = new Date().toISOString().slice(0,10);

    let img = new Image();

    img.onload = async () => {
        ctx.drawImage(img, 0, 0, 700, 400);

        ctx.fillStyle = "black";
        ctx.fillText(userName.value, 520, 95);
        ctx.fillText(date, 520, 45);

        let link = document.createElement("a");

        link.download = `${new Date().toISOString()}${userName.value}.png`;
        link.href = canvas.toDataURL();
        link.click();

        localStorage.setItem(await getHash(canvas.toDataURL()) , "__");

        modalClose();
    }

    img.src = '../coupon/stamp_card.png';
    isCoupon = true;
}

fetch("./json/quiz.json")
.then((res) => res.json())
.then((data) => {
    quizData = data;

    reData();
  
})
