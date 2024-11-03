let mainColor = localStorage.getItem('main-color');
if (mainColor !== null) {
    document.documentElement.style.setProperty('--main-color', mainColor);
    document.documentElement.style.setProperty('--main-color-alt', `${mainColor}cc`);
}
let alertClose = document.querySelector('.alert-close');
let alertmsg = document.querySelector('.alert');
// console.log(alertmsg);

$('#parent_cat').on('change',function () {
    var parent_id = $(this).val();
    // console.log(parent_id);
    // $.post("add-product.php",{
    //         parent_cat_id : parent_id,
    //         // "get_sub_cat" : "check_sub"
    //     },function (data, status) {
            
    //     })
    $.ajax({
        type: "POST",
        url: "functions/ajax-con.php",
        data: {
            parent_cat_id : parent_id,
            // "get_sub_cat" : "check_sub"
        },
        // dataType: "dataType",
        success: function (response) {
            $('#sub_cat').html(response);
            // console.log(response);
        }
    });
})
$('#prod_parent_cat').on('change',function () {
    var parent_id = $(this).val();
    var sub_cat_id= $(this).attr('sub_cat_id')
    console.log(parent_id);
    // $.post("add-product.php",{
    //         parent_cat_id : parent_id,
    //         // "get_sub_cat" : "check_sub"
    //     },function (data, status) {
            
    //     })
    $.ajax({
        type: "POST",
        url: "functions/ajax-con.php",
        data: {
            parent_cat_id : parent_id,
            subCatId : sub_cat_id,
            // "get_sub_cat" : "check_sub"
        },
        // dataType: "dataType",
        success: function (response) {
            $('#sub_cat').html(response);
            console.log(response);
        }
    });
})
var price_after_discount = $('#price_after_discount');
$('#original_price').on('change',function () {
    var original_price       = $(this).val();
    var price_discount       = $('#price_discount').val();
    
    price_after_discount.val( original_price - (original_price * price_discount/100));
    // console.log(price_after_discount);
    // $.post("add-product.php",{
        //         parent_cat_id : parent_id,
        //         // "get_sub_cat" : "check_sub"
        //     },function (data, status) {
            
            //     })
            
        })
$('#price_discount').on('change',function () {
    // var price_after_discount = $('#price_after_discount');
    var price_discount       = $(this).val();
    var original_price       = $('#original_price').val();
    console.log('original price is : '+ original_price);
    // if (original_price > 0) {
    price_after_discount.val( original_price - (original_price * price_discount/100));
    // }else{
        // price_after_discount.val( original_price);
    // }

    // console.log(price_after_discount.val());
    // $.post("add-product.php",{
    //         parent_cat_id : parent_id,
    //         // "get_sub_cat" : "check_sub"
    //     },function (data, status) {
            
    //     })
    
})

if (alertClose || alertmsg) {
    alertClose.addEventListener('click', ()=>{alertmsg.style.display = 'none'});
}
function view(upload,imgId) {
    console.log(upload.name);
    console.log(imgId);
    console.log(upload.files[0].name);
    console.log($('#'+imgId));
    let fsize =Number( (upload.files[0].size)/1024/1024).toFixed(2);
    let errorDiv = $('#'+imgId+'_prod_error');
    let approvedImgExt = ['jpeg', 'jpg', 'png','svg', 'webp'];
    console.log(fsize);
    
    if ($.inArray(upload.files[0].name.split('.').pop().toLowerCase(), approvedImgExt) == -1) {
        upload.value = '';
        $('#'+imgId).attr('src', 'assets/images/upload.webp');
        errorDiv.html('only formats allowed: '+approvedImgExt.join());
    }else{

        if (fsize > 1) {
            errorDiv.html('sellect photo smaller than 1MB');
            
            $('#'+imgId).attr('src', 'assets/images/upload.webp');
        }else{
            errorDiv.html('');
    
            if (upload.files && upload.files[0]) {
                let reader = new FileReader();
                reader.onload= function (e) {
                    console.log(upload.files);
                    console.log($('#'+imgId));
                    $('#'+imgId)
                        .attr('src', e.target.result);
                };
                reader.readAsDataURL(upload.files[0]);
                
            }
        }
    }
}
function designFile(upload) {
    console.log(upload.name);
    console.log(upload.files[0].name);
    let fsize =Number( (upload.files[0].size)/1024/1024).toFixed(2);
    let errorDiv = $('#design_file_error');
    let approvedDesignExt = ['zip', 'rar', 'dxf', 'cdr', 'pdf', 'svg', 'eps'];
    
    if ($.inArray(upload.files[0].name.split('.').pop().toLowerCase(), approvedDesignExt) == -1) {
        upload.value = '';
        errorDiv.html('only formats allowed: '+approvedDesignExt.join());
    }else{


            errorDiv.html('');
    
            if (upload.files && upload.files[0]) {
                let reader = new FileReader();
                reader.onload= function (e) {
                    console.log(upload.files);
                };
                reader.readAsDataURL(upload.files[0]);
                
            }
        
    }
}
// $('#delete-product-btn').click(function (e) { 
//     e.preventDefault();
//     console.log('hello');
    
// });
$(document).on('click','#delete-product-btn', function (e) {
    e.preventDefault();
    let prod_id = $(this).val();
    
    swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
    .then((willDelete) => {
        if (willDelete) {
            $.ajax({
                method: "post",
                url: "functions/code.php",
                data: {
                    'prod_id': prod_id,
                    'delete-product-btn': true,
                },
                success: function (response) {
                    if (response == 200) {
                        swal("Success!","Product Deleted Successfuly!", {
                            icon: "success",
                        });
                    }else if (response == 500) {
                        swal("Error!","Something Went Wrong!", {
                            icon: "error",
                        });
                    }
                    $("#products_table").load(location.href + " #products_table");
                    // window.location.reload();
                }
            });
            
            
            
        } else{
            swal("Error!","Didn't Deleted!", {
                icon: "error",
                });
        }
    });

    
});
$(document).on('click','#delete-post-btn', function (e) {
    e.preventDefault();
    let post_id = $(this).val();
    

    let post_cover = e.target.dataset.image;
    
    swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
    .then((willDelete) => {
        if (willDelete) {
            $.ajax({
                method: "post",
                url: "functions/code.php",
                data: {
                    'post_id': post_id,
                    // 'post_cover': post_cover,
                    'delete-post-btn': true,
                },
                success: function (response) {
                    if (response == 200) {
                        swal("Success!","Post Deleted Successfuly!", {
                            icon: "success",
                        });
                    }else if (response == 500) {
                        swal("Error!","Something Went Wrong!", {
                            icon: "error",
                        });
                    }
                    $("#posts_table").load(location.href + " #posts_table");
                    // window.location.reload();
                }
            });
            
            
            
        } else{
            swal("Error!","Didn't Deleted!", {
                icon: "error",
                });
        }
    });

    
});
$(document).on('click','.refresh-chat', function () {
    $("#chat-parent").load(location.href + " #chat");
});
$(document).on('click','#generate-code-btn', function (e) {
    e.preventDefault();
    let code_array = ["A", "2", "C", "3", "E", "4", "F", "5", "H", "6", "J", "7", "L", "8", "M", "9", "O", "P", "Q", "R", "T", "U", "V", "W", "X", "Y", "Z", "0", "1"];
    let array_length= code_array.length;
    let promo_code_length = 5;
    let rand;
    let promo_code="";
    while (promo_code_length > 0) {
        rand = Math.floor(Math.random()*array_length);
        promo_code_length --;
        promo_code+=code_array[rand];
    }
    console.log(promo_code);
    $("#promo-sugg").val(promo_code);
    console.log("CLICKED");
});
// function view() {
//     var preview = document.getElementById('preview');
//     var file    = document.getElementById('cat_img').files[0];
//     var reader  = new FileReader();

//     reader.onloadend = function () {
//     preview.src = reader.result;
//     }

//     if (file) {
//     reader.readAsDataURL(file);
//     } else {
//     preview.src = "";
//     }
// }
// let otherLinks = document.querySelector('.nav li.other-links');
// let megaMenu = document.querySelector('.mega-menu');


// document.addEventListener("click", function handleClick(event){
//     if (event.target.parentNode.closest('.other-links')) {
//         megaMenu.classList.toggle('show');
//         console.log(event.target);
//     }else{
//         megaMenu.classList.remove('show');
//         }
// });

// setInterval(_=>{
//     document.querySelector(".value").innerHTML = document.querySelector("input[placeholder='search']").value;
// }, 0);
// document.querySelector("input[placeholder='search']").addEventListener("keyup", function getValue(e){
//     document.querySelector(".value").innerHTML = document.querySelector("input[placeholder='search']").value;
// })

// function myFunction() {
//     // Get the text field
//     var copyText = document.getElementById("myInput");

//     // Select the text field
//     copyText.select();
//     copyText.setSelectionRange(0, 99999); // For mobile devices

//      // Copy the text inside the text field
//     navigator.clipboard.writeText(copyText.value);

//     // Alert the copied text
//     alert("Copied the text: " + copyText.value);
//   }