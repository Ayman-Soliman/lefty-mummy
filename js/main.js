$(document).ready(function(){
    $('nav .links li a').click(function(){
        
        $(this).addClass('active').parents().siblings().children().removeClass('active');
    });

    $('.fa-bars').click(function(){
        $(this).toggleClass('fa-times');
        $('nav').toggleClass('mob-nav');
    });
    
    $('nav .links li a').click(function(){
        $('.fa-bars').removeClass('fa-times');
        $('nav').removeClass('mob-nav');
        
    });
    
    $('#gallery ul.controls li').click(function(){
        $(this).addClass('active').siblings().removeClass('active');
        $('#gallery h3.main span').html($(this).html());

        let filter = $(this).attr('data-filter');
        if(filter == 'all'){
            $('#gallery .all-product').show();
        }else{
            $('#gallery .all-product').not('.'+ filter).hide();
            $('#gallery .all-product').filter('.' + filter).show();
        }
    });
    
    $('.fa-search').click(function(){

        $('body').css('overflow', 'hidden');
        $(this).parents('.box').siblings('.popup-overlay').show();
        // let firstSmall = (this).parents('.box').siblings('.popup-overlay .first');
        // $(firstSmall).addClass('active').parent().siblings().children().removeClass('active');
    });
    $('.small-img img').click(function(){
        $(this).addClass('active').parent().siblings().children().removeClass('active');
        let smallSrc = $(this).attr('src');
        $(this).parents('.images').children('.big-image').children('img').attr('src', smallSrc);
        // $('.big-image img').attr('src', smallSrc);
        // console.log(smallSrc);
    });

    $('.fa-times').click(function(){
        let bigSrc = $(this).siblings('.images').children('.small-iamges').children('.first').children('img').attr('src');
        // console.log($(this).siblings('.images').children('.small-iamges').children('.first').children('img').attr('src'));
        $('.first img').addClass('active').parent().siblings().children().removeClass('active');
        $(this).siblings('.images').children('.big-image').children('img').attr('src', bigSrc);
        $(this).parents('.popup-overlay').hide();
        $('body').css('overflow', 'auto');  
    });
    
    $('.accordion-item').click(function(){
        $(this).toggleClass('open');
    });

    
    
    $(window).on('scroll load', function(){
        if($(window).scrollTop() > 380){
            $('nav').addClass('fixed-header');
        }else
        {
            $('nav').removeClass('fixed-header');
        }

        $('.fa-bars').removeClass('fa-times');
        $('nav').removeClass('mob-nav');

        $('section').each(function(){
            let top = $(window).scrollTop();
            let height = $(this).height();
            let offset = $(this).offset().top - 200;
            let id = $(this).attr('id');

            if(top >= offset && top < offset + height){
                $('nav .links ul li a').removeClass('active');
                // console.log(id);
                // $('nav .links ul li a').find('[href="#${id}"]').addClass('active');
                $('nav').find(`[href='#${id}']`).addClass('active');
            }else if(top < 400){
                $('nav .links ul li a').removeClass('active');
                $('nav').find(`[href="index.html"]`).addClass('active');
            }
            
        });

        

        
    });
    
    
    
});