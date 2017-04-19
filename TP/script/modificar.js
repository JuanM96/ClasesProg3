var req = new XMLHttpRequest();
window.onload = function () {
    req.open("GET","php/mostrarmod.php",true);
    req.onreadystatechange = CargarEmpleados;
    req.send();
}
// addEventListener("load",InicializarEventos,false);
// function InicializarEventos()
// {
//     var button = document.getElementById("submit");
//     button.addEventListener("click",presionEnlance);
// }
function CargarEmpleados()
{
    var miselecthtml = document.getElementById("idEmpleados");
    if (req.readyState == 4) 
    {
        miselecthtml.innerHTML = req.responseText;
    }
}
function EmpleadoSelecto(){
    var datos = "?value="+document.getElementById("idEmpleados").value;
    req.open("POST","php/mostrarmod.php"+datos,true);
    req.onreadystatechange = MostrarEmpleado;
    req.send();
}
function MostrarEmpleado(){
    var miselecthtml = document.getElementById("idEmpleados");
    if (req.readyState == 4) 
    {
        alert(req.responseText);
        //miselecthtml.innerHTML = req.responseText;
    }
}