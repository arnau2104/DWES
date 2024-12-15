const searchBox = document.getElementById("search-box");
let mainContent = document.querySelectorAll(".search-content h2");
let searchButton = document.querySelector(".search-button");
// console.log("hola soc dins el js");




searchBox.addEventListener('input', (e)=> {
    let searchtext = searchBox.value.toLowerCase();
    console.log(searchtext);

    mainContent.forEach((item, index) =>{
      
        // console.log(item.textContent.toLowerCase(), searchtext, item.textContent.toLowerCase().includes(searchtext));

        if(item.dataset.reservation.toLowerCase().includes(searchtext)) {
            item.parentElement.classList.add("visible");
            item.parentElement.classList.remove("hidden");
           
        }else{
            item.parentElement.classList.remove("visible");
            item.parentElement.classList.add("hidden");
          
        }

    });
})
