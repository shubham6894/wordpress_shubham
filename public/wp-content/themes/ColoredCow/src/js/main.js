jQuery(document).ready(function($)
  {
    var modalid;
$("#Submit_request").on("click", function(){
    var requestForm=$("#request_form");                        
    if(!requestForm[0].checkValidity())
    {
        requestForm[0].reportValidity();
        return; 
    }
    else{  
            ajax_request_form();
            $('#request_form').trigger('reset');
            $('#requestModal').modal('toggle');
        }
    });

$("#request_modal_button").on("click", function(){
      modalid= $(this).data("id");
  });
  

function ajax_request_form(){
    var requestForm =$('#request_form');
    var dataString="action=add_requested_guests&eventid="+modalid+'&'+requestForm.serialize();
    $.ajax({
        type: 'POST',
        url:PARAMS.ajaxurl,
        data: dataString,
        success:function(result){
            alert('success');
        }
    });
}

});