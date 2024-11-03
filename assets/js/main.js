let mainColor = localStorage.getItem('main-color');
    if (mainColor !== null) {
        document.documentElement.style.setProperty('--main-color', mainColor);
        document.documentElement.style.setProperty('--main-alt-color', `${mainColor}66`);
    }
let alertClose = document.querySelector('.alert-close');
let alertmsg = document.querySelector('.alert');
// console.log(alertmsg);
if (alertClose && alertmsg) {
    alertClose.addEventListener('click', ()=>{alertmsg.style.display = 'none'});
}
let linksDropDown = document.querySelector('.linksDropdown');
let linksUl = document.getElementById('dropdown');
    // linksDropDown.addEventListener("click", function(){
    //     console.log(linksUl);
    //     linksUl.classList.toggle('block');
    // });
if (linksDropDown) {
    
    document.addEventListener("click", function handleClick(event){
        if (event.target == linksDropDown) {
            linksUl.classList.toggle('block');
            // console.log(event.target);
        }else{
            linksUl.classList.remove('block');
        }
    });
}
    

// ----------------------------------- Stop and start the auto change slider images -----------

    let autoChangeSlide;
    let changeSliderImages = localStorage.getItem('slider-opt');
    let yesBtn = document.querySelector('.yes');
    let noBtn = document.querySelector('.no');
    
    // Interval();
    if (changeSliderImages || yesBtn || noBtn) {
        if (changeSliderImages !== null) {
            if (changeSliderImages === 'yes') {
                yesBtn.classList.add('active');
                noBtn.classList.remove('active');
                Interval();
            }
            if (changeSliderImages === 'no') {
                noBtn.classList.add('active');
                yesBtn.classList.remove('active');
                clearInterval(autoChangeSlide);
            }
        }else{
            Interval();
        }
        yesBtn.onclick = function () {
            localStorage.setItem('slider-opt', 'yes');
            clearInterval(autoChangeSlide);
            yesBtn.classList.add('active');
            noBtn.classList.remove('active');
            Interval();
        }
        noBtn.onclick = function () {
            localStorage.setItem('slider-opt', 'no');
            noBtn.classList.add('active');
            yesBtn.classList.remove('active');
            clearInterval(autoChangeSlide);
        }
    }

    // ----------------------------------- Slider Images functionality -----------
    let sliderImages = document.querySelectorAll('.image-slider img');
    let slideImagesCount = sliderImages.length;
    let currentSlide = 0;
    let leftArrow = document.querySelector('.left-arrow');
    let rightArrow = document.querySelector('.right-arrow');

    let bullets = document.querySelector('.bullets');
    createBullets();
    if (sliderImages && leftArrow && rightArrow) {
        leftArrow.onclick = prevSlide;
        rightArrow.onclick = nextSlide;
    }
    // ---------------- creating the bullets as listItem (li) and assign the framework classes  --------------------
    function createBullets() {
        for (let i = 0; i < slideImagesCount; i++) {
            let bullet = document.createElement("li");
            bullet.setAttribute('class', 'bg-dark-grey rad-50 flex-center ml-2 mr-2 border-black');
            bullet.setAttribute('data-index', i);
            if (currentSlide === i) {
                bullet.classList.add('active');
            }
            bullets.appendChild(bullet);
        }
    }
    // ---------------- casting the created bullets --------------------
    let createdBullets = document.querySelectorAll('.bullets li');
    // ---------------- adding click eventListener to each bullet (li) and assign its data-index attr to currentSlide --------------------
    createdBullets.forEach(bulletLi => {
        bulletLi.addEventListener('click', function (e) {
            clearInterval(autoChangeSlide);
            currentSlide = parseInt(bulletLi.getAttribute('data-index'));
            SlideControl();
            changeSliderImages = localStorage.getItem('slider-opt');
            if (changeSliderImages !== null) {
                if (changeSliderImages === 'yes') {
                    Interval();
                }
            }else{
                clearInterval(autoChangeSlide);
                Interval();
            }
        })
    });

    // ---------------- going to the next slider image --------------------
    function nextSlide() {
        clearInterval(autoChangeSlide);
        console.log('next');
        if (currentSlide < slideImagesCount - 1) {
            currentSlide++;
        } else {
            currentSlide = 0;
        }
        console.log(currentSlide);
        SlideControl();
        changeSliderImages = localStorage.getItem('slider-opt');
        if (changeSliderImages !== null) {
            if (changeSliderImages === 'yes') {
                Interval();
            }
        }else{
            clearInterval(autoChangeSlide);
            Interval();
        }
    }
    // ---------------- going to the previous slider image --------------------
    function prevSlide() {
        clearInterval(autoChangeSlide);
        console.log('previous');
        if (currentSlide > 0) {
            currentSlide--;
        } else {
            currentSlide = slideImagesCount - 1;
        }
        console.log(currentSlide);
        SlideControl();
        changeSliderImages = localStorage.getItem('slider-opt');
        if (changeSliderImages !== null) {
            if (changeSliderImages === 'yes') {
                Interval();
            }
        }else{
            clearInterval(autoChangeSlide);
            Interval();
        }
    }

    // ---------------- Auto Swip Slide Images --------------------
    function Interval() {
        autoChangeSlide = setInterval(() => {
            if (currentSlide < slideImagesCount - 1) {
                currentSlide++;
            } else {
                currentSlide = 0;
            }
            SlideControl();
        
        }, 3000);
    }
    // ---------------- control the active image and the active bullet --------------------
    
    SlideControl();
    function SlideControl() {
        // if (sliderImages[currentSlide]) {
            
            sliderImages.forEach(slide => {
                slide.classList.remove('active');
            });
            if (sliderImages[currentSlide]) {
            sliderImages[currentSlide].classList.add('active');
            }
            
            createdBullets.forEach(bullet => {
                bullet.classList.remove('active');
            });
            if (createdBullets[currentSlide]) {
                createdBullets[currentSlide].classList.add('active');
            }
        // }
    }

    // ----------------------------------- open settings box -----------------------------------------------------------------
    let gear = document.getElementById('gear');
    // let gearLink = document.getElementById('settings-link');
    let gearIcon = document.querySelector('.gear-icon');
    let settings = document.querySelector('.settings');
    if (gear) {
        
        gear.onclick = openSettings;
    }
    // gearLink.onclick = openSettings;

    function openSettings() {
        settings.classList.toggle('open');
        gearIcon.classList.toggle('fa-spin');
    }
    // ----------------------------------- create colors list in settings box -----------------------------------------------------------------
    const colorsArray = ['#009688','#ff9800','#E91E63','#03A9F4','#4CAF50'];
    let colorsList = document.querySelector('.settings .settings-box .option-box .colors-list');
    if (colorsList) {
        
        for (let i = 0; i < colorsArray.length; i++) {
            let color = document.createElement("li");
            color.setAttribute('class', 'rad-50 m-5');
            color.setAttribute('data-color', colorsArray[i]);
            color.style.setProperty('background-color',colorsArray[i]);
            colorsList.appendChild(color);
        }
    }
    // ----------------------------------- get and set the color from and to Local Storage ------------------------------------------------------
    
    // ----------------------------------- assign selected color to the main color in the root and asign active class to the color -----------
    let colors = document.querySelectorAll('.settings .settings-box .option-box .colors-list li');
    colors.forEach(colorLi => {
        if (colorLi.dataset.color === mainColor) {
            colorLi.classList.add('active');
        }
        if (mainColor === null) {
            colors[0].classList.add('active');
        }
        colorLi.addEventListener('click',(e)=>{
            colors.forEach(li =>{
                li.classList.remove('active');
            });
            e.target.classList.add('active');
            document.documentElement.style.setProperty('--main-color', e.target.dataset.color);
            document.documentElement.style.setProperty('--main-alt-color', `${e.target.dataset.color}66`);
            localStorage.setItem('main-color', e.target.dataset.color);
        });
    });
    // ----------------------------------- animate the progress bar when reveal on screen -----------
    // if () {
        let skillsSection = document.querySelector('.our-skills');
        let progressBars = document.querySelectorAll('.our-skills .skill .skill-progress .progress-bar');
        if (skillsSection && progressBars) {
            
            window.onscroll = function () {
                let screenHeight = this.innerHeight;
                let sectionHeight = skillsSection.offsetHeight;
                let sectionOffsetTopPage = skillsSection.offsetTop;
                let windowScrollTop = this.scrollY;
                
                if (windowScrollTop > (sectionOffsetTopPage + sectionHeight - screenHeight - 100)) {
                    progressBars.forEach(progBar => {
                        progBar.style.width = progBar.dataset.width;
                    });
                } else {
                    progressBars.forEach(progBar => {
                        progBar.style.width = 0;
                    });
                }
            };
        }
    // }
    // ----------------------------------- display gallery image in popup ----------------------------------------
    let currentFlashCard = 0;
    let galleryOverlay = document.querySelector('.gallery-overlay');
    let galleryLeftArrow = document.querySelector('.gallery-overlay .left-arrow');
    let galleryRightArrow = document.querySelector('.gallery-overlay .right-arrow');
    let closeOverlay = document.querySelector('.gallery-overlay .close-overlay');
    let galleryOverlayTxt = document.querySelector('.gallery-overlay h3');
    let overlayCard = document.querySelector('.gallery-overlay .card-img img');
    let flashingCards = document.querySelectorAll('.gallery .flashing-card img');

    // ----------------------------------- show the popup when clicking any gallery image and add the heading if alt is exist ----------------------------------------
    flashingCards.forEach((flashCard, indexs) => {
        flashCard.addEventListener('click', (e)=>{
            galleryOverlay.style.display = 'flex';
            let selectedImgSrc = e.target.src;
            let selectedImgAlt = e.target.alt;
            overlayCard.src = selectedImgSrc;
            galleryOverlayTxt.innerHTML = selectedImgAlt;
            currentFlashCard = indexs;
            console.log(currentFlashCard);
        });
    });
    // ----------------------------------- arrows to go to next and previous image in popup ----------------------------------------
    if (galleryLeftArrow && galleryRightArrow) {
        
        galleryLeftArrow.onclick = function () {
            if (currentFlashCard > 0) {
            currentFlashCard --;
            }else{
                currentFlashCard = flashingCards.length - 1;
            }
            overlayCard.src = flashingCards[currentFlashCard].src;
            galleryOverlayTxt.innerHTML = flashingCards[currentFlashCard].alt;
        }
        galleryRightArrow.onclick = function () {
            if (currentFlashCard < flashingCards.length - 1) {
                currentFlashCard ++;
            }else{
                currentFlashCard = 0;
            }
            overlayCard.src = flashingCards[currentFlashCard].src;
            galleryOverlayTxt.innerHTML = flashingCards[currentFlashCard].alt;
        }
    }
    // ----------------------------------- close the popup with X button  ----------------------------------------
    if (closeOverlay) {
        
        closeOverlay.onclick = function () {
            galleryOverlay.style.display = 'none';
        }
    }
    // ----------------------------------- close the popup with Esc button  ----------------------------------------
    document.onkeydown = function (e) {
        if (e.key === 'Escape' || e.key === 'Esc') {
            galleryOverlay.style.display = 'none';
        }
    }
    // ----------------------------------- creating sections navigation bullets ----------------------------------------
    // let sections = document.querySelectorAll('section');
    // let sideBullets = document.querySelector('.side-bullets');
    // sections.forEach(section => {
    //     let sectionId = section.id;
    //     let secBulletDiv = document.createElement('div');
    //     secBulletDiv.setAttribute('class','bullet rad-50 relative w-full mb-10');
    //     secBulletDiv.setAttribute('data-section',sectionId);
    //     let toolTipDiv = document.createElement('div');
    //     toolTipDiv.setAttribute('class','tool-tip c-white bg-main p-5 txt-c absolute rad-6');
    //     toolTipDiv.innerHTML = sectionId;
    //     secBulletDiv.appendChild(toolTipDiv);
    //     sideBullets.appendChild(secBulletDiv);
    // });
    // ----------------------------------- use sections navigation bullets and navbar links to scroll to sections ----------------------------------------
    // let theSecBullets = document.querySelectorAll('.side-bullets .bullet');
    // scrollTo(theSecBullets);

    // let navLinks = document.querySelectorAll('.nav-bar .links a');
    // scrollTo(navLinks);

    // function scrollTo(element) {
    //     element.forEach(ele => {
    //         ele.addEventListener('click', (e)=>{
    //             e.preventDefault();
    //             if (!e.target.classList.contains('setting-link')) {
    //                 element.forEach(el => {
    //                     el.classList.remove('active');
    //                 });
    //                 console.log(e.target.dataset.section);
    //                 e.target.classList.add('active');
    //                 document.getElementById(e.target.dataset.section).scrollIntoView({
    //                     behavior : 'smooth'
    //                 });
    //             }
    //         });
    //     });
    // }
    // ----------------------------------- Reset local storage options ----------------------------------------
    let resetBtn = document.querySelector('.settings .reset-button');
    if (resetBtn) {
        
        resetBtn.onclick = function () {
            localStorage.clear();
            document.location.reload();
        }
    }
let eyes = document.querySelectorAll('.eye');
if (eyes) {
    eyes.forEach((eye) => {
        eye.addEventListener('click', (e) => {
            if (e.target.parentElement.querySelector('input').type === 'password') {
                e.target.parentElement.querySelector('input').type = 'text';
                e.target.classList.add('fa-eye-slash');
                e.target.classList.remove('fa-eye');
            } else {
                e.target.parentElement.querySelector('input').type = 'password';
                e.target.classList.add('fa-eye');
                e.target.classList.remove('fa-eye-slash');
            }
        });
    });
}

// ----------------------------------- burgerBar toggle menu ----------------------------------------
// let burgerBars = document.querySelector('.nav-bar .burger-bars');
// let navLinksContainer = document.querySelector('.nav-bar .links');
// let links = document.querySelectorAll('.nav-bar .links li a');
// burgerBars.addEventListener('click', () => {
//     navLinksContainer.classList.toggle('active');
// });
// links.forEach(link => {
//     link.addEventListener('click', () => {
//         navLinksContainer.classList.toggle('active');
// });
// });

// document.addEventListener('click', (e) =>{
//     if (e.target !== burgerBars && e.target !== navLinksContainer) {
//         navLinksContainer.classList.remove('active');
//     }
// });

// if (document.querySelectorAll('input[type="number"]')) {
//     document.querySelectorAll('input[type="number"]').forEach(input => {
//         input.onkeydown = (e) => {
//             if (e['key'] != Number) {
//                 console.log('numbers only');
//             }
//             // console.log(typeof(e['key']));
//             // console.log(e);
//         };
//     });
// }
$('.small-img').click(function(){
    $(this).addClass('active').siblings().removeClass('active');
    let smallSrc = $(this).children('img').attr('src');
    $(this).parents('.images').children('.big-image').children('img').attr('src', smallSrc);
    // $('.big-image img').attr('src', smallSrc);
    // console.log(smallSrc);
});
$(document).on('click','.addToCartBtn', function (e) {
    e.preventDefault();
    let prod_id = $(this).val();
    console.log(prod_id);
    $.ajax({
        method: "POST",
        url: "functions/handlecart.php",
        data: {
            'prod_id': prod_id,
            'scope': 'add',
        },
        success: function (response) {
            console.log(response);
            if (response == 401) {
            alertify.error('Login To Continue');
            }
            else if (response == 201) {
            alertify.success('Added To Cart Successfuly');
            $("#update-count-parent").load(location.href + " #update-count");
            

            }
            else if (response == 500) {
            alertify.error('Something Went Wrong');
            }
            else if (response == 'existing') {
            alertify.error('Already In Cart');
            }
        }
    });
});
$(document).on('click','.addToWishlistBtn', function (e) {
    e.preventDefault();
    let prod_id = $(this).val();
    console.log(prod_id);
    $.ajax({
        method: "POST",
        url: "functions/handlewishlist.php",
        data: {
            'prod_id': prod_id,
            'scope': 'add',
        },
        success: function (response) {
            console.log(response);
            if (response == 401) {
            alertify.error('Login To Continue');
            }
            else if (response == 201) {
            alertify.success('Added To wishlist Successfuly');
            $("#update-count-parent").load(location.href + " #update-count");

            }
            else if (response == 500) {
            alertify.error('Something Went Wrong');
            }
            else if (response == 'existing') {
            alertify.error('Already In wishlist');
            }
        }
    });
});
$(document).on('click','#delete-cart-item-btn', function (e) {
    e.preventDefault();
    let prod_id = $(this).val();
    
    $.ajax({
        method: "POST",
        url: "functions/handlecart.php",
        data: {
            'prod_id': prod_id,
            'scope': 'delete',
        },
        success: function (response) {
            console.log(response);
            if (response == 401) {
            alertify.error('Login To Continue');
            }
            else if (response == 201) {
            alertify.success('Item Deleted From Cart Successfuly');
            }
            else if (response == 500) {
            alertify.error('Something Went Wrong');
            }
            // $("#cart_table_parent").load(location.href + " #cart_table");
            window.location.reload();

        }
    });
});
$(document).on('click','#delete-wishlist-item-btn', function (e) {
    e.preventDefault();
    let prod_id = $(this).val();
    
    $.ajax({
        method: "POST",
        url: "functions/handlewishlist.php",
        data: {
            'prod_id': prod_id,
            'scope': 'delete',
        },
        success: function (response) {
            console.log(response);
            if (response == 401) {
            alertify.error('Login To Continue');
            }
            else if (response == 201) {
            alertify.success('Item Deleted From wishlist Successfuly');
            }
            else if (response == 500) {
            alertify.error('Something Went Wrong');
            }
            // $("#cart_table_parent").load(location.href + " #cart_table");
            window.location.reload();

        }
    });
});

$(document).on('click','.refresh-chat', function () {
    $("#chat-parent").load(location.href + " #chat");
});

$(document).on('click','.ratingBtn', function (e) {
    let rate = e.target.dataset.rating;
    e.preventDefault();
    let prod_id = $(this).val();
    console.log(rate);
    // console.log('ok');
    $.ajax({
        method: "POST",
        url: "functions/handlerating.php",
        data: {
            'prod_id': prod_id,
            'rate': rate,
            'rating': true,
        },
        success: function (response) {
            console.log(response);
            if (response == 401) {
            alertify.error('Login To Continue');
            }
            else if (response == 201) {
            alertify.success('Thanks for Rating');
            location.reload();
            }
            else if (response == 500) {
            alertify.error('Something Went Wrong');
            }
            else if (response == 'existing') {
            alertify.error('Already In Cart');
            }
        }
    });
});
$('#store_change').on('change',function () {
    var store_id = $(this).val();
    console.log(store_id);
    // $.post("add-product.php",{
    //         parent_cat_id : parent_id,
    //         // "get_sub_cat" : "check_sub"
    //     },function (data, status) {
            
    //     })
    $.ajax({
        type: "POST",
        url: "functions/ajax-con.php",
        data: {
            'store_id' : store_id,
        },
        success: function (response) {
            // console.log(response);
            window.location.href=(response);
        }
    });
});

let frm = $('#subscribe');
frm.submit(function (e) {
    e.preventDefault();

    $.ajax({
        type: frm.attr('method'),
        url: frm.attr('action'),
        data: frm.serialize(),
        success: function (response){
            if (response == 201) {
                console.log (response);
                alertify.success('Thanks for subscription');
                
            }else if (response == 300) {
                alertify.error('already subscribed!');
                
            }else if (response == 500) {
                alertify.error('something went wrong! please try again');
    
                }
        },
        error: function (response){
            // console.log (response);
            // alertify.error('wrong');
            // if (response == 201) {

            // }else if (response == 500) {

            // }
        }
    });
});
let contactFrm = $('#contact');
contactFrm.submit(function (e) {
    e.preventDefault();

    $.ajax({
        type: contactFrm.attr('method'),
        url: contactFrm.attr('action'),
        data: contactFrm.serialize(),
        success: function (response){
            if (response == 201) {
                console.log (response);
                alertify.success('Message Sent Succefully');
                
            }else if (response == 500) {
                alertify.error('Please Confirm You Are Not Robot');
    
                }
        },
        error: function (response){
            // console.log (response);
            // alertify.error('wrong');
            // if (response == 201) {

            // }else if (response == 500) {

            // }
        }
    });
});


$('.lang-desc').not('.english').hide();
$('.lang-desc').filter('.english').show();

$('ul.lang li a.nav-link').on('click',function(){
    console.log ('clicked');
    $(this).addClass('active').parents('.nav-item').siblings().children('.nav-link').removeClass('active');
    // $('#gallery h3.main span').html($(this).html());

    let lang = $(this).attr('data-lang');
    $('.lang-desc').not('.'+ lang).hide();
    $('.lang-desc').filter('.' + lang).show();
    // if(filter == 'all'){
    //     $('#gallery .all-product').show();
    // }else{
    //     $('#gallery .all-product').not('.'+ filter).hide();
    //     $('#gallery .all-product').filter('.' + filter).show();
    // }
});