

  function onlyNumberKey1(evt) { 
          
      // Only ASCII charactar in that range allowed 
      var ASCIICode = (evt.which) ? evt.which : evt.keyCode 
      if (ASCIICode != 45 && ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57)) 
        return false; 
      return true; 
  }

  function onlyNumberKey(evt) { 
          
      // Only ASCII charactar in that range allowed 
      var ASCIICode = (evt.which) ? evt.which : evt.keyCode 
      if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57)) 
        return false; 
      return true; 
  }

  function check(){
    var txtfiled = document.getElementsByClassName("input-field");
    for (var i = 0; i < txtfiled.length; i++)
      if (txtfiled[i].value == "" && !txtfiled[i].disabled)
        return false;
      return true;    
  }

	function policestation(n){
    if(check()){
      switch(n)
      {
        case "Add" :
          document.police_station.action = "../php/Add_PS.php";
          document.police_station.submit();
        break;

        case "Edit" :
          document.police_station.action = "../php/Edit_PS.php";
          document.police_station.submit();
        break;

        case "Delete" :
          document.police_station.action = "../php/Delete_PS.php";
          document.police_station.submit();
        break;
      }
    }
  }

  function user(n){
    if(check()){
      switch(n)
      {
        case "Add" :
          document.users.action = "../php/Add_User.php";
          document.users.submit();
          break;

        case "Edit" :
          document.users.action = "../php/Edit_User.php";
          document.users.submit();
          break;

        case "Delete" :
          document.users.action = "../php/Delete_User.php";
          document.users.submit(); 
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

  function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah').attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }

function setrequired(){

  document.getElementById("date1").required = true;
  document.getElementById("date2").required = true;
}

function pickANDhide(){

  if(document.getElementById("access_select").selectedIndex == 1)
    document.getElementById('ps_select').disabled = true;
  else
    document.getElementById('ps_select').disabled = false;
  
}
