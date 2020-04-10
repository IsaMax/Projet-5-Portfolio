window.addEventListener('load', function() {

    gsap.to('.infos-contact .mail', {
        x:0,
        opacity:1
    });

    gsap.to('.infos-contact .tel', {
        x:0,
        opacity:1
    });

    gsap.to('.container-contact form', {
        y:'60px',
        opacity:1,
        delay: .5
    });
});
