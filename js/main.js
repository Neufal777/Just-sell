$(document).ready(function(){

	$('#login_show_register_form').click(function(){
		$('#index_page_register_container').fadeIn();
		$('#index_page_login_container').hide();
	});


	$('#login_show_login_form').click(function(){
		$('#index_page_login_container').fadeIn();
		$('#index_page_register_container').hide();
	});

// REGISTER AJAX 

	$('#register_submit').click(function(){

			$.ajax({
				type: 'post',
				url : 'php/user_register.php',
				data : $('#register_form').serialize(),
				success : function(data){
					$('#register_result').fadeIn();
					$('#register_result').html(data);
					$('.register_inputs').val('');
				}

			});
	}); //register ajax


// LOGIN AJAX 

	$('#login_submit').click(function(){

			$.ajax({
				type: 'post',
				url : 'php/user_login.php',
				data : $('#login_form').serialize(),
				success : function(data){
					$('#register_result').fadeIn();
					$('#register_result').html(data);
					$('.login_inputs').val('');
				}

			});
	}); //login ajax




// var product_info_container, yPos;

// 	function yScroll(){

// 		product_info_container = document.getElementById('product_page_information_right_container');
// 		yPos = window.pageYOffset;
		
// 		if (yPos > 120) {
// 			product_info_container.style.position = 'fixed';
// 			product_info_container.style.marginTop='-50px';

// 		}else{
// 			product_info_container.style.marginTop='25px';
// 		};


// 	}
// 			window.addEventListener("scroll", yScroll);




// UPLOAD FILES AJAX

$('form#upload_product_form').submit(function(event){
	event.preventDefault();

	// grab all the data
	var uploadFormData = new FormData($(this)[0]);

	$.ajax({
		url : 'php/upload_product.php',
		type: 'post',
		data : uploadFormData,
		async : false,
		cache: false,
		contentType : false,
		processData: false,
		success : function(returndata){
			$('.upload_item_inputs').val('');
			$('textarea').val('');
			$('#post_product_result_container').fadeIn();
			$('#post_product_result_container').html(returndata);
			$("html, body").animate({ scrollTop: 0 }, "slow");
		}
	});
	return false;
})



// Send Message AJAX
 $("form#send_message_form").submit(function(){
 	// php variables
 	var msg_product_id = 	$( "input[name='product_id']" ).val();
 	var msg_product_name = 	$( "input[name='product_name']" ).val();
 	var msg_product_seller = 	$( "input[name='product_seller']" ).val();
 	var msg_date = 	$( "input[name='message_date']" ).val();

// User Ho sent the email information
    var msg_auth = 	$( "input[name='message_author']" ).val();
    var msg_info = $( "input[name='message_author_contact_information']" ).val();
    var msg_msg = $( "textarea[name='message_message']" ).val();
    
    $.ajax({
      type:"get",
      url:"php/send_message.php",
      data:"product_id="+msg_product_id+"&product_name="+msg_product_name+"&product_seller="+msg_product_seller+"&message_author="+msg_auth+"&message_author_contact_information="+msg_info+"&message_message="+msg_msg+"&message_date="+msg_date,
      success:function(e){
      	$("#send_message_result").html(e);
      	      	$( "input[name='message_author']" ).val('');

   		$( "input[name='message_author_contact_information']" ).val('');

  		$( "textarea[name='message_message']" ).val('');

      }
    });
    return false;
  });




}); //ready(function)