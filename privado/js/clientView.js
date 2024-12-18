window.addEventListener("load", ()=>{
    const heart = document.getElementById("heart");
    const hearts = document.querySelectorAll(".card span");

    let filled = '"FILL" 1, "wght" 400, "GRAD" 0, "opsz" 24';


    hearts.forEach(element => element.addEventListener("click", ()=>{
        let state = element.style.fontVariationSettings;
        if(state != filled){
            console.log("holi if");
            element.style.fontVariationSettings = filled;
        }else{
            console.log("holi else");
            element.style.fontVariationSettings = '"FILL" 0, "wght" 400, "GRAD" 0, "opsz" 24';
        }
    }));
})