const searchInput = document.getElementById("search");

searchInput.addEventListener("input", (e) => {
    let value = e.target.value
    try{
        tiles=document.getElementsByClassName("tile");
        if (value && value.trim().length > 0){
            value = value.trim().toLowerCase();
            for (let i in tiles) {
                var name=tiles[i].getAttribute("name");
                if(name.toLowerCase().includes(value))
                    tiles[i].style.display='inline';
                else
                    tiles[i].style.display='none';
            }
        } else {
            for (let i in tiles) {
                tiles[i].style.display='inline';
            }
        }
    }
    catch(e){}
})
