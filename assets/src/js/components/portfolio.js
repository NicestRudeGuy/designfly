/* eslint-disable indent */
/**
 * Portfolio JS.
 *
 */

console.log( 'pathname ' + window.location.pathname );

if ( '/portfolio/' === window.location.pathname || '/' === window.location.pathname ||
    '/portfolio/page/2/' === window.location.pathname ) {

    let a = 0;

    const lightBox = document.createElement( 'div' );
    lightBox.classList.add( 'lightbox' );
    document.body.appendChild( lightBox );

    const lightBoxImg = document.createElement( 'div' );
    lightBoxImg.classList.add( 'lightbox-img' );

    document.querySelector( '.lightbox' ).appendChild( lightBoxImg );

    const close = document.createElement( 'div' );
    close.classList.add( 'lightbox-close' );

    const next = document.createElement( 'div' );
    next.classList.add( 'lightbox-next' );

    const prev = document.createElement( 'div' );
    prev.classList.add( 'lightbox-prev' );

    const title = document.createElement( 'div' );
    title.classList.add( 'lightbox-title' );

    const  images = document.querySelectorAll(  ' .wp-post-image ' );

    const img = document.createElement( 'img' );

    images.forEach( image =>{
        image.addEventListener( 'click', e => {

            lightBox.classList.add( 'active' );

            close.textContent = 'X';
            next.textContent = '→';
            prev.textContent = '←';
            title.textContent = 'lorem ipsum dolor sit amet';

            img.src = image.src;
            img.classList = image.classList;

            while ( lightBoxImg.firstChild ) {
                lightBoxImg.removeChild( lightBoxImg.firstChild );
            }

            lightBoxImg.appendChild( img );
            lightBoxImg.appendChild( title );
            lightBoxImg.appendChild( close );
            lightBoxImg.appendChild( next );
            lightBoxImg.appendChild( prev );

        } );
    } );

    const total = images.length;

    close.addEventListener( 'click', e => {
        if ( e.target !== e.currentTarget ) {
            return ;
        }
        lightBox.classList.remove( 'active' );
    } );

    next.addEventListener( 'click', e => {
        console.log( 'clicked next' );
        if ( ( total - 1 ) > a ) {
            ++a;
            img.src = images[a].src;
        } else {
            console.log( 'cant go further' );
        }
    } );

    prev.addEventListener( 'click', e => {
        console.log( 'clicked prev' );
        if ( 0 < a ) {
            --a;
            img.src = images[a].src;
        } else {
            console.log( 'cant go below' );
        }
    } );

}
