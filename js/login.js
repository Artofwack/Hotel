/**
 * Created by ArtofWack on 11/2/2015.
 */
$(document).ready(function () {
	/* Log in using ajax post request */
	$('.loginButton').on('click', function () {
		var notice = $('#notice');
		var modal = $('#myModal');
		$.post('logIn.php', {
				'email': $('#email').val(),
				'pass': $('#pass').val()
			}, function (data) {
				if (data == '<label class="text-success">Logged In</label>') {
					$('#myModal').modal('hide');
					location.reload();
				} else {
					notice.html(data);
				}
			}
		);

	});

	/* Register using Ajax post request */
	$('.regButton').on('click', function () {
		$.post('register.php', {
			'firstName': $('#firstName').val(),
			'lastName': $('#lastName').val(),
			'email': $('#regEmail').val(),
			'pass': $('#regPass').val()
		}, function (data) {
			if (data === '') {
				$('#registerModal').modal('hide');
				location.reload();
			} else {
				$('nav').hide();
			}
		});
	});
});