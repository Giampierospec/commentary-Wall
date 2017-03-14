//Variable Declarations

//Functions

//This function shows the initial effects the form will have
// when is displayed
function showEffects() {
  $("footer, .jumbotron").hide(0,showForm);
}
//Shows all the elements of the form after they've been hidden
function showForm(){
  $("footer, .jumbotron").fadeIn(5000).addClass("animated bounce");
}



//Event Listeners

//Shows the effects when the page finishes loading
window.addEventListener("load",showEffects);
