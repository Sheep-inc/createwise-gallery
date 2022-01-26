function setupToast(){
  neve_body.insertAdjacentHTML("beforeend","<div id=\"snackbar\"></div>")
}

function doToast(msg) {
  var x = document.getElementById("snackbar");
  if(x==undefined){
    setupToast()
    x = document.getElementById("snackbar");
  }
  x.className = "show";
  x.innerText=msg;
  setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
}
