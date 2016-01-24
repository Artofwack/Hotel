/**
 * Created by ArtofWack on 11/2/2015.
 */
$(document).ready(function () {
	var loginForm = $('form');
	var reg_form = $('.regForm');
	loginForm.validate();
	reg_form.validate();

	/* Log in using ajax post request */
	$('.loginButton').on('click', function () {
		$.post('logIn.php', {
				'email': $('#email').val(),
				'pass': $('#pass').val()
			}, function (data) {
				if (data === 'logged') {
					$('#myModal').modal('hide');
					location.reload();
				} else {
					$('#notice').html(data);
				}
			}
		);
	});

	/* Register using Ajax post request */
	$('.regButton').on('click', function () {
		if (reg_form.valid()) {
			$.post('register.php', {
					'firstName': $('#firstName').val(),
					'lastName': $('#lastName').val(),
					'email': $('#regEmail').val(),
					'pass': $('#regPass').val()
				}, function (data) {
					if (data === '') {
						$('#registerModal').modal('hide');
					} else {
						$('#notice2').html(data);
					}
				}
			);
		} else {
			$('#notice2').text("Validation Error");
		}
	});
});