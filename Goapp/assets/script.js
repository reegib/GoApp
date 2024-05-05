const accordions =  document.querySelectorAll('.menu-item')
const accordion =  document.querySelectorAll('.container_faq')


accordions.forEach( x => {
    x.addEventListener('click', function(){
        const el = x.lastElementChild
        el.classList.toggle('submenu_active');
        
    })
})

accordion.forEach( x => {
    x.addEventListener('click', function(){
        const img = x.lastElementChild
        img.classList.toggle('img_active')
        
    })
})



const dots = document.querySelectorAll('.dot')
const slides = document.querySelectorAll('.slide')

dots.forEach((dot, i) => {

    dot.addEventListener('click', () => {

        slides.forEach(slide => {
            slide.classList.remove('active')
        })

        dots.forEach(dot => {
            dot.classList.remove('active')
        })

        slides[i].classList.add('active')
        dot.classList.add('active')

    })

})