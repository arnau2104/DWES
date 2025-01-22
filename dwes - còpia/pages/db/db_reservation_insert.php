
<?php include ($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/header.php');
include ($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/pages/querys/query_reservation_insert.php');?>
<main class="container">
    <!-- <p class="p-2">Reservation done, <a href="/student067/dwes/pages/invoice.php" target='_blanck' class="text-blue-600 underline font-bold">click here</a> to watch the invoice!</p> -->
    
    <?php
    if(isset($_POST['submit'])) { ?>
         <div class="w-full max-w-4xl mx-auto flex  flex-col items*center">
            <h1 class="text-center font-bold text-4xl">Reservation Information</h1>
            <div class="flex flex-row">
                <table class="min-w-full bg-white border border-gray-200 rounded-lg">
                    <thead>
                        <tr>
                        <th class="py-2 px-4 bg-gray-200 text-gray-600 font-semibold border-b">Reservationr ID</th>
                        <th class="py-2 px-4 bg-gray-200 text-gray-600 font-semibold border-b">Name</th>
                        <th class="py-2 px-4 bg-gray-200 text-gray-600 font-semibold border-b">Date In</th>
                        <th class="py-2 px-4 bg-gray-200 text-gray-600 font-semibold border-b">Date Out</th>
                        <th class="py-2 px-4 bg-gray-200 text-gray-600 font-semibold border-b">Price Per Day</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="hover:bg-gray-100">
                        <td class="py-2 px-4 border-b text-center"><?php echo $reservation['reservation_id']; ?></td>
                        <td class="py-2 px-4 border-b text-center"><?php echo $reservation['forename'] . ' ' . $reservation['lastname']; ?></td>
                        <td class="py-2 px-4 border-b text-center"><?php echo $reservation['date_in']; ?></td>
                        <td class="py-2 px-4 border-b text-center"><?php echo $reservation['date_out']; ?></td>
                        <td class="py-2 px-4 border-b text-center"><?php echo $reservation['place_category_price']; ?></td>
                    </tr>
                </tbody>
            </table>
            
        </div>
    </div>
   
   <?php }; ?>
</main>
<?php include ($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/footer.php');?>