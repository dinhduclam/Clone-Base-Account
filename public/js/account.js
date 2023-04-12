function getAccountInfo(){
	return $.ajax({
		url: 'api/account/info',
		type: 'GET',
		dataType: 'json',
		success: function(data){
			return data;
		}
	});
}

function editAccount(){
	$.ajax({
		url: 'api/account/edit',
		type: 'POST',
		data: {
		  username: 'john',
		  password: 'doe'
		},
		success: function(response) {
		  console.log(response);
		}
	  });
}

function closeEditProfile(){
	$("#dialog").hide()
}

async function openEditProfile(){
	data = await getAccountInfo()
	jQuery("input[name='firstname']").val(data.firstname)
	jQuery("input[name='lastname']").val(data.lastname)
	jQuery("input[name='email']").val(data.email)
	jQuery("input[name='username']").val(data.username)
	jQuery("input[name='title']").val(data.title)
	jQuery("input[name='dob']").val(data.dob)
	jQuery("input[name='phone']").val(data.phone)
	jQuery("input[name='address']").val(data.address)
	$("#dialog").show()
}