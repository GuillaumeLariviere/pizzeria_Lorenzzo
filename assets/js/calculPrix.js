/* CALCUL PRIX SELON QUANTITE */


let select = document.querySelector('[name="optionSelect"]')
select.addEventListener('change', function(evt){
    let id = evt.target.value;
    let newprice = prices.filter(price=>price.option_id == id);
    let goodPrice=newprice[0];
     let price = goodPrice.price;
    price;
    document.querySelector('.products__data-price').innerHTML = price+" €";
   let val= document.querySelector('[name="price"]').value = price;
   
})