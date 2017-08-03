jQuery(document).ready(function($)
	{
	
	var modalid;
	var send_eventid;
$("#Submit_request").on("click", function(){
	var requestForm=$("#request_form");
	if(!requestForm[0].checkValidity()){
		requestForm[0].reportValidity();
		return; 
	}
	else{
			ajax_request_form();
			$('#request_form').trigger('reset');
			$('#requestModal').modal('toggle');
		}
	});

$(".request_modal_button").on("click", function(){
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

$("#show_approved_guests").on("click", function(){
	fetch_all_guests();
});

function fetch_all_guests(){
var action="show_all_approved_guests";
	$.ajax({
		type: 'POST',
		url: PARAMS.ajaxurl,
		data: {action:action},
		cache: false,
		success: function(result){
			$("#requested_guests").hide();
			$("#approved_guests").hide();
			$("#all_approved_guest").show();
			$("#all_approved_guest tbody").html(result);
		}
	});
}

$(document).on("click", ".dropdown-events", function(){
	var fetch_event_id=$(this).data("id");
	get_requested_guests(fetch_event_id);
	get_approved_guests(fetch_event_id);
	});

$(document).on("click", ".dropdown-event-invite", function(){
	send_eventid=$(this).data("id");
	console.log(send_eventid);
});


$(document).on("click", ".event-invite", function(){	
	var id = send_eventid;
	var action="send_invite_per_event";
	alert("id"+id);
	$.ajax({
		type: 'POST',
		url: PARAMS.ajaxurl,
		data: {action:action, fetch_event_id:id},
		cache: false,
		success: function(result){
			alert('success');
		}
	});
	});

function get_requested_guests(id){
	var fetch_event_id=id;
	var action="show_guests_per_event";
	$.ajax({
		type: 'POST',
		url: PARAMS.ajaxurl,
		data: {action:action, fetch_event_id:fetch_event_id},
		cache: false,
		success: function(result){
			$("#all_approved_guest").hide();
			$("#requested_guests").show();
			$("#requested_guests tbody").html(result);
		}
	});
}

function get_approved_guests(id){
	var fetch_event_id=id;
	var action="show_approved_guests_per_event";
	$.ajax({
		type: 'POST',
		url: PARAMS.ajaxurl,
		data: {action:action, fetch_event_id:fetch_event_id},
		cache: false,
		success: function(result){
			$("#all_approved_guest").hide();
			$("#approved_guests").show();
			$("#approved_guests tbody").html(result);
		}
	});
}

$(document).on('click','.approve',function(){
		var check_approval=confirm("Are You Sure you really want to approve this guest?");
		if (check_approval==true) 
		{
		var id= $(this).attr("id");	
		var event_id=$(this).attr("value");
		var action="update_requested_guests";
		$.ajax(
		{
			type: 'POST',
			url: PARAMS.ajaxurl,
			data:{id:id,action:action},
			cache: false,
			success: function(result)
			{
				get_approved_guests(event_id);
				get_requested_guests(event_id);
			}
		});
	}
	});

$(document).on('click','.reject',function(){
		var check_rejection=confirm("Are You Sure you really want to reject this guest?");
		if (check_rejection==true) 
		{
		var id= $(this).attr("id");
		var event_id=$(this).attr("value");	
		var action="reject_requested_guests";
		$.ajax(
		{
			type: 'POST',
			url: PARAMS.ajaxurl,
			data:{id:id,action:action},
			cache: false,
			success: function(result)
			{
				get_approved_guests(event_id);
				get_requested_guests(event_id);
			}
		});
	}
	});

});