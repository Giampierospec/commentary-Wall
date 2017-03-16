//Variable Declarations
var access_btn = document.getElementById("ingress_btn");
var email_input = document.getElementById("email");
var pass_input = document.getElementById("pass");
var messageText = "";
var execute = false;
//Functions
//This function shows the initial effects the form will have
// when is displayed
function showEffects(){
  if(!execute){
    $("footer, .jumbotron").hide(0,showForm);
  }
}
//Shows all the elements of the form after they've been hidden
function showForm(){
  $("footer, .jumbotron").fadeIn(2000).addClass("animated bounce");
}
//This function will verify the form and submit the details
function formSubmit(){
    var email = email_input.value;
    var pass = pass_input.value;
      if(email != ''&& pass != ''){
        console.log("email: "+ email + " pass: "+ pass);
        document.login_form.submit(function(event) {
          execute = true;
           save(execute);
         event.preventDefault();
      });
  }
  else{
    $("#message").show(0,showText);
  }
}

 //This function will show the text inside message
function showText(){
  messageText= "<p>Hay campos vacios llenelos</p>";
  $("#message").html(messageText).fadeIn(4000,dissappearText);
}

//This function dissapears the text
function dissappearText(){
  $("#message").fadeOut(5000);
  execute = true;
  save(execute);
}
//This function will save this variable here
 function save(text){
  var datos = JSON.stringify(text);
  localStorage.setItem('execute',datos);
}

function loadData(){
  var datos = localStorage.getItem('messageText');
  if(datos != null){
    execute = JSON.parse(datos);
    showEffects();
  }
}

//Event Listeners

//Shows the effects when the page finishes loading
window.addEventListener("load",showEffects);
access_btn.addEventListener("click",formSubmit);
//It triggers when the button is clicked
