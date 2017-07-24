jQuery(document).ready(function($)
  {
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
  });

// function ajax_request_form(){
//     let request_form =$('#request_form').serializeArray();
//     $.ajax({
//         type: 'POST',
//         url:PARAMS.ajaxurl,
//         data: request_form,
//         success:function(e){
//             alert('success');
//         }
//     });
// }