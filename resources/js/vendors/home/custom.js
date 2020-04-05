
// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    document.getElementById("myBtn").style.display = "block";
  } else {
    document.getElementById("myBtn").style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}

$( ".dropdown-menu" ).css('margin-top',0);
$( ".dropdown" )
.mouseover(function() {
	$( this ).addClass('show').attr('aria-expanded',"true");
	$( this ).find('.dropdown-menu').addClass('show');
})
.mouseout(function() {
	$( this ).removeClass('show').attr('aria-expanded',"false");
	$( this ).find('.dropdown-menu').removeClass('show');
});