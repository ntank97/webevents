//add image slider
document.addEventListener("DOMContentLoaded",function(eve){
$(document).ready(function(){
    $('#addImagesSlider').click(function(){
        $('#insertSlider').append('<div><input type="file" name="img_slider[]" style="margin-bottom:20px;"></div>');
    });
});
//ajax->delete image slider
$(document).ready(function(){
    // var xacnhan =  confirm('are you sure?');
    $('a#icon_img_slider').on('click',function(){
        var xacnhan =  confirm('Bạn có chắc chắn muốn xóa ảnh này không?');
        if(xacnhan == true){
            var _token = $("form[name='frmEdit']").find("input[name='_token']").val();
            var idImgSlider = $(this).parent().find("img").attr("id")||$(this).parent().find("video").attr("id");
            var srcImg = $(this).parent().find("img").attr("src");
            var rid = $(this).parent().find("img").attr("id")||$(this).parent().find("video").attr("id");
            $.ajax({
                url: "delete-slider?id="+idImgSlider,
                type: 'POST',
                data:{"_token": _token, "srcImg": srcImg},
                success: function(data){
                    if(data == "Oke"){
                        $("#"+rid).remove();
                    }else{
                        alert('Error!');
                    }
                },
                error: function(data) {
                    // alert('Bạn không có quyền để thực hiện chức năng này');
                    alert(data.responseJSON.success); 
                } 
            });
        }else{
            return false;
        }
    });
});
},false)
