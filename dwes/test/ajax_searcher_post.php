<p>Start typing a name in the input field below:</p>
<p>Suggestions: <span id="txtHint" ></span></p>

<form name="name_form">
    First name: <input type="text" name="first_name" onkeyup="showHint()">
</form>

<script>
    function showHint() {
        let str = document.name_form.first_name.value;
        let dataToSend = `firstName=${str}`;
        console.log(str);
        xhttp.onload = function () {  
                document.getElementById("txtHint").innerHTML = this.responseText;
            }

        if(str.length == 0) {
            document.getElementById("txtHint").innerHTML = "";
            return;
        } else {
            const xhttp = new XMLHttpRequest();
            xhttp.open('POST', '/student067/dwes/test/gethintPost.php', true);
            xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhttp.send(dataToSend);
            xhttp.close();
        }
    }
</script>