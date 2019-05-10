$(document).ready(function()
	{
		$(".matinhthanh").change(function()
		{
			var id=$(this).val();
			var dataString = 'id='+ id;
			$.ajax
			({
				type: "POST",
				url: "<?=$domain?>/select3cap/get_huyen.php",
				data: dataString,
				cache: false,
				success: function(html)
				{
					$(".maquanhuyen").html(html);
				} 
			});
		});
	});

	//Thêm hoặc xóa một hàng mới cho bảng
	function addRow(tableID) {
		var table = document.getElementById(tableID);
		var rowCount = table.rows.length;
		var row = table.insertRow(rowCount);
		var colCount = table.rows[0].cells.length;
		for(var i=0; i<colCount; i++) {
			var newcell	= row.insertCell(i);
			newcell.innerHTML = table.rows[0].cells[i].innerHTML;
			//alert(newcell.childNodes);
			switch(newcell.childNodes[0].type) {
				case "text":
					newcell.childNodes[0].value = "";
					break;
				case "checkbox":
					newcell.childNodes[0].checked = false;
					break;
				case "select-one":
					newcell.childNodes[0].selectedIndex = 2;
					break;
			}
		}
	}

	function deleteRow(tableID) {
		try {
			var table = document.getElementById(tableID);
			var rowCount = table.rows.length;

			for(var i=0; i<rowCount; i++) {
				var row = table.rows[i];
				var chkbox = row.cells[0].childNodes[0];
				if(null != chkbox && true == chkbox.checked) {
					if(rowCount <= 1) {
						alert("Khong xoa het cac hang duoc dau ban oi!");
						break;
					}
					table.deleteRow(i);
					rowCount--;
					i--;
				}
			}
		}catch(e) {
			alert(e);
		}
	}