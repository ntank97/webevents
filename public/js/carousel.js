$('.banner').owlCarousel({
    item:1,
    loop:true,
    margin:10,
    responsiveClass:true,
    dots:true,
    nav:true,
    autoplay:true,
    autoplayTimeout:3000,
    responsive:{
        0:{
            items:1,
        },
        600:{
            items:1,
        },
        1000:{
            items:1 ,
        }
    }
})
$('.fashion').owlCarousel({
    loop:true,
    margin:10,
    responsiveClass:true,
    // dots:true,
    nav:true,
    autoplay:false,
    autoplayTimeout:8000,
    responsive:{
        0:{
            items:1,
        },
        600:{
            items:3,
        },
        1000:{
            items:4 ,
        }
    }
})

$('.contact').owlCarousel({
    loop:true,
    margin:10,
    responsiveClass:true,
    dots:false,
    nav:false,
    autoplay:false,
    autoplayTimeout:3000,
    responsive:{
        0:{
            items:1,
        },
        600:{
            items:3,
        },
        1000:{
            items:5 ,
        }
    }
})

$('.doitac').owlCarousel({
    loop:true,
    margin:10,
    responsiveClass:true,
    dots:true,
    nav:true,
    // autoplay:false,
    autoplayTimeout:8000,
    responsive:{
        0:{
            items:1,
        },
        600:{
            items:4,
        },
        1000:{
            items:7 ,
        }
    }
})

$('.nhansu').owlCarousel({
    loop:true,
    margin:10,
    responsiveClass:true,
    dots:true,
    nav:false,
    // autoplay:false,
    autoplayTimeout:8000,
    responsive:{
        0:{
            items:1,
        },
        600:{
            items:3,
        },
        1000:{
            items:3 ,
        }
    }
})
