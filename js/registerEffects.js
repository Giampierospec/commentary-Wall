//VARIABLES



//Functions
//This function hides all the basic display
function showEffects(){
  $(".jumbotron, footer").hide(0,showSlowly);
}
//This will show all the content slowly and bouncing
function showSlowly(){
  $(".jumbotron, footer").fadeIn(4000,removeBounce).addClass('animated bounce infinite');
}
//This function will remove the bouncing effect
function removeBounce(){
  $(".jumbotron, footer").removeClass('animated bounce infinite');
}

//event Listeners
window.addEventListener('load',showEffects);
