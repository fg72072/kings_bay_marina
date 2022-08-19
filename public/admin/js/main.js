$("#profileImage").click(function(e) {
    $("#imageUpload").click();
});

function fasterPreview(uploader) {
    if (uploader.files && uploader.files[0]) {
        $('#profileImage').attr('src',
            window.URL.createObjectURL(uploader.files[0]));
    }
}

$("#imageUpload").change(function() {
    fasterPreview(this);
});

$("#profileImage").click(function(e) {
    $("#imageUpload").click();
});

function fasterPreview1(uploader) {
    if (uploader.files && uploader.files[0]) {
        $('#profileImage1').attr('src',
            window.URL.createObjectURL(uploader.files[0]));
    }
}

$("#imageUpload1").change(function() {
    fasterPreview1(this);
});

$("#profileImage2").click(function(e) {
    $("#imageUpload2").click();
});

function fasterPreview2(uploader) {
    if (uploader.files && uploader.files[0]) {
        $('#profileImage2').attr('src',
            window.URL.createObjectURL(uploader.files[0]));
    }
}

$("#imageUpload2").change(function() {
    fasterPreview2(this);
});
$(document).on("click", "#secondImage", function(e) {
    $("#secondimageUpload").click();
})

function secondfasterPreview(uploader) {
    if (uploader.files && uploader.files[0]) {
        $('#secondImage').attr('src',
            window.URL.createObjectURL(uploader.files[0]));
    }
}

$(document).on("change", "#secondimageUpload", function() {
    secondfasterPreview(this);
})

$(".edit").click(function() {
    var parent = $(this).parent().parent();
    $(".update-form select[name='type'] option").attr('selected',false);
    $(".update-form select[name='is_input'] option").attr('selected',false)
    $(".update-form select[name='is_bedroom'] option").attr('selected',false)
    $(".addon_id").val(parent.find(".id").data('id'))
    $(".update-form input[name='title']").val(parent.find(".title").data('title'))
    $(".update-form input[name='price']").val(parent.find(".price").data('price'))
    $(".update-form input[name='min']").val(parent.find(".min_limit").data('min_limit'))
    $(".update-form input[name='max']").val(parent.find(".max_limit").data('max_limit'))
    $($(".update-form select[name='type'] option")).each(function () {
       if($(this).val() == parent.find(".type").data('type')){
           $(this).attr('selected',true)
       }
    });
    $($(".update-form select[name='is_input'] option")).each(function () {
        if($(this).val() == parent.find(".is_input").data('is_input')){
            $(this).attr('selected',true)
        }
     });

     $($(".update-form select[name='is_bedroom'] option")).each(function () {
        if($(this).val() == parent.find(".is_bedroom").data('is_bedroom')){
            $(this).attr('selected',true)
        }
     });
})

$(document).on('submit', '#delete-form', function(e) {
    e.preventDefault();
    swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this data!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    url: $(this).attr('action'),
                    method: $(this).attr('method'),
                    data: new FormData(this),
                    processData: false,
                    contentType: false,
                    success: function(data) {
                        location.reload();
                        swal("Poof! Data has been deleted!", {
                            icon: "success",
                        });
                    }
                });
            }
        });
});
// $(document).on("change", ".select-category", function() {
//     var type = $(".select-category").find(":selected").attr('data-type')
//     if (type == 1) {
//         $(".service-only").empty();
//     }
//     if (type == 2) {
//         $(".service-only").append(`
//         <div class="mb-3">
//         <label class="col-form-label">Quantity</label>
//         <input class="form-control" type="number" name="qty" value="" required min="1">
//         </div>
//         <div class="mb-3">
//         <label class="col-form-label">Type</label>
//         <select class="form-control " name="form_type">
//         <option value="1" >
//         Hours
//         </option>
//         <option value="2" >
//         Days
//         </option>
//         </select>
//         </div>
//         <div class="mb-3">
//         <label class="col-form-label">Is Home</label>
//         <select class="form-control home-select" name="home">
//         <option value="0" >
//         No
//         </option>
//         <option value="1" >
//         Yes
//         </option>
//         </select>
//         </div>
//         <div class="mb-3">
//         <label class="col-form-label">Menu</label>
//         <select class="form-control " name="menu">
//         <option value="1">
//         Right
//         </option>
//         <option value="2" >
//         Left
//         </option>
//         </select>
//         </div>
//     `)
//     }

// })
$(document).on("change", ".home-select", function() {
    if ($(this).val() == 1) {
        $(".service-only").append(`
        <div class="checkbox-flex">
        <div class="mb-3">
        <input class="no_of_bed" type="checkbox" value="1" name="no_of_count[]">
        <label class="col-form-label">1 Bed</label>
        </div>
        <div class="mb-3">
        <input class="no_of_bed" type="checkbox" value="2" name="no_of_count[]">
        <label class="col-form-label">2 Bed</label>
        </div>
        <div class="mb-3">
        <input class="no_of_bed" type="checkbox" value="3" name="no_of_count[]">
        <label class="col-form-label">3 Bed</label>
        </div>
        <div class="mb-3">
        <input class="no_of_bed" type="checkbox" value="4" name="no_of_count[]">
        <label class="col-form-label">4 Bed</label>
        </div>
        </div>
        `);
    } else {
        $(".checkbox-flex").remove();
    }
})
if($(".sale-section").data('show') == true){
    $(".sale-section").show();
}
else{
    $(".sale-section").hide();
}
$(document).on("change", ".sale", function() {
    $(".sale-section").hide();
    if($(this).val() == 1){
    $(".sale-section").show();
    //     $(".sale-section").append(`
    //             <div class="mb-3">
    //             <label class="col-form-label">Sale Price</label>
    //             <input class="form-control" type="number" name="sale_price"  required min="1">
    //           </div>
    //           <div class="mb-3">
    //             <label class="col-form-label">Sale Start</label>
    //             <input class="form-control datetime" type="text" name="sale_start" required min="1">
    //           </div>
    //           <div class="mb-3">
    //             <label class="col-form-label">Sale End</label>
    //             <input class="form-control datetime" type="text" name="sale_end" required min="1">
    //           </div>
    // `)
    }

});


var disablepast = new Date();
var disbaleddate = new Date(disablepast.getFullYear(), disablepast.getMonth(), disablepast.getDate());
$('.datetime').datetimepicker({
lang:'ch',
timepicker:true,
format:'m-d-Y H:i',
formatDate:'Y-m-d H:i',
minDate:disbaleddate,

});

$('.date').datetimepicker({
    lang:'ch',
    timepicker:false,
    format:'m-d-Y',
    formatDate:'Y-m-d',
    minDate:disbaleddate,
});


$('#secondTable').DataTable();