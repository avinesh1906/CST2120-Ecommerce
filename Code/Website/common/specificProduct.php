<?php
    // php variables
    $pageName = 'Specific Product';
    $folderName = 'common';

    // include the common.php which contains the php functions
    include('../common/common.php');

    // call the php functions 
    generateHeader($pageName, $folderName);
    generateNavBar($pageName);
    generateLoggedMsg($pageName);

?>
<div class="alert alert-success" id= "alert" role="alert">
    Added to cart!
</div>
<div class="specificProductContainer">
    <div class="productContainer">
        <div class="productImage">

        </div>
        <div class="productDetails">
            <div class="prodDesc">
            
            </div>
            <div class="confirmationBtn">
                <button id="basket" onclick="addBasket('<?php echo session_id(); ?>')">Add to Basket</button>
                <br>
                <button id="buyIt">Buy It Now</button>
            </div>
        </div>
    </div>  
    <div class="productReview">
        <div class="title">
            <div id="customerReview" onclick="viewReview()">Customer Reviews</div>
            <div id="addReview" onclick="writeReview()">Add Review</div>
        </div>
        <div class="reviewBody">
            <div class="reviewQty" id="reviewQty">
            </div>
            <div class="writeReview" id="writeReview">
                <div class="reviewTitle">
                    Write a review
                </div>
                <!-- Name -->
                <div class="form_details">
                    <div class="form_input">
                        <label for="name" class="form-label"> Name </label>
                        <br>
                        <input autocomplete="off" type="email" id="name" placeholder="Enter your name" onkeyup="nameValidation()">
                    </div>
                    <!-- Error -->
                    <div class="form_error">
                        <span id="name_details"></span>
                    </div>
                </div>
                <!-- Email -->
                <div class="form_details">
                    <div class="form_input">
                        <label for="email" class="form-label"> Email </label>
                        <br>
                        <input autocomplete="off" type="email" id="email"placeholder="john.smith@example.com"  onkeyup="emailValidation()">
                    </div>
                    <!-- Error -->
                    <div class="form_error">
                        <span id="email_details"></span>
                    </div>
                </div>
                <!-- Review Title -->
                <div class="form_details">
                    <div class="form_input">
                        <label for="writereviewTitle" class="form-label"> Review Title </label>
                        <br>
                        <input autocomplete="off" type="text" id="writereviewTitle" onkeyup="titleValidation()">
                    </div>
                    <!-- Error -->
                    <div class="form_error">
                        <span id="title_details"></span>
                    </div>
                </div>
                <!-- Review Title Body -->
                <div class="form_details">
                    <div class="form_input">
                        <label for="writereviewBody" class="form-label"> Review Description </label>
                        <br>
                        <textarea rows="5" cols="70%" id="writereviewBody" onkeyup="bodyValidation()"></textarea>
                    </div>
                    <!-- Error -->
                    <div class="form_error">
                        <span id="body_details"></span>
                    </div>
                </div>
                <div class="submitReviewBtn">
                    <button id="submitReview" onclick="submitReview()">Submit Review</button>
                </div>
            </div>
        </div>

        
    </div>
</div>
<?php
    // php function to generate the footer
    generateJavaScript($pageName);
    // php function to generate the footer
    generateFooter($pageName);
?>