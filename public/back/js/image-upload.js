$(document).click(function() {
    $('#mask').hide();
});
function poster_search(obj) {
    var type = obj.options[obj.selectedIndex].value;
    $.pjax({ url: '/poster/list?per_page=10&type=' + type, container: '#pjax-container' });
}

function getPosterUrl(poster_id) {
    $.ajax({
        type:'get',
        url:'/poster/get_poster_url?id=' + poster_id,
        success:function (result) {
            if(result.code == 200) {
                $('#showImg').attr('src', result.data);
                $('#mask').show();
            }
        }
    });
}

function addPoster(poster_id) {
    $('#add_poster_' + poster_id).click();
}

function uploadPoster(poster_id, is_edit = 0) {
    var fileData = document.getElementById('add_poster_' + poster_id);
    var file = fileData.files[0];
    var reader = new FileReader();
    reader.readAsDataURL(file);
    reader.onload = function(e){
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type:'POST',
            url:'/poster/upload',
            data:{'poster_url' : this.result, 'id' : poster_id, 'is_edit' : is_edit},
            success:function (result) {
                if(result.code == 200) {
                    if(is_edit == 0) {
                        $('#showImg').attr('src', result.data);
                        $('#mask').show();
                    } else {
                        $('#poster_url').attr('value', result.data);
                        $('#poster').attr('src', result.data); 
                    }
                } else {
                    alert(result.message);
                }
            }
        });
    }
}

function getQywxQrcodeUrl(enterprise_id) {
    $.ajax({
        type:'get',
        url:'/enterprise/get_qywxQrcode_url?id=' + enterprise_id,
        success:function (result) {
            if(result.code == 200) {
                $('#showImg').attr('src', result.data);
                $('#mask').show();
            }
        }
    });
}


function uploadQywxQrcode(enterprise_id) {
    var fileData = document.getElementById('qywx_qrcode_file');
    var file = fileData.files[0];
    var reader = new FileReader();
    reader.readAsDataURL(file);
    reader.onload = function(e){
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type:'POST',
            url:'/api/enterprise/upload_qywxQrcode',
            data:{'qywxQrcode_url' : this.result},
            success:function (result) {
                if(result.code == 200) {
                    $('#qywx_qrcode').val(result.data);
                    $('#qywx_qrcode_hidden').show();
                    $('#file_name').attr('src', result.data);
                } else {
                    alert(result.message);
                }
            }
        });
    }
}