const nav = document.querySelector('#nav');
const onScroll = () => {
    const scrollPosition = window.scrollOffsetY;
    nav
     .classList
     .toggle(
        "scrolled-down",
        scrollPosition > 56
     );
};

document.addEventListener("scroll", onScroll, {passive:true});