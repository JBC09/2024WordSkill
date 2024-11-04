let kw = {
    set() {
        fetch("./json/keywords.json")
        .then((res) => res.json())
        .then((data) => {
            kw.kData = data.data.sort((a,b) => Number(b.frequency) - Number(a.frequency));


            kw.kData.forEach(element => {
                let tr = document.createElement("tr");

                tr.innerHTML = `
                    <td>  <input type="checkbox" name="" id="" checked data-word="${element.word}" data-frequency="${element.frequency}"></td>
                    <td>${element.word}</td>
                `

                document.querySelector("#tbody").appendChild(tr);
            });

            kw.setWc();

            document.querySelectorAll("#keyword input").forEach(element => {
                    element.addEventListener("click",(e) => {
                        kw.setOn(e)
                        
                    })
            });
        })
    }
    ,setWc(){
        let cl = document.querySelector("#kWrap");

        cl.innerHTML = "";

        let clX = 330;
        let clY = 310;

        let wArr = [];

        kw.kData.forEach((element,key) => {
            let angle, coll, el, radius;

            let x, y;

            let fontSize = 64 - key * 2;

            angle = (key / kw.kData.length) * 2 * Math.PI;
            radius = (key + 1) * 7;

            do {
                
                angle += 0.2;
                radius += 0.2;
                coll = false;

                x = clX + radius * Math.sin(angle) - 50;
                y = clY + radius * Math.cos(angle) - 30;

                el = document.createElement("div");

                el.className = "word";
                el.style.top = y + "px";
                el.style.left = x + "px";
                el.innerHTML = `${element.word}`;
                cl.appendChild(el);
                el.style.fontSize = fontSize + "px";

                for (const wd of wArr) {
                    if(kw.isColl(el,wd)) {
                        coll = true;
                        cl.removeChild(el);
                        break;
                    }
                }
                
            }
            while(coll)


            wArr.push(el);
        });


    }
    ,isColl(_el, _wd) {
        let rect1 = _el.getBoundingClientRect();
        let rect2 = _wd.getBoundingClientRect();
        
        return !(
            rect1.right < rect2.left || 
            rect1.left > rect2.right || 
            rect1.bottom < rect2.top || 
            rect1.top > rect2.bottom 
        )

    },
    setOn(e){
        if(document.querySelectorAll("#keyword input:checked").length == 14) {
            e.preventDefault();
            return false;
        }

        let arr = [];

        document.querySelectorAll("#keyword input:checked").forEach(element => {
           arr.push({
                word: element.dataset.word,
                frequency: element.dataset.frequency,
           })
        });

        kw.kData = arr;

        kw.setWc()
    }
}

kw.set();