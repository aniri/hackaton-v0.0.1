function loadTable(tableName, columnsNr){
    $(tableName).DataTable( {
        initComplete: function () {
             var n=0;
			 
            this.api().columns().every( function () {
              if (n < (columnsNr - 2))
			 {  
                var column = this;
                var select = $('<select class="form-control select2me filter_'+n+'"><option value="">Alege...</option></select>')
                    .appendTo( $(column.footer()).empty() )
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );
 
                        column
                            .search( val ? '^'+val+'$' : '', true, false )
                            .draw();
                        
                    } );
                
                column.data().unique().sort().each( function ( d, j ) {
					if (d != "")
					{
                    var f = d.split("\">");
                    if(f[1] != null)
                        {
                            f[1] = f[1].replace("\"", "");
							d = f[1];
                            d = d.replace("</a>", ""); 
                        }
                    select.append( '<option value="'+d+'">'+d+'</option>' )
					}
               
                } );
               $(".filter_" + n).select2();
                n = n+1;
                }
            } );
			 
             
        }
    } );
	}