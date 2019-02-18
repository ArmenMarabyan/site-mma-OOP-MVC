var userIcon = document.getElementsByClassName('header__top-user'),
	userSignIn = document.getElementsByClassName('user__signIn');


$(document).ready(function() {
	$('.user__icon').on('click', function() {
		$('.user__signIn').toggleClass('user__signIn-active');
		
		if($('.user__signIn').hasClass('user__signIn-active')) {
			$('.user__icon').html('<i class="fas fa-times"></i>')
		}else {
			$('.user__icon').html('<i class="fas fa-user"></i>')
		}

	})
})

window.onscroll = function() {myFunction()};

				var sidebar = document.getElementById("sidebar");
				var sticky = document.getElementById("sticky").offsetTop;

				console.log(sticky)

				function myFunction() {
				  if (window.pageYOffset > sticky) {
				    sidebar.classList.add("sticky");
				  } else {
				    sidebar.classList.remove("sticky");
				  }
				}