function myCategory(){
    var _token =  $('meta[name="csrf-token"]').attr('content'); 
    var cate_id = document.getElementById('getValueCate').value; 
    $.ajax({
        url: "get-sub-cate-for-add-event",
        type: 'POST',
        data:{"cate_id": cate_id,"_token": _token},
        success: function(data){
            console.log(data.subCate);
            data.subCate.forEach(function(element){
                console.log(element.name_sub_cate);
                $('#sub_category').append('<option type="text" name="sub_category">element.name_sub_cate</option>');
            });
           
            console.log(data);
            
        },
        error: function(data) {
            alert(data.responseJSON.success); 
        } 
    });
}