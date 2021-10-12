function checkPasswordManage() {
	var managepw = $j('#managepw').val();
	var confirm_passwordmanage = $j('#confirm_passwordmanage').val();

	if (managepw !== '' && confirm_passwordmanage !== '') {
		if (managepw !== confirm_passwordmanage) {
			$j('#confirm_passwordmanage').css('border', '1px solid red');
		}
		else if (managepw == confirm_passwordmanage) {
			$j('#confirm_passwordmanage').css('border', '1px solid #00FF00');
		}
	}
}

function UpdateUserPWD() {
	var user_id = $j('#user_id1').val();
	var managepw = $j('#managepw').val();
	var confirm_passwordmanage = $j('#confirm_passwordmanage').val();
        alert(user_id);
        alert(managepw);
        alert(confirm_passwordmanage);

	if (managepw === confirm_passwordmanage) {
		if ($j.trim(user_id) !== '', $j.trim(managepw) !== '', $j.trim(confirm_passwordmanage) !== '') {
			$j.ajax({
				url: 'updateUserPw',
				method: 'post',
				data: {'user_id': user_id, 'managepw': managepw},
				success: function (data) {
					if (data > 0) {
						alert('Successfully updated password.');
						$j('#user_id').val('');
//						$j('#emp_id').val('');
						$j('#managepw').val('');
						$j('#confirm_passwordmanage').val('');

					} else {
						alert('Error.!');
					}
				},
				error: function () {
					alert('Error');
				}
			});
		}
		else {
			alert('All fields are required.!');
		}
	}
	else {
		alert('New password fields are not matching...!');
	}
}


function UpdateUserName() {
//	var user_id = $j('#user_id').val();
//	var emp_id = $j('#emp_id').val();
	var usernamemanage = $j('#currusernamemanage1').val();
	var usernamemanage1 = $j('#usernamemanage').val();
     

	if ($j.trim(usernamemanage) !== '', $j.trim(usernamemanage) !== '') {
		$j.ajax({
			url: 'updateUserName',
			method: 'post',
			data: {'usernamemanage': usernamemanage, 'usernamemanage1': usernamemanage1},
			success: function (data) {
				if (data > 0) {
					alert("Succesfully Updated");

				} else {
					alert("Error")
				}
			},
			error: function () {
				alert('Error');
			}
		});
	}
	else {
		alert('New user name field is required.!');
	}
}