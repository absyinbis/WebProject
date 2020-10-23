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
            var selected1 = document.getElementById("ps_select");
            var selected2 = document.getElementById("access_select");

            for (var  i = 0; i < selected1.length ; i++)
                if (selected1.options[i].text == this.cells[5].innerHTML)
                    selected1.selectedIndex = i;

            switch (this.cells[6].innerText) {
                    case 'وكيل النيابة':
                        selected2.selectedIndex = 0;
                        break;
                    case 'موظف':
                        selected2.selectedIndex = 1;
                        break;
                    case 'مستخدم جوال':
                        selected2.selectedIndex = 2;
                        break;                      
                    }
        	};
        }