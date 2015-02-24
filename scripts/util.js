function getFiltersValues()
{
    

    vals = new Array();
    i = 0;
    $.each($(".periods"), function() {
      if($(this).is(':checked'))
      {
	      vals[i] = $(this).val();
	      i++;
      } 
    });
    
    if(vals.length == 0)
    {
        vals[0] = '3040-21';
    }
		filterValues =  {	
                                        'pais':$('#select-pais').val(),
                                        'regional': $('#select-region').val(),
                                        'ciudad':$('#select-ciudad').val(),
                                        'zona':$('#select-zona').val(),
                                        'c_costo_id':$('#select-PDV').val(),
                                        'unidad_negocio':$('#select-negocio').val(),
                                        'periods': vals
				          	};
		return filterValues;
	  
}
