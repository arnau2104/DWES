<?php include_once ($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/header.php');?>
    <main>
    
    <!-- we read the extras from the reservation -->

    <?php 
    // $reservation_id = http_build_query(1);

    // $options = [
    //     'http' => [
    //         'method' => 'POST', //Especificamos que es una solicitud POST
    //         'header'  => "Content-type: application/x-www-form-urlencoded\r\n",  // Tipo de contenido
    //         'content' => $reservation_id,  // Los datos a enviar
    //     ]
    // ];

    // curl_init();

    
     include($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/pages/querys/query_reservation_select_byId.php');
    
    echo $reservation['extras_json'] ?? 'buit' . '<br>';
    print_r( $reservation);
    

    ?>


        <div class="my-8 max-w-md mx-auto bg-white p-6 rounded-lg shadow-md m-4 shadow-gray-700   w-96 flex flex-col extra">
            <form action="/student067/dwes/pages/forms/form_services.php" method="POST" >
                <h2 class="font-bold text-center text-xl pb-2" id="spa">SPA</h2>
                <img src="/student067/dwes/images/spa.jpg" alt="">
                <div class="flex gap-3 justify-center items-center mt-3">
                    <label for="concept" class="text-gray-700 font-bold mb-2">Service</label>
                    <select name="concept" id="concept" class="concept w-full px-4 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">>
                        <option id="30" value="full_session">Full experencie (1:30 hours)</option>  
                        <option id="20" value="massage">Massage (1 hour)</option>
                        <option id="25" value="massage_large">Massage (1:30 hours)</option>
                        <option id="15" value="sauna">Sauna (1 hour)</option>       
                    </select>

                    <p  class="servicePrice border border-gray-300 rounded-md shadow-sm  p-2"></p>
                </div>

            
            

                <div class=" schedule bg-gray-100 p-2 mt-2 rounded-md">
                    <div class="text-lg font-bold w-full text-center mb-4">Schedules</div>
                    <!-- Intervalo horarios de 1:30 horas -->
                    <div class=" interval-1-30 hidden flex flex-row flex-wrap gap-2 w-full">
                            <div class="p-2 bg-blue-500 text-white text-center rounded-md shadow-md text-sm hover:cursor-pointer">10:00 - 11:30</div>
                            <div class="p-2 bg-blue-500 text-white text-center rounded-md shadow-md text-sm hover:cursor-pointer" id="11:30 - 13:00">11:30 - 13:00</div>
                            <div class="p-2 bg-blue-500 text-white text-center rounded-md shadow-md text-sm hover:cursor-pointer" id="13:00 - 14:30">13:00 - 14:30</div>
                            <div class="p-2 bg-blue-500 text-white text-center rounded-md shadow-md text-sm hover:cursor-pointer" id="14:30 - 16:00">14:30 - 16:00</div>
                            <div class="p-2 bg-blue-500 text-white text-center rounded-md shadow-md text-sm hover:cursor-pointer" id="16:00 - 17:30">16:00 - 17:30</div>
                            <div class="p-2 bg-blue-500 text-white text-center rounded-md shadow-md text-sm hover:cursor-pointer" id="17:30 - 19:00">17:30 - 19:00</div>
                            <div class="p-2 bg-blue-500 text-white text-center rounded-md shadow-md text-sm hover:cursor-pointer" id="19:00 - 20:30">19:00 - 20:30</div>
                    </div>
                    <!-- Intervalo de 1 horas -->
                    <div class="interval-1-00 hidden flex flex-row flex-wrap gap-2 w-full">
                            <div class="p-2 bg-blue-500 text-white text-center rounded-md shadow-md text-sm hover:cursor-pointer" id="10:00 - 11:00">10:00 - 11:00</div>
                            <div class="p-2 bg-blue-500 text-white text-center rounded-md shadow-md text-sm hover:cursor-pointer" id="11:00 - 12:00">11:00 - 12:00</div>
                            <div class="p-2 bg-blue-500 text-white text-center rounded-md shadow-md text-sm hover:cursor-pointer" id="12:00 - 13:00">12:00 - 13:00</div>
                            <div class="p-2 bg-blue-500 text-white text-center rounded-md shadow-md text-sm hover:cursor-pointer" id="14:00 - 15:00">14:00 - 15:00</div>
                            <div class="p-2 bg-blue-500 text-white text-center rounded-md shadow-md text-sm hover:cursor-pointer" id="16:00 - 17:00">16:00 - 17:00</div>
                            <div class="p-2 bg-blue-500 text-white text-center rounded-md shadow-md text-sm hover:cursor-pointer" id="18:00 - 19:00">18:00 - 19:00</div>
                            <div class="p-2 bg-blue-500 text-white text-center rounded-md shadow-md text-sm hover:cursor-pointer" id="19:00 - 20:00">19:00 - 20:00</div>
                    </div>
                </div>
            
                <input type="number" name="reservation_id" value ="<?php echo $reservation_id; ?>" hidden>
                <input type="datetime-local" name="dateTime_in" class="dateTime_in" value="" hidden >
                <input type="datetime-local" name="dateTime_out" class="dateTime_out" value="" hidden>
                <input type="text" name="service" value="spa" hidden>
                <input type="number" name="unit_price" class="unit_price" value="" hidden >
                <button type="submit" name="submitExtras" class="bg-yellow-400 text-black px-4 py-2 rounded-lg hover:bg-yellow-300 transition-colors duration-200 mt-2">Book</button>
            </form>
        </div>   

    

        <!-- excursion a caballo -->
        <div class="my-8 max-w-md mx-auto bg-white p-6 rounded-lg shadow-md m-4 shadow-gray-700 w-96 flex flex-col extra">
            <form action="/student067/dwes/pages/forms/form_services.php" method="POST" >
                <h2 class="font-bold text-center text-xl pb-2" id="horse_excursion">Excursion a Caballo</h2>
                <img src="/student067/dwes/images/horse_excursion.jpg" alt="">
                <div class="flex gap-3 justify-center items-center mt-3">
                    <label for="concept" class="text-gray-700 font-bold mb-2">Service</label>
                    <select name="concept" class="concept w-full px-4 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">>
                        <option id="45" value="large_excursion">Large excursion (1:30 hours)</option>  
                        <option id="30" value="standar_excursion">Standar excursion (1 hour)</option>
                             
                    </select>

                    <p  class="servicePrice border border-gray-300 rounded-md shadow-sm  p-2"></p>
                </div>

            
            

                <div class=" schedule bg-gray-100 p-2 mt-2 rounded-md">
                    <div class="text-lg font-bold w-full text-center mb-4">Schedules</div>
                    <!-- Intervalo horarios de 1:30 horas -->
                    <div class=" interval-1-30 hidden flex flex-row flex-wrap gap-2 w-full">
                            <div class="p-2 bg-blue-500 text-white text-center rounded-md shadow-md text-sm hover:cursor-pointer" id="10:00 - 11:30">10:00 - 11:30</div>
                            <div class="p-2 bg-blue-500 text-white text-center rounded-md shadow-md text-sm hover:cursor-pointer" id="11:30 - 13:00">11:30 - 13:00</div>
                            <div class="p-2 bg-blue-500 text-white text-center rounded-md shadow-md text-sm hover:cursor-pointer" id="13:00 - 14:30">13:00 - 14:30</div>
                            <div class="p-2 bg-blue-500 text-white text-center rounded-md shadow-md text-sm hover:cursor-pointer" id="14:30 - 16:00">14:30 - 16:00</div>
                            <div class="p-2 bg-blue-500 text-white text-center rounded-md shadow-md text-sm hover:cursor-pointer" id="16:00 - 17:30">16:00 - 17:30</div>
                            <div class="p-2 bg-blue-500 text-white text-center rounded-md shadow-md text-sm hover:cursor-pointer" id="17:30 - 19:00">17:30 - 19:00</div>
                            <div class="p-2 bg-blue-500 text-white text-center rounded-md shadow-md text-sm hover:cursor-pointer" id="19:00 - 20:30">19:00 - 20:30</div>
                    </div>
                    <!-- Intervalo de 1 horas -->
                    <div class="interval-1-00 hidden flex flex-row flex-wrap gap-2 w-full">
                            <div class="p-2 bg-blue-500 text-white text-center rounded-md shadow-md text-sm hover:cursor-pointer" id="10:00 - 11:00">10:00 - 11:00</div>
                            <div class="p-2 bg-blue-500 text-white text-center rounded-md shadow-md text-sm hover:cursor-pointer" id="11:00 - 12:00">11:00 - 12:00</div>
                            <div class="p-2 bg-blue-500 text-white text-center rounded-md shadow-md text-sm hover:cursor-pointer" id="12:00 - 13:00">12:00 - 13:00</div>
                            <div class="p-2 bg-blue-500 text-white text-center rounded-md shadow-md text-sm hover:cursor-pointer" id="14:00 - 15:00">14:00 - 15:00</div>
                            <div class="p-2 bg-blue-500 text-white text-center rounded-md shadow-md text-sm hover:cursor-pointer" id="16:00 - 17:00">16:00 - 17:00</div>
                            <div class="p-2 bg-blue-500 text-white text-center rounded-md shadow-md text-sm hover:cursor-pointer" id="18:00 - 19:00">18:00 - 19:00</div>
                            <div class="p-2 bg-blue-500 text-white text-center rounded-md shadow-md text-sm hover:cursor-pointer" id="19:00 - 20:00">19:00 - 20:00</div>
                    </div>
                </div>

                <input type="number" name="reservation_id" value ="<?php echo $reservation_id; ?>" hidden>
                <input type="datetime-local" name="dateTime_in" class="dateTime_in" value="" hidden>
                <input type="datetime-local" name="dateTime_out" class="dateTime_out" value="" hidden>
                <input type="text" name="service" value="horse_excursion" hidden>
                <input type="number" name="unit_price" class="unit_price" value="" hidden >
                <button type="submit" name="submitExtras" class="self-center bg-yellow-400 text-black px-4 py-2 rounded-lg hover:bg-yellow-300 transition-colors duration-200 mt-2">Book</button>
            </form>
        </div>

       
    <?php  
    
    include($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/db_connection/db_connection.php');
    
    if(isset($_POST['submitExtras'])) {

        $service = $_POST['service'];
        $concept = $_POST['concept'];
        $dateTime_in = $_POST['dateTime_in'];
        $dateTime_out = $_POST['dateTime_out'];
        $unit_price = $_POST["unit_price"];
        $reservation_id = $_POST['reservation_id'];

        // Crear el JSON para extras_json
    $extras_json = json_encode([
        $service => [
            "concept" => $concept,
            "dateTime_in" => $dateTime_in,
            "dateTime_out" => $dateTime_out,
            "unitPrice" => $unit_price
        ] ,
        "restaurant" => [
            "concept" => "dinner" ,
            "dateTime_in" => "2024-11-26T20:00",
            "dateTime_our" => "2024-11-26T22:00",
            "unit_price" => 89
        ]
    ]);

        $sql = "UPDATE 067_reservations SET extras_json = '$extras_json' WHERE reservation_id = $reservation_id;";

            $result = mysqli_query($conn, $sql);
            
            
            $sql2 = "SELECT * FROM 067_reservations WHERE reservation_id = 1;";
            $result2 = mysqli_query($conn, $sql2);
            $reservation2 = mysqli_fetch_assoc($result2);
            
            print_r($reservation2['extras_json']);



     

    }else {
        echo "ningun resultado encontrado";
    };
    
    ?>

    <!-- <aside class="float-right bg-rose-500 h-full absolute top-20 right-0">
        <h1>Serices Bookeds unitl Now:</h1>

         <ul>
            <li><?php// echo $service . $concept . "-->Price: " . $unit_price ; ?></li>
        </ul> 

    </aside> -->



    </div>
      
    </main>

    <script src="/student067/dwes/js/extras.js"></script>
   <?php include_once ($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/footer.php');?>

