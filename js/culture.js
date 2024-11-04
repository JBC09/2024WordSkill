const typesBtn = document.querySelectorAll(".typesBtn");
const calBody = document.querySelector("#calBody");
const dateYear = document.querySelector("#dateYear");
const contentList = document.querySelector("#contentList");
const prevBtn = document.querySelector("#prevBtn");
const nextBtn = document.querySelector("#nextBtn");

let types = "일간";
let today = new Date();
let selectDay = today.getDate();
let maxDate;

let fsData;
let page = 0;


typesBtn.forEach(element => {
    element.addEventListener("click",(e)=>{
        typesBtn.forEach(element2 => {
            element2.classList.add("gold");
            element2.classList.remove("red");
        });

        types = element.textContent;
        element.classList.add("red");
        element.classList.remove("gold");

        drawFestivals();
    })

   
});

function drawFestivals() {
    

    let year = today.getFullYear();
    let month = today.getMonth();

    dateYear.innerHTML = `${year}. ${month+1}`;

    let startDay = new Date(year,month,1).getDay();
    let endDate = new Date(year,month+1,0).getDate();

    maxDate = endDate;

    let counts = 1;
    
    calBody.innerHTML = "";

    for(let i = 0; i < 6; i++){
        let tr= document.createElement("tr");
        for(let j = 0; j < 7; j++) {
            let td= document.createElement("td");

            if(i == 0 && j < startDay) {

            }
            else if(counts <= endDate) {
                td.id = `td${counts}`;

                td.addEventListener("click",(e)=>{
                    
                    selectDay = td.id.slice(2,100);
                    drawFestivals();
                })
                td.textContent = counts;
                counts++;
            }

            tr.appendChild(td);
        }
        
        calBody.appendChild(tr);
    }    


    if(types == "일간") {
        document.querySelector(`#td${selectDay}`).classList.add("active");
    }
    else if(types == "주간"){
        for (let index = 0; index < 7; index++) {
            try {
                
                document.querySelector(`#td${Number(selectDay)+index}`).classList.add("active");
            } catch (error) {
                
            }
        }
    }
    else {
        for (let index = 0; index < maxDate; index++) {
            try {
                document.querySelector(`#td${1+index}`).classList.add("active");
            } catch (error) {
                
            }
        }
    }

    searchData();
}

function prevMonth() {
    selectDay = 1;
    today.setMonth(today.getMonth() - 1);
    drawFestivals();
}

function nextMonth() {
    selectDay = 1;
    today.setMonth(today.getMonth() + 1);
    drawFestivals();
}

function searchData() {
    
    let year = today.getFullYear();
    let month = today.getMonth();

    let startDate, endDate;

    const newForm = new FormData();

    if(types == "일간") {
        startDate = `${year}-${month+1}-${selectDay}`;            
        endDate = `${year}-${month+1}-${selectDay}`;            
    }
    else if(types == "주간"){
        startDate = `${year}-${month+1}-${selectDay}`;            
        endDate = `${year}-${month+1}-${selectDay+6}`;
    }
    else {
        startDate = `${year}-${month+1}-${1}`;            
        endDate = `${year}-${month+1}-${maxDate}`;
    }

    newForm.append("start", startDate);
    newForm.append("end", endDate);


    fetch("./backend/festivalList.php",{
        method: "POST",
        body: newForm
    })
    .then((res) => res.json())
    .then((data) => {
        page = 0;
        fsData = data;
        drawFestivalList();
    })
}

prevBtn.addEventListener("click",(e)=>{
    if(page == 0) {
        e.preventDefault();
        return false;
    }

    page--;
    drawFestivalList();
})

nextBtn.addEventListener("click",(e)=>{
    if(page >= (fsData.length / 10) - 1) {
        e.preventDefault();
        return false;
    };
    

    page++;
    drawFestivalList();
})

function drawFestivalList(){
  
    prevBtn.classList.add("red");
    nextBtn.classList.add("red");


    prevBtn.classList.remove("gray");
    nextBtn.classList.remove("gray");

    if(page == 0) {
        prevBtn.classList.remove("red");
        prevBtn.classList.add("gray");
    }

    if(page >= (fsData.length / 10) - 1) {
        nextBtn.classList.remove("red");
        nextBtn.classList.add("gray");
    };

    contentList.innerHTML = "";
    let data = fsData.slice(page * 10, (page + 1) * 10);

    data.forEach(element => {
        contentList.innerHTML += `
             <div>
                <div class="img" style="background-image: url('./festivals/${element.img}');"></div>
                <div class="text">
                    <p>제목: ${element.title}
                    </p>
                    <p>날짜: ${element.startdate} ~ ${element.enddate}</p>
                    <p>장소: ${element.place}</p>
                    <p>분류: ${element.type}</p>
                </div>
            </div>
        `
    });
}



drawFestivals();