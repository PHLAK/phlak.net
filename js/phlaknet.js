$(document).ready(function() {

    // Calculate on page load
    centerElement($('.image-wrapper'));

    // Calculate on window resize
    $(window).resize(function() {
        centerElement($('.image-wrapper'));
    });

});

function centerElement(thisElement) {

    // Calculate the offsets
    var topOffset  = -(thisElement.height() / 2) + 'px';
    var leftOffset = -(thisElement.width() / 2) + 'px';

    console.log(topOffset, leftOffset);

    // Set the element postiton
    thisElement.css({ 'margin-top': topOffset, 'margin-left': leftOffset })

}
