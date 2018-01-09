function mostraOculta(ID, ID2) {
    if (document.getElementById(ID).style.display == "block" && document.getElementById(ID2).style.display == "block") {
        mostra(ID);
        alert("Usou o 1");
    } else if (document.getElementById(ID).style.display == "block" && document.getElementById(ID2).style.display != "block") {
        esconde(ID2);
        mostra(ID);
        alert("Usou o 2");
    } else if (document.getElementById(ID).style.display != "block" && document.getElementById(ID2).style.display == "block") {
        mostra(ID2);
        esconde(ID);
        alert("Usou o 3");
    } else if (document.getElementById(ID).style.display != "block") {
        esconde(ID);
        alert("Usou o 4");
    }


}

function mostra(TD) {
    document.getElementById(TD).style.display = "none";
    alert('teste alert');
}

function esconde(TD) {
    document.getElementById(TD).style.display = "block";
}