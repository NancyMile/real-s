document.addEventListener('DOMContentLoaded', function(){
    eventListeners();
});

function eventListeners() {
    const menuMobile = document.querySelector('.menu-mobile');
    menuMobile.addEventListener('click', responsiveNavigation);
}

function responsiveNavigation() {
    const navigation = document.querySelector('.navigation');
    if (navigation.classList.contains('display-menu')) {
        navigation.classList.remove('display-menu')
    } else {
        navigation.classList.add('display-menu')
    }
}