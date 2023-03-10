let countFavorite = 0;
let countCart = 0;
// document.getElementById("favorite-counter").style.visibility = "hidden";
// document.getElementById("cart-count").style.visibility = "hidden";


// let heart = document.getElementsByClassName("favorite-button");
// for(let i =0; i<heart.length; i++){
//   heart[i].onclick = function(){
//     countFavorite++;
//     document.getElementById("favorite-counter").innerHTML = countFavorite;
//     document.getElementById("favorite-counter").style.visibility = "visible";
//   }
// }

let cart = document.getElementsByClassName("cart-button");
for(let i =0; i<cart.length; i++){
  cart[i].onclick = function(){
    countCart++;
    document.getElementById("cart-count").innerHTML = countCart;
    document.getElementById("cart-count").style.visibility = "visible";
  }

}

document.getElementById("fav-link").onclick = function(){
  location.href = "favoriteproducts.php";
}

document.getElementById("home-link").onclick = function(){
  location.href = "index.php";
}














