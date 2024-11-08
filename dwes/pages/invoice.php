<?php include ($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/header.php');?>
<main>


<?php
    if(isset($_POST['submit'])){ ?>

<div class="w-full max-w-4xl mx-auto flex  flex-col">
            <h1 class="text-center font-bold text-4xl">Invoice</h1>
            <div class="flex flex-row">
                <table class="min-w-full bg-white border border-gray-200 rounded-lg">
                    <thead>
                        <tr>
                        <th class="py-2 px-4 bg-gray-200 text-gray-600 font-semibold border-b">Reservationr ID</th>
                        <th class="py-2 px-4 bg-gray-200 text-gray-600 font-semibold border-b">Name</th>
                        <th class="py-2 px-4 bg-gray-200 text-gray-600 font-semibold border-b">Date In</th>
                        <th class="py-2 px-4 bg-gray-200 text-gray-600 font-semibold border-b">Date Out</th>
                        <th class="py-2 px-4 bg-gray-200 text-gray-600 font-semibold border-b">Total Price</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <tr class="hover:bg-gray-100">
                        <td class="py-2 px-4 border-b text-center"><?php echo $_POST['reservation_id']; ?></td>
                        <td class="py-2 px-4 border-b text-center"><?php echo $_POST['fullname'] ?></td>
                        <td class="py-2 px-4 border-b text-center"><?php echo $_POST['date_in']; ?></td>
                        <td class="py-2 px-4 border-b text-center"><?php echo $_POST['date_out']; ?></td>
                        <td class="py-2 px-4 border-b text-center"><?php echo $_POST['subtotal']; ?></td>
                        
                    </tr>
                </tbody>
            </table>
            
        </div>
    </div>

    <?php }else {
        echo "nada enviado";
    } ?>


</main>
<?php include_once ($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/footer.php');?>