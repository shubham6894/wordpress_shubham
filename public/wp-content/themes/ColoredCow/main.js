/*! ColoredCow 2017-07-25 */
jQuery(document).ready(function(a){function b(){var b=a("#request_form"),d="action=add_requested_guests&eventid="+c+"&"+b.serialize();a.ajax({type:"POST",url:PARAMS.ajaxurl,data:d,success:function(a){alert("success")}})}var c;a("#Submit_request").on("click",function(){var c=a("#request_form");return c[0].checkValidity()?(b(),a("#request_form").trigger("reset"),a("#requestModal").modal("toggle"),void 0):void c[0].reportValidity()}),a("#request_modal_button").on("click",function(){c=a(this).data("id")})});