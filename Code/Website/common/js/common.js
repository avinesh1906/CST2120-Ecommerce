// retrieve the input element from class .price-input
const priceInput = document.querySelectorAll(".price-input input");
// retrieve the input element from class .range-input
const rangeInput = document.querySelectorAll(".range-input input");
// get a list of classes of slider and progress
const range = document.querySelector(".slider .progress");

// price gap between min and max
let priceGap = 500;

// list for price change
priceInput.forEach(input =>{
    input.addEventListener("input", e =>{
        // retrieve the min and max price
        let minPrice = parseInt(priceInput[0].value),
        maxPrice = parseInt(priceInput[1].value);
        
        // check if difference between price is equal to price gap and 
        // maxPrice is less than input range
        if((maxPrice - minPrice >= priceGap) && maxPrice <= rangeInput[1].max){
            // modify the min input price
            if(e.target.className === "minInput"){
                rangeInput[0].value = minPrice;
                range.style.left = ((minPrice / rangeInput[0].max) * 100) + "%";
            // modify the max price
            }else{
                rangeInput[1].value = maxPrice;
                range.style.right = 100 - (maxPrice / rangeInput[1].max) * 100 + "%";
            }
        }
    });
});

// listen for change in range
rangeInput.forEach(input =>{
    input.addEventListener("input", e =>{
        // retrieve min and maximum range val
        let minVal = parseInt(rangeInput[0].value),
        maxVal = parseInt(rangeInput[1].value);
        // check if less than price gap
        if((maxVal - minVal) < priceGap){
            // calculate the new price range
            if(e.target.className === "range-min"){
                rangeInput[0].value = maxVal - priceGap
            }else{
                rangeInput[1].value = minVal + priceGap;
            }
        // if greater than price gap
        }else{
            // modify everything
            priceInput[0].value = minVal;
            priceInput[1].value = maxVal;
            range.style.left = ((minVal / rangeInput[0].max) * 100) + "%";
            range.style.right = 100 - (maxVal / rangeInput[1].max) * 100 + "%";
        }
    });
});