const searchBox = document.getElementById("search-box");
let mainContent = document.querySelectorAll(".reservation-title");
let searchButton = document.querySelector(".search-button");
// console.log("hola soc dins el js");


document.addEventListener("DOMContentLoaded", ()=>{

    if(searchBox){
        searchBox.addEventListener('input', (e)=> {
            let searchtext = searchBox.value.toLowerCase();
            console.log(searchtext);

            mainContent.forEach((item, index) =>{

                // Make data-reservation a JavaScript object
                let reservationData = JSON.parse(item.dataset.reservation);

                 // Join the object values in one search strinig
                let searchableText = Object.values(reservationData).join(" ").toLowerCase();
                

                if(searchableText.includes(searchtext)) {
                    item.parentElement.classList.add("visible");
                    item.parentElement.classList.remove("hidden");
                
                }else{
                    item.parentElement.classList.remove("visible");
                    item.parentElement.classList.add("hidden");
                
                }

            });
        })
    }
})
