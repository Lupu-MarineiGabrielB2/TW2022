var caretsState =[0, 0, 0, 0];


function animateCaret(i){
    var id = "caret" + i;
    caret = document.getElementById(id);
    if(window.caretsState[i]==0){
        console.log(1);
        window.caretsState[i]=1;
        caret.style.webkitTransform = "rotate(" + 180 + "deg)";
    }
    else{
        console.log(2);
        window.caretsState[i]=0;
        caret.style.webkitTransform = "rotate(" + 360 + "deg)";
    }
    
    console.log(caret);
}

//source: https://www.w3schools.com/howto/howto_js_sort_table.asp

function sortTable(n) {
    animateCaret(n);
    var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
    table = document.getElementById("table");
    switching = true;
    dir = "asc"; 
    while (switching) {
      switching = false;
      rows = table.rows;
      for (i = 1; i < (rows.length - 1); i++) {
        shouldSwitch = false;
        x = rows[i].getElementsByTagName("TD")[n];
        y = rows[i + 1].getElementsByTagName("TD")[n];
        if (dir == "asc") {
          if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
            shouldSwitch= true;
            break;
          }
        } else if (dir == "desc") {
          if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
            shouldSwitch = true;
            break;
          }
        }
      }
      if (shouldSwitch) {
        rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
        switching = true;
        switchcount ++;      
      } else {
        if (switchcount == 0 && dir == "asc") {
          dir = "desc";
          switching = true;
        }
      }
    }
  }