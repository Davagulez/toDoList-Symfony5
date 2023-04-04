const nav = document.querySelector('#nav');
let lastScrollPosition = 0;

const onScroll = () => {
    const scrollPosition = window.pageYOffset;
    if (scrollPosition > lastScrollPosition) {
        nav.classList.add('scrolled-down'); 
    } else {
        nav.classList.remove('scrolled-down');
    }
    lastScrollPosition = scrollPosition;
    /*nav.classList.toggle("scrolled-down", scrollPosition > 56 );
    console.log(scrollPosition);*/
};

document.addEventListener("scroll", onScroll, {passive:true});