document.addEventListener("DOMContentLoaded",function(eve){
    $(document).ready(function(){
        $('#add_category').click(function(){
            $('#insertCategory').append('<div><input type="text" name="sub_category[]" style="margin-bottom:20px;width:50%;padding: 6px 12px;color: #555;border: 1px solid #ccc;border-color: #d2d6de;height: 34px;" placeholder="thêm tên thể loại con"></div>');
        });
    });
},false)
