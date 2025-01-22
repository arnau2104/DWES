


document.addEventListener('DOMContentLoaded', function() {
  
  let profile_photo = document.getElementById("profile_photo");

  profile_photo.addEventListener('click', (e)=>{
    let btn_log_out = document.querySelector(".log_out");
    // btn_log_out.classList.add("inline");
    btn_log_out.classList.toggle("hidden");

    let username = document.querySelector(".username"); 
    username.classList.toggle("hidden");
  })




  });