let Data;

const goodsList = document.querySelector("#goodsList");
const couponBtn = document.querySelector("#couponBtn");
const canvas = document.querySelector("canvas");
const ctx = canvas.getContext("2d");
const buyList = document.querySelector("#buyList");

canvas.width = 700;
canvas.height = 400;

let fileHandle;
let discount = -1;
let startHash;

couponBtn.addEventListener("click",async ()=>{
    [fileHandle] = await window.showOpenFilePicker({
        types: [{
            description: "Image files",
            accept: {"image/*": [".png"]}
        }]
    })

    let arr = ["창덕궁", "경복궁", "신라"];

    let file = await fileHandle.getFile();

    let url = URL.createObjectURL(file);

    let img = new Image();

    img.onload = async () => {
       
        ctx.drawImage(img, 0, 0, 700, 400);

        startHash = await getHash(canvas.toDataURL());
        
        console.log("Dasdsa");
        
        if(!localStorage.getItem(startHash)) {
            alert("정상 발행된 쿠폰이 아닙니다");
            return false;
        }

        let data = localStorage.getItem(startHash);

        let count = 0;

        if(data.includes("use")) {
            alert("이미 사용한 쿠폰입니다.");
            return false;
        }

        for (const element of arr) {
            if(data.includes(element)) {
                count++;
            }
        }

        if(count == 3) {
            discount = 20;
        }
        else if(count == 2) {
            discount = 10
        }
        else if(count == 1){
            discount = 5
        }
        else {
            discount = 0;
        }
        
        alert(`할인율은 ${discount}% 입니다`);

        drawBuyList();
    }

    img.src = url;
})

const buyListMap = new Map();

fetch("./backend/goodsList.php")
.then((res) => res.json())
.then((data) =>{

    Data= data;

    data.forEach((element,idx) => {
       

        goodsList.innerHTML += `
            <div class="items">
                <div class="img" style="background-image:url('./goods/${element.img}')">

                </div>

                <div class="text">
                    <p>${element.title}</p>
                    <p>${(element.price).toLocaleString('ko-kr')}원</p>
                    <p>${element.content}</p>
                    <p class="btn gold" onclick="add(${idx})">장바구니 추가</p>

                </div>
            </div>
        `
    });
})

function add(idx) {
    let element = Data[idx];

    if(buyListMap.has(element)){
        buyListMap.set(element, buyListMap.get(element) + 1);
    }
    else {
        buyListMap.set(element,1);
    }

    drawBuyList()
}

function allBuy() { 


    alert("전체 구매가 완료되었습니다.");

    buyListMap.forEach((key, element) => {
        buyInsert(element,key);
    });

    buyListMap.clear();

    localStorage.setItem(startHash, localStorage.getItem(startHash) + " use");
    discount = -1;
    drawBuyList();
}

function isBuy(idx) {

    alert("구매되었습니다.");

    buyListMap.forEach((key,element) => {
        if(element.pk ==  idx){
            buyInsert(element,key);
            
            buyListMap.delete(element);
        }
    });

    localStorage.setItem(startHash, localStorage.getItem(startHash) + " use");
    discount = -1;
    drawBuyList();
}


function buyInsert(element,key) {
    const newForm = new FormData();

    let value = element.price * key;

    if(discount != -1) {
        value = value / 100 * (100 - discount);
    }

    newForm.append("goodsPk", element.pk);
    newForm.append("count", key);
    newForm.append("price", value);

    fetch("./backend/buyInsert.php",{
        method:"POST",
        body: newForm
    })
    
}

function drawBuyList() {

    console.log(buyListMap);
    
    buyList.innerHTML = "";

    buyListMap.forEach((key,element) => {

        let value = element.price * key;

        let dis = "";

        if(discount != -1) {
            value = value / 100 * (100 - discount);

             dis = `
                <p>할인율: ${discount}%</p>
                <p>할인가: ${Math.round(value).toLocaleString('ko-kr')}원</p>
            `;
        }

        buyList.innerHTML += `
            <div class="items">
                <div class="img" style="background-image:url('./goods/${element.img}')">

                </div>

                <div class="text">
                    <p>${element.title}</p>
                    <p>기존금액: ${(element.price * key).toLocaleString('ko-kr')}원</p>
                    
                    <p>수량: ${key}개</p>
                    ${dis}
                    <p class="btnSmall red" onclick="isBuy(${element.pk})">개별구매</p>

                </div>
            </div>
        `
    });
}


async function getHash(msg) {
    let msgBuffer = new TextEncoder().encode(msg);
    let hashBuffer = await crypto.subtle.digest("SHA-256",msgBuffer);
    let hashArray = Array.from(new Uint8Array(hashBuffer));
    let hashHex = hashArray.map(b => b.toString(16).padStart(2,'0')).join('');

    return hashHex;
}