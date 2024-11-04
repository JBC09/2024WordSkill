let courseData;
let selectCourseData;
let courseType = "창덕궁";

const svgMap = document.querySelector("#svgMap");
const distanceModal = document.querySelector("#distanceModal");
const btns = document.querySelectorAll('.btns');
const dataDivs = document.querySelectorAll('.data div');

let start = document.querySelector("#start");
let end = document.querySelector("#end");

let arr = [];
let visit = Array(10).fill(false);

btns.forEach(element => {
    element.addEventListener("click", (e) => {
        btns.forEach(element2 => {
            element2.classList.add("gray");
            element2.classList.remove("red");
        });

        element.classList.add("red");
        element.classList.remove("gray");

        courseType = element.textContent;

        reData();
    })
});

fetch("./json/course.json")
    .then((res) => res.json())
    .then((data) => {
        courseData = data;

        reData();

    })


function reData() {
    courseData.forEach(element => {
        if (element.name.includes(courseType)) {
            selectCourseData = element.pointer;
        }
    });

    dataDivs.forEach(element => {
        element.style.display = "none";

        if (element.id == courseType) {
            element.style.display = "flex";
        }
    });

    drawMap();

    drawPath()
}

function timeFormat(time) {

    let minute = Math.round(time / 60);
    let seond = Math.round(time % 60);

    if (minute < 10) {
        minute = `0${minute}`;
    }

    if (seond < 10) {
        seond = `0${seond}`;
    }

    return `${minute}분 ${seond}초`
}

function drawPath() {
    distanceModal.style.display = "flex";
    arr = [];



    visit = Array(10).fill(false);

    if (Number(start.value) == Number(end.value)) {
        distanceModal.innerHTML = `
             <div class="form">
                <div class="title">
                    <h1>SHORTEST PATH</h1>
                    <h2>최단경로</h2>
                </div>


                <div>
                    <p>거리</p>
                    <p>0m</p>
                </div>

                <div>
                    <p>시간</p>
                    <p>0분 0초</p>
                </div>

                <div>
                    <p>경로</p>
                    <p>${Number(start.value)}</p>
                </div>
            </div>
        `
    }
    else {

        visit[Number(start.value)] = true;
        func(Number(start.value), `${Number(start.value)}번`, 0);

        arr = arr.sort((a, b) => a[1] - b[1]);

        console.log(arr);

        console.log(arr);

        let time = timeFormat(arr[1][1] / 3);

        distanceModal.innerHTML = `
             <div class="form">
             <div class="title">
                    <h1>SHORTEST PATH</h1>
                    <h2>최단경로</h2>
                </div>

                <div>
                    <p>거리</p>
                    <p>${Math.round(arr[0][1])}m</p>
                </div>

                <div>
                    <p>시간</p>
                    <p>${time}</p>
                </div>

                <div>
                    <p>경로</p>
                    <p>${arr[0][0]}</p>
                </div>
            </div>
        `
    }




}

function func(idx, str, distance) {
    if (Number(end.value) == idx) {
        arr.push([str, distance]);
        return false;
    }

    for (let index = 0; index < selectCourseData[idx - 1].link.length; index++) {
        let links = selectCourseData[idx - 1].link[index];

        if (visit[links]) {
            continue;
        }

        let x1 = selectCourseData[idx - 1].location[0];
        let y1 = selectCourseData[idx - 1].location[1];

        let x2 = selectCourseData[links - 1].location[0];
        let y2 = selectCourseData[links - 1].location[1];

        let newDis = Math.sqrt(Math.pow(x1 - x2, 2) + Math.pow(y1 - y2, 2)) + distance;


        visit[links] = true;
        func(links, `${str} -> ${links}번`, newDis);
        visit[links] = false;
    }
}

function drawMap() {
    svgMap.style.backgroundImage = `url(./map/${courseType}.png)`;
    svgMap.innerHTML = ""


    selectCourseData.forEach(element => {

        let x1 = element.location[0];
        let y1 = element.location[1];

        element.link.forEach(link => {
            let line = document.createElementNS("http://www.w3.org/2000/svg", "line");
            let x2 = selectCourseData[link - 1].location[0];
            let y2 = selectCourseData[link - 1].location[1];

            line.setAttribute("x1", x1);
            line.setAttribute("y1", y1);
            line.setAttribute("x2", x2);
            line.setAttribute("y2", y2);
            svgMap.appendChild(line);

        });
    });

    selectCourseData.forEach(element => {
        let circle = document.createElementNS('http://www.w3.org/2000/svg', "circle");
        let text = document.createElementNS('http://www.w3.org/2000/svg', "text");

        let x1 = element.location[0];
        let y1 = element.location[1];

        circle.setAttribute("cx", x1);
        circle.setAttribute("cy", y1);

        circle.id = `circle${element.idx}`

        text.setAttribute("x", x1);
        text.setAttribute("y", y1 + 7);
        text.textContent = element.idx;

        svgMap.appendChild(circle)
        svgMap.appendChild(text)
    });

}





