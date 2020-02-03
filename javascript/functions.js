	function opentab(tab_num) {
  			var i;
  			var x = document.getElementsByClassName("row");
        var input = document.getElementsByTagName("input");
        for(i= 0 ; i< input.length; i++)
          if (input[i].className != "btn")
            input[i].value = "";

  			for (i = 0; i < x.length; i++) {
    			x[i].style.display = "none";
  			}
  			document.getElementById(tab_num).style.display = "block";
	}

    function check(form){
    var frm = document.getElementById(form);
    var txtfiled = frm.getElementsByClassName("input-field");
    for (var i = 0; i < txtfiled.length; i++)
      if (txtfiled[i].value == "")
        return false;
      return true;
      
  }

	function changeAction(n,form){
    if(check(form)) {
      switch(n)
      {
        case "Add" :
        if(confirm("هل تريد الاضافة ؟")) {
          document.getElementById(form).action = "../php/AddAccount.php";
          document.getElementById(form).submit();
        } 
        break;

        case "Edit" :
        if(confirm("هل تريد التعديل ؟")) {
          document.getElementById(form).action = "../php/EditAccount.php";
          document.getElementById(form).submit();
        } 
        break;

        case "Delete" :
        if(confirm("هل تريد الحذف")) {
          //document.getElementById(form).action = "../php/EditAccount.php";
          //document.getElementById(form).submit();
        }  
        break;
      }

    }
  }

	function sortTable(n,table)
  	{
  	var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
  	table = document.getElementById(table);
  	switching = true;
  // Set the sorting direction to ascending:
  	dir = "asc";
  /* Make a loop that will continue until
  no switching has been done: */
  	while (switching) {
    // Start by saying: no switching is done:
    switching = false;
    rows = table.rows;
    /* Loop through all table rows (except the
    first, which contains table headers): */
    for (i = 1; i < (rows.length - 1); i++) {
      // Start by saying there should be no switching:
      shouldSwitch = false;
      /* Get the two elements you want to compare,
      one from current row and one from the next: */
      x = rows[i].getElementsByTagName("TD")[n];
      y = rows[i + 1].getElementsByTagName("TD")[n];
      /* Check if the two rows should switch place,
      based on the direction, asc or desc: */
      if (dir == "asc") {
        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
          // If so, mark as a switch and break the loop:
          shouldSwitch = true;
          break;
        }
      } else if (dir == "desc") {
        if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
          // If so, mark as a switch and break the loop:
          shouldSwitch = true;
          break;
        }
      }
    }
    if (shouldSwitch) {
      /* If a switch has been marked, make the switch
      and mark that a switch has been done: */
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
      // Each time a switch is done, increase this count by 1:
      switchcount ++;
    } else {
      /* If no switching has been done AND the direction is "asc",
      set the direction to "desc" and run the while loop again. */
      if (switchcount == 0 && dir == "asc") {
        dir = "desc";
        switching = true;
      			}
    		}
  		}
	}