<?php   
    include ($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/pages/querys/query_reservation_insert.php');

?>

<?php include ($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/header.php');?>
<main class="conatiner">
    <!-- <p class="p-2">Reservation done, <a href="/student067/dwes/pages/invoice.php" target='_blanck' class="text-blue-600 underline font-bold">click here</a> to watch the invoice!</p> -->
    
    <?php
    if(isset($_POST['submit'])) { ?>
         <div class="w-full max-w-4xl mx-auto flex  flex-col">
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
                        <th class="py-2 px-4 bg-gray-200 text-gray-600 font-semibold border-b">Invoice</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="hover:bg-gray-100">
                        <td class="py-2 px-4 border-b text-center"><?php echo $reservation['reservation_id']; ?></td>
                        <td class="py-2 px-4 border-b text-center"><?php echo $reservation['forename'] . ' ' . $reservation['lastname']; ?></td>
                        <td class="py-2 px-4 border-b text-center"><?php echo $reservation['date_in']; ?></td>
                        <td class="py-2 px-4 border-b text-center"><?php echo $reservation['date_out']; ?></td>
                        <td class="py-2 px-4 border-b text-center"><?php echo $reservation['place_category_price']; ?></td>
                        <td class="py-2 px-4 border-b text-center">
                            <form action="/student067/dwes/pages/invoice.php" method="POST">
                            <input type="number" name="reservation_id" value=<?php echo  $reservation['reservation_id']; ?> hidden>
                                <input type="text" name="fullname" value="<?php echo $reservation['forename'] . ' ' . $reservation['lastname']; ?>" hidden>
                                <input type="date" name="date_in" value="<?php echo $reservation['date_in']; ?>" hidden>
                                <input type="date" name="date_out" value="<?php echo $reservation['date_out']; ?>" hidden>
                                <input type="number" name = "subtotal" value = <?php echo $reservation['subtotal']; ?> hidden>
                            <button type="submit" name="submit"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                             </svg></button>
                             </form>
                        </td>
                    </tr>
                </tbody>
            </table>
            
        </div>
    </div>
   
   <?php }; ?>
</main>
<?php include ($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/footer.php');?>