let extras = document.querySelectorAll(".extra");

let date = new Date();
let today = date.getFullYear() + "-" + date.getMonth() + "-" + date.getDate();




extras.forEach((extra)=> {
    let service = extra.querySelector('[id');
    let conceptSelect = extra.querySelector(".concept");
    let pServicePrice = extra.querySelector(".servicePrice");
    let interval130 = extra.querySelector(".interval-1-30");
    let interval1 = extra.querySelector(".interval-1-00");
    let schedule = extra.querySelector(".schedule");
    let dateTime_in = extra.querySelector(".dateTime_in");
    let dateTime_out = extra.querySelector(".dateTime_out");
    let unitPriceInput = extra.querySelector(".unit_price");

    console.log(service);
    function cambiarHorarioInterval1() {

        interval130.classList.remove("hidden");
        interval1.classList.remove("hidden");
        interval1.classList.add("hidden");
    }
        function cambiarHorarioInterval130() {
        interval1.classList.remove("hidden");
        interval130.classList.remove("hidden");
        interval130.classList.add("hidden");
        
    };




let servicePrice =  conceptSelect.options[conceptSelect.selectedIndex].id;
pServicePrice.innerText = servicePrice + "€";
unitPriceInput.value = servicePrice;

// cambiarHorario()

if(conceptSelect.value == "full_session" || conceptSelect.value == "massage_large") {   
    cambiarHorarioInterval1();
    }

if(conceptSelect.value == "standar_excursion" ) {   
        cambiarHorarioInterval130();
}else if(conceptSelect.value == "large_excursion") {
    cambiarHorarioInterval1();
};



conceptSelect.addEventListener("change" , (e)=> {
    let servicePrice =  conceptSelect.options[conceptSelect.selectedIndex].id;
    pServicePrice.innerText = servicePrice + "€";
    
    //SPA
    if(conceptSelect.value == "full_session" || conceptSelect.value == "massage_large") {   
    cambiarHorarioInterval1();
    }else if(conceptSelect.value == "sauna" || conceptSelect.value == "massage") {
        cambiarHorarioInterval130();
    }
    
    //excrusion a caballo
    if(conceptSelect.value == "standar_excursion" ) {   
        cambiarHorarioInterval130();

    }else if(conceptSelect.value == "large_excursion") {
    cambiarHorarioInterval1();
};
   
    unitPriceInput.value = servicePrice;
});

interval130.addEventListener('click', (e)=> {
   
    e.target.classList.toggle("bg-white");
    e.target.classList.toggle("text-blue-500");
    e.target.classList.toggle("scale-110");


    let time_in;
    let time_out;
    element = e.target.id;

   
    if(e.target.id) {
      time_in = element.substring(0,5);
      console.log(time_in);
      time_out = element.substring(8, element.length);
      console.log(time_out);

        dateTime_in.value = "2024-11-26T" + time_in;
        dateTime_out.value = "2024-11-26T" + time_out;

    }else {
        console.log("no te id");
    }
});

interval1.addEventListener('click', (e)=> {
   
    e.target.classList.toggle("bg-white");
    e.target.classList.toggle("text-blue-500");
    e.target.classList.toggle("scale-110");


    let time_in;
    let time_out;
    element = e.target.innerText;

    console.log(element);
   
      time_in = element.substring(0,5);
      console.log(time_in);
      time_out = element.substring(8, element.length);
      console.log(time_out);

  

        dateTime_in.value = today + "T" + time_in;
        dateTime_out.value = today + "T" + time_out;

    
});

})