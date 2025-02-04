<?php include_once ($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/header.php');?>

<?php include($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/pages/querys/query_reservation_select_byId.php');
      include($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/pages/querys/query_service_select.php'); 
?>

<main>
    <div class="max-w-md mx-auto bg-white p-6 rounded-lg shadow-md">
        <form name="form_service_reservation">
            <h1>Services</h1>
            <div class="mb-4">
                <label for="qty" class="block text-gray-700 font-bold mb-2">Number of persons</label>
                <input type="number" name="qty" id="qty" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-blue-500" value="0">
            </div>

            <div class="mb-4">
                <label for="service" class="block text-gray-700 font-bold mb-2">Service</label>
                <select name="service_id" id="service_id"  class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-blue-500">
                    <?php foreach($services as $service) { ?>
                        <option value="<?php echo $service['service_id']; ?>"> <?php echo ucfirst($service['service_id']) ?> </option>
                        <?php } ?>
                </select>
            </div>

            <div class="mb-4">
                <label for="rs_in" class="block text-gray-700 font-bold mb-2">Date</label>
                <select name="rs_date" id="rs_date" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-blue-500" onchange="showAvailableHours()">
                    <?php for($i= $reservation[0]['date_in']; $i <= $reservation[0]['date_out']; $i = date("Y-m-d", strtotime($i ."+ 1 days"))){ ?>
                        <option value="<?php echo $i; ?>"> <?php echo $i;?></option>
                    <?php } ?>   
                </select>
            </div>

            <div class="mb-4">
                <label for="rs_time" class="block text-gray-700 font-bold mb-2">Hour</label>
                <select name="rs_time" id="rs_time" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-blue-500"></select>
            </div>

        </form>
    </div>

</main>
<?php include_once ($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/footer.php');?>


<script>

    function showAvailableHours() {

        console.log("function active")
        
        let serviceId = document.form_service_reservation.service_id.value;
        let rsDate = document.form_service_reservation.rs_date.value;
        let qty = document.form_service_reservation.qty.value;

        dataToSend = `serviceId=${serviceId}&rsDate=${rsDate}&qty=${qty}`;

        const xhttp = new XMLHttpRequest();
            xhttp.onload = function () {  
                document.getElementById("rs_time").innerHTML = this.responseText;
            }
            xhttp.open("POST", "/student067/dwes/pages/ajax/ajax_get_available_hours.php",true);
            xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhttp.send(dataToSend);
        
    
    }
</script>