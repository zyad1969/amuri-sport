let cartProducts = document.getElementsByClassName("cart-number")[0].innerHTML;
cartNumberUpdate();
// function addProduct(){
//     cartProducts++;
//     console.log('Error');
//     cartNumberUpdate();
// }
function cartNumberUpdate(){
    if(cartProducts == 0)
    document.getElementsByClassName("cart-number")[0].style = `display:none;`
    else
    {
        console.log(cartProducts);
        document.getElementsByClassName("cart-number")[0].style = `display:block;`
        document.getElementsByClassName("cart-number")[0].innerHTML = cartProducts;
    }
}