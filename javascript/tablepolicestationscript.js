		var table = document.getElementById("police_station_table");
                
        for(var i = 1; i < table.rows.length ; i++)
        {
        	table.rows[i].onclick = function()
        	{
            //rIndex = this.rowIndex;
            document.getElementById("id_ps").value = this.cells[0].innerHTML;
            document.getElementById("name_ps").value = this.cells[1].innerHTML;
            document.getElementById("username_ps").value = this.cells[2].innerHTML;
            document.getElementById("password_ps").value = this.cells[3].innerHTML;
            document.getElementById("phonenumber_ps").value = this.cells[4].innerHTML;
            var selected = document.getElementById("state_select");
            switch (this.cells[5].innerHTML) {
                    case 'مسؤول':
                        selected.selectedIndex = 1;
                        break;
                    case 'مركز شرطة':
                        selected.selectedIndex = 2;
                        break;                    
                    }
        	};
        }