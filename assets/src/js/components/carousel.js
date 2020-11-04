/**
 * Carousel JS.
 *
 */
var slideIndex = 1;
var homeURL = document.location.origin.concat ( '/' );
var defaultLink = document.location.origin.concat ( '/#' );
function showDivs( n ) {
	var i;
	var posts = document.getElementsByClassName( 'carousel__slides' );
	if ( n > posts.length ) {
		slideIndex = 1;
	};
	if ( 1 > n ) {
		slideIndex = posts.length;
	}
	for ( i = 0; i < posts.length; i++ ) {
		posts[i].style.display = 'none';
	}
	posts[slideIndex - 1].style.display = 'block';
};

if ( homeURL === document.location.href || defaultLink === document.location.href ) {
	document.getElementById( 'carousel__button--prev' ).addEventListener( 'click', function() {
		slideIndex += 1;
		showDivs( slideIndex );
	}
	);

	document.getElementById( 'carousel__button--next' ).addEventListener( 'click', function() {
		slideIndex -= 1;
		showDivs( slideIndex );
	}
	);

	showDivs( slideIndex );
}
