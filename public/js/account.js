function getAccountInfo(){
	$.ajax({
		url: 'api/account/info',
		type: 'GET',
		dataType: 'json',
		success: function(data){
			console.log(data.firstname)
			$("#res .fullname").text(data.lastname + ' ' + data.firstname)
			$("#res .title").text(data.title)
			$("#res .email").text(data.email)
			$("#res .phone").text(data.phone)
			$("#res .address").text(data.address)
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