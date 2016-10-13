function fnExcelReport(tableName)
{
    var tab_text="<table border='2px'><tr bgcolor='#87AFC6'>";
    var textRange; var j=0;
    tab = document.getElementById(tableName); // id of table

    for(j = 0 ; j < tab.rows.length -1 ; j++) 
    {     
        tab_text=tab_text+tab.rows[j].innerHTML+"</tr>";
        //tab_text=tab_text+"</tr>";
		tab_text = tab_text.replace("Vezi/Editeaza", "");
	tab_text = tab_text.replace("Sterge", "");
    }

    tab_text=tab_text+"</table>";
   
    tab_text= tab_text.replace(/<input[^>]*>|<\/input>/gi, ""); // remvoes input params
	tab_text= tab_text.replace(/<i[^>]*>|<\/i>/gi, ""); // remvoes input params
	tab_text= tab_text.replace(/<a[^>]*>|<\/a>/gi, ""); // remvoes input params
	

    var ua = window.navigator.userAgent;
    var msie = ua.indexOf("MSIE "); 
var d = new Date();
var n = d.toString();
    if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./))      // If Internet Explorer
    {
        txtArea1.document.open("txt/html","replace");
        txtArea1.document.write(tab_text);
        txtArea1.document.close();
        txtArea1.focus(); 
        sa=txtArea1.document.execCommand("SaveAs",true,"clients.xls");
    }  
    else                 //other browser not tested on IE 11
        sa = window.open('data:application/vnd.ms-excel,'+n+',' + encodeURIComponent(tab_text));  

    return (sa);
}
function tableToJson(table) {
    var data = [];
	var text;
    // first row needs to be headers
    var headers = [];
    for (var i=0; i<table.rows[0].cells.length-1; i++) {
        headers[i] = table.rows[0].cells[i].innerHTML.replace(/<a[^>]*>|<\/a>/gi, "");
	
    }
    data.push(headers);
    // go through cells
    for (var i=2; i<table.rows.length; i++) {

        var tableRow = table.rows[i-1];
        var rowData = {};

        for (var j=0; j<tableRow.cells.length-2; j++) {

            text = tableRow.cells[j].innerHTML.replace(/<a[^>]*>|<\/a>/gi, "");
			text = text.replace(/<div[^>]*>|<\/div>/gi, ""); 
			text = text.replace(/<span[^>]*>|<\/span>/gi, ""); 
			rowData[ headers[j] ] = text;
        }
		
        data.push(rowData);
    }        

    return data;
}


function callme(tableName){
	tab = document.getElementById(tableName); // id of table
	 l = {
         orientation: 'l',
         unit: 'mm',
         format: 'a4',
         compress: true,
         fontSize: 10,
         lineHeight: 1,
         autoSize: true,
         printHeaders: true
     };
var table = tableToJson($(tab).get(0));
 var doc = new jsPDF(l, '', '', '');


$.each(table, function(i, row){
	$.each(row, function(j,cell){
	if(j=="email" | j==1){
	 doc.cell(1,10,35,20,cell,i);	
	}
	else{
		doc.cell(1,10,35,20,cell,i);
	}
	
	});
});

doc.save(tableName + '.pdf');
}

