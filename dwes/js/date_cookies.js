let date_in = document.getElementById("date_in");
let date_out = document.getElementById("date_out");
const date = new Date();

date.setDate(date.getDate() + 1);





date_in.addEventListener('change', (e)=> {
    if(date_in.value.length != 0) {
    document.cookie = "date_in=" + date_in.value + "; expires=" + date + ";";
    }
})

date_out.addEventListener('change', (e)=> {
    if(date_out.value != "") {
    document.cookie = "date_out=" + date_out.value + "; expires=" + date + ";";
    }
})
