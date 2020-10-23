		var table = document.getElementById("user_table");
                
        for(var i = 1; i < table.rows.length ; i++)
        {
        	table.rows[i].onclick = function()
        	{
            //rIndex = this.rowIndex;
            document.getElementById("id_u").value = this.cells[0].innerHTML;
            document.getElementById("name_u").value = this.cells[1].innerHTML;
            document.getElementById("username_u").value = this.cells[2].innerHTML;
            document.getElementById("password_u").value = this.cells[3].innerHTML;
            document.getElementById("phonenumber_u").value = this.cells[4].innerHTML;
            var selected = document.getElementById("state_select");
            switch (this.cells[5].innerText) {
                    case 'وكيل النيابة':
                        selected.selectedIndex = 0;
                        break;
                    case 'موظف':
                        selected.selectedIndex = 1;
                        break;
                    case 'مستخدم جوال':
                        selected.selectedIndex = 2;
                        break;                      
                    }
        	};
        }