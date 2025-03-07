<?php include_once ($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/header.php');?>
  
<main>
    <?php 
    include($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/pages/querys/query_review_select.php');
    ?>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 w-full max-w-6xl justify-center">
        <?php  
        if($reviews) {
            foreach ($reviews as $review) { 
                $stars = str_repeat('★', $review['review_score']);
                ?>
                <div class="bg-white p-6 shadow-xl rounded-lg border border-gray-200">
                    <div class="flex gap-3 items-top mb-2 items-center">
                        <!-- check if the user have profile image, else put the default image -->
                        <?php  if($review['user_image_path']) { ?>
                            <img class="w-[40px] h-[40px] rounded-[50%]" src="<?php echo $review['user_image_path'] ?>" alt="">
                        <?php }else { ?>
                            <img class="w-[50px] h-[50px] rounded-[50%]" src="<?php echo '/student067/dwes/images/users/user_profile_image_default.jpg'; ?>" alt="">
                         <?php } ?>  
                        <p class="font-semibold text-lg"><?php echo $review['forename'] . ' ' . $review['lastname']; ?></p>
                    </div>
                    <p class="text-yellow-400 text-xl"><?php echo $stars; ?></p>
                    <p class="text-gray-700 line-clamp-4" id="review-text-<?php echo $review['review_id']; ?>">
                        <?php echo $review['review_text']; ?>
                    </p>
                    <?php if(mb_strlen($review['review_text'], 'UTF-8') >= 156) {?>
                    <button class="text-blue-500 hover:underline mt-2 read-more" onclick="toggleReadMore(<?php echo $review['review_id']; ?>)">Read more</button>
                    <?php } ?>
                </div>
            <?php }
        } else { ?>
            <h2 class="text-2xl font-semibold text-gray-500">No reviews yet</h2>
        <?php } ?>
    </div>
</main>

<?php
if ($_SERVER['SCRIPT_NAME'] != "/student067/dwes/index.php") {
    include ($_SERVER['DOCUMENT_ROOT'].'/student067/dwes/footer.php');
} ?>

<script>
function toggleReadMore(id) {
    const reviewText = document.getElementById(`review-text-${id}`);
    if (reviewText.classList.contains("line-clamp-4")) {
        reviewText.classList.remove("line-clamp-4");
        reviewText.classList.add("h-auto");
    } else {
        reviewText.classList.add("line-clamp-4");
        reviewText.classList.remove("h-auto"); 
    }
}

document.querySelectorAll(".read-more").forEach((readMore)=> {
    readMore.addEventListener("click", function(){
        // console.log(this.textContent);
        if(this.textContent == "Read more") {
            this.innerText = "Read less";
        }else {
            this.innerText = "Read more"
        }
    })
})

</script>
