const d1 = document.querySelector(".d1");
const d2 = document.querySelector(".d2");
const l = document.querySelectorAll(".d2 li");

d1.addEventListener('click', () => {
    d2.classList.toggle("open");

});


function searchToggle(obj, evt) {
    var container = $(obj).closest('.search-wrapper');
    if (!container.hasClass('active')) {
        container.addClass('active');
        evt.preventDefault();
    } else if (container.hasClass('active') && $(obj).closest('.input-holder').length == 0) {
        container.removeClass('active');
        // clear input
        container.find('.search-input').val('');
    }
}