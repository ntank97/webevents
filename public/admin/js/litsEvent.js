//xóa sự kiện
document.getElementById('alert_delete_list_pr').style.display = 'none';
var deleteEvent = document.getElementsByClassName('deleteEvent');
var getIdEvent = document.getElementsByClassName('getIdEvent');
for(let i =0; i<deleteEvent.length; i++){
    deleteEvent[i].addEventListener('click',function(){
    var _token =  $('meta[name="csrf-token"]').attr('content');  
    let id = getIdEvent[i].value;
    let objdel = $(this).parent().parent();
    if(confirm('bạn có muốn xóa user này không')){
        $.ajax({
            url: "manager-delete-data",
            type: 'POST',
            data:{"id": id,"_token": _token},
            success: function(data){
                document.getElementById('alert_delete_list_pr').style.display = 'block';
                document.getElementById('alert_delete_list').innerText = data.success;
                objdel.remove();
            },
            error: function(data) {
                alert(data.responseJSON.success); 
            } 
        });
    }
})
};
