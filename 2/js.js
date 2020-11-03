// when i run start outside the button it works but when i press the
//button to start it doesn't for some reason


function $(id){
  var x;
  return x=document.getElementById(id);
}

var text=$("ta").value;
var textarr=text.split(/\s+/);


//document.getElementById("a").innerHTML= textarr.join(' ');

var Display=document.getElementById("a");



var g=0;


var myvar;

start();


var btn= $("btn");
btn.addEventListener("click",start);





function start()
{



  var sel = document.getElementById("speed");
  var selted = sel.options[sel.selectedIndex].value;
  myvar=setInterval(myfunction,selted);

if ($("med").checked)
{
  Display.style.fontSize = "initial";
}
else if ($("big").checked)
{
  Display.style.fontSize = "larger";
}
else if ($("bigg").checked)
{
  Display.style.fontSize = "x-large";
}



$("speed").disabled=true;
$(btn).disabled=true;


}


function myfunction(){
  //alert("now");
    if (g<textarr.length)
    {
      Display.innerHTML= textarr[g];
      g++;
    }
    else{
      clearInterval(myvar);
    }
}



function stop(){
  clearInterval(myvar);
  Display.innerHTML= textarr[g];
  alert(g);
  g=0;

}
