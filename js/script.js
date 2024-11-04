const modal = document.querySelectorAll(".modal");
const form = document.querySelectorAll(".modal > div");
const messageModal = document.querySelector("#messageModal");

modal.forEach(element => {
    element.addEventListener("click",(e)=>{
        modalClose();
    })
});

form.forEach(element => {
    element.addEventListener("click",(e)=>{
        e.stopPropagation();
        return false;
    })
});

function modalClose(){
    modal.forEach(element => {
        element.style.display = "none";
    });
}

function showMessage(msg) {
    messageModal.style.display = "flex";
    messageModal.innerHTML = `
        <div class="message">
            <h1>Message</h1>
            <p>${msg}</p>
        </div>
    `
}