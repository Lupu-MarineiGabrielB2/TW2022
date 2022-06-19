function removeMessage(id){
    console.log(id);
    var xmlhttp = new XMLHttpRequest();   
    xmlhttp.open("GET", "funct/remove_message.php?id=" + id, true);
    xmlhttp.send();

    const line = document.getElementById("tr"+id);
    line.remove();
}