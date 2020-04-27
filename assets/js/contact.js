window.addEventListener('load', function() {
    

    document.querySelector('.bloc-droit li:nth-child(4)').classList.add('active');

    var form = document.querySelector('form');

    for(var i = 0 ; i < form.length ; i++) {

        form[i].addEventListener('blur', function (ev) {

            this.classList.add('active')
        })

    }

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

    if(document.querySelector('.success')) {

        document.querySelector('.success').style.display = 'block';
        window.setTimeout(function() {

            document.querySelector('.success').style.display = 'none';

        }, 3000)
    }
});
