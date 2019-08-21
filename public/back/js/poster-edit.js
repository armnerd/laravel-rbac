$('#datepicker1').datepicker({
  autoclose: true
})
$('#datepicker2').datepicker({
  autoclose: true
})

$(document).ready(function(){
    inputDefaultValue();
});

function inputDefaultValue() {
    is_qrcode = $("#is_qrcode").val();
    if(is_qrcode == 1) {
        $("#qrcode_x").css('display', 'block');
        $("#qrcode_y").css('display', 'block');
        $("#qr_position").css('display', 'block');
    } else {
        $("#qrcode_x").css('display', 'none');
        $("#qrcode_y").css('display', 'none');
        $("#qr_position").css('display', 'none');
    }

    $("#poster").css('left', $('input[name="poster[x]"]').val() + 'px');
    $("#poster").css('top', $('input[name="poster[y]"]').val() + 'px');
    $("#poster").css('width', $('input[name="poster[width]"]').val() + 'px');
    $("#poster").css('height', $('input[name="poster[height]"]').val() + 'px');

    $("#avatar").css('left', $('input[name="avatar[x]"]').val() + 'px');
    $("#avatar").css('bottom', $('input[name="avatar[y]"]').val() + 'px');
    $("#avatar").css('width', $('input[name="avatar[width]"]').val() + 'px');
    $("#avatar").css('height', $('input[name="avatar[height]"]').val() + 'px');

    $("#qrcode").css('right', $('input[name="qrcode[x]"]').val() + 'px');
    $("#qrcode").css('bottom', $('input[name="qrcode[y]"]').val() + 'px');

    var name_file = $('#name_reset').val();
    if(name_file == 1) 
        $("#name").css('font-weight', 'inherit');
    else
        $("#name").css('font-weight', 'bold');
    $("#name").css('left', $('input[name="name[x]"]').val() + 'px');
    $("#name").css('top', ($('input[name="name[y]"]').val() - 12) + 'px');
    $("#name").css('font-size', $('input[name="name[size]"]').val() + 'px');
    $("#name").css('color', $('input[name="name[color]"]').val());

    var position_reset = $('#position_reset').val();
    if(position_reset == 1) 
        $("#position").css('font-weight', 'inherit');
    else
        $("#position").css('font-weight', 'bold');
    $("#position").css('left', $('input[name="position[x]"]').val() + 'px');
    $("#position").css('top', $('input[name="position[y]"]').val() + 'px');
    $("#position").css('font-size', $('input[name="position[size]"]').val() + 'px');
    $("#position").css('color', $('input[name="position[color]"]').val());

    var company_name_reset = $('#company_name_reset').val();
    if(company_name_reset == 1) 
        $("#company_name").css('font-weight', 'inherit');
    else
        $("#company_name").css('font-weight', 'bold');
    $("#company_name").css('left', $('input[name="company_name[x]"]').val() + 'px');
    $("#company_name").css('top', $('input[name="company_name[y]"]').val() + 'px');
    $("#company_name").css('font-size', $('input[name="company_name[size]"]').val() + 'px');
    $("#company_name").css('color', $('input[name="company_name[color]"]').val());

    var phone_reset = $('#phone_reset').val();
    if(phone_reset == 1) 
        $("#phone").css('font-weight', 'inherit');
    else
        $("#phone").css('font-weight', 'bold');
    $("#phone").css('left', $('input[name="phone[x]"]').val() + 'px');
    $("#phone").css('top', $('input[name="phone[y]"]').val() + 'px');
    $("#phone").css('font-size', $('input[name="phone[size]"]').val() + 'px');
    $("#phone").css('color', $('input[name="phone[color]"]').val());

    var phone_no_reset = $('#phone_no_reset').val();
    if(phone_no_reset == 1) 
        $("#phone_no").css('font-weight', 'inherit');
    else
        $("#phone_no").css('font-weight', 'bold');
    $("#phone_no").css('left', $('input[name="phone_no[x]"]').val() + 'px');
    $("#phone_no").css('top', $('input[name="phone_no[y]"]').val() + 'px');
    $("#phone_no").css('font-size', $('input[name="phone_no[size]"]').val() + 'px');
    $("#phone_no").css('color', $('input[name="phone_no[color]"]').val());

    var qrcode_text_reset = $('#qrcode_text_reset').val();
    if(qrcode_text_reset == 1) 
        $("#qrcode_text").css('font-weight', 'inherit');
    else
        $("#qrcode_text").css('font-weight', 'bold');
    $("#qrcode_text").css('left', $('input[name="qrcode_text[x]"]').val() + 'px');
    $("#qrcode_text").css('top', $('input[name="qrcode_text[y]"]').val() + 'px');
    $("#qrcode_text").css('font-size', $('input[name="qrcode_text[size]"]').val() + 'px');
    $("#qrcode_text").css('color', $('input[name="qrcode_text[color]"]').val());
}

function styleChange(obj) {
    switch(obj)
    {
        case 'poster':
            $("#poster").css('left', $('input[name="poster[x]"]').val() + 'px');
            $("#poster").css('top', $('input[name="poster[y]"]').val() + 'px');
            $("#poster").css('width', $('input[name="poster[width]"]').val() + 'px');
            $("#poster").css('height', $('input[name="poster[height]"]').val() + 'px');
            break;
        case 'avatar':
            $("#avatar").css('left', $('input[name="avatar[x]"]').val() + 'px');
            $("#avatar").css('bottom', $('input[name="avatar[y]"]').val() + 'px');
            $("#avatar").css('width', $('input[name="avatar[width]"]').val() + 'px');
            $("#avatar").css('height', $('input[name="avatar[height]"]').val() + 'px');
            break;
        case 'qrcode':
            $("#qrcode").css('right', $('input[name="qrcode[x]"]').val() + 'px');
            $("#qrcode").css('bottom', $('input[name="qrcode[y]"]').val() + 'px');
            break;
        case 'name':
            var name_file = $('#name_reset').val();
            if(name_file == 1) 
                $("#name").css('font-weight', 'inherit');
            else
                $("#name").css('font-weight', 'bold');
            $("#name").css('left', $('input[name="name[x]"]').val() + 'px');
            $("#name").css('top', ($('input[name="name[y]"]').val() - 12) + 'px');
            $("#name").css('font-size', $('input[name="name[size]"]').val() + 'px');
            $("#name").css('color', $('input[name="name[color]"]').val());
            break;
        case 'position':
            var position_reset = $('#position_reset').val();
            if(position_reset == 1) 
                $("#position").css('font-weight', 'inherit');
            else
                $("#position").css('font-weight', 'bold');
            $("#position").css('left', $('input[name="position[x]"]').val() + 'px');
            $("#position").css('top', $('input[name="position[y]"]').val() + 'px');
            $("#position").css('font-size', $('input[name="position[size]"]').val() + 'px');
            $("#position").css('color', $('input[name="position[color]"]').val());
            break;
        case 'company_name':
            var company_name_reset = $('#company_name_reset').val();
            if(company_name_reset == 1) 
                $("#company_name").css('font-weight', 'inherit');
            else
                $("#company_name").css('font-weight', 'bold');
            $("#company_name").css('left', $('input[name="company_name[x]"]').val() + 'px');
            $("#company_name").css('top', $('input[name="company_name[y]"]').val() + 'px');
            $("#company_name").css('font-size', $('input[name="company_name[size]"]').val() + 'px');
            $("#company_name").css('color', $('input[name="company_name[color]"]').val());
            break;
        case 'phone':
            var phone_reset = $('#phone_reset').val();
            if(phone_reset == 1) 
                $("#phone").css('font-weight', 'inherit');
            else
                $("#phone").css('font-weight', 'bold');
            $("#phone").css('left', $('input[name="phone[x]"]').val() + 'px');
            $("#phone").css('top', $('input[name="phone[y]"]').val() + 'px');
            $("#phone").css('font-size', $('input[name="phone[size]"]').val() + 'px');
            $("#phone").css('color', $('input[name="phone[color]"]').val());
            break;
        case 'phone_no':
            var phone_no_reset = $('#phone_no_reset').val();
            if(phone_no_reset == 1) 
                $("#phone_no").css('font-weight', 'inherit');
            else
                $("#phone_no").css('font-weight', 'bold');
            $("#phone_no").css('left', $('input[name="phone_no[x]"]').val() + 'px');
            $("#phone_no").css('top', $('input[name="phone_no[y]"]').val() + 'px');
            $("#phone_no").css('font-size', $('input[name="phone_no[size]"]').val() + 'px');
            $("#phone_no").css('color', $('input[name="phone_no[color]"]').val());
            break;
        case 'qrcode_text':
            var qrcode_text_reset = $('#qrcode_text_reset').val();
            if(qrcode_text_reset == 1) 
                $("#qrcode_text").css('font-weight', 'inherit');
            else
                $("#qrcode_text").css('font-weight', 'bold');
            $("#qrcode_text").css('left', $('input[name="qrcode_text[x]"]').val() + 'px');
            $("#qrcode_text").css('top', $('input[name="qrcode_text[y]"]').val() + 'px');
            $("#qrcode_text").css('font-size', $('input[name="qrcode_text[size]"]').val() + 'px');
            $("#qrcode_text").css('color', $('input[name="qrcode_text[color]"]').val());
            break;
        default:
            break;
    }
}

function qrcodeStatus() {
    is_qrcode = $("#is_qrcode").val();
    if(is_qrcode == 1) {
        $("#qrcode_x").css('display', 'block');
        $('#qrcodex').val('73');
        $("#qrcode_y").css('display', 'block');
        $("#qrcodey").val('76');
        $("#qr_position").css('display', 'block');
        $('#qrcode_position').find("option").eq(3).prop("selected", true);
    } else {
        $("#qrcode_x").css('display', 'none');
        $("#qrcode_y").css('display', 'none');
        $("#qr_position").css('display', 'none');
    }
}

//poster
$('#poster').bind('mousedown',function(event){
    var oldX = parseInt($(this).css('left').replace(/px/, '')) - event.clientX;
    var oldY = parseInt($(this).css('top').replace(/px/, '')) - event.clientY;
　　$(document).bind('mousemove',function(event){ 
        var left = oldX + event.clientX;
        var top  = oldY + event.clientY;
        $('#poster').css('left', left + 'px');
        $('#poster').css('top', top + 'px');
        $('input[name="poster[x]"]').val(left);
        $('input[name="poster[y]"]').val(top);
　　});
　　$(document).bind('mouseup',function(event){
　　　　 $(document).unbind('mousemove');
　  });
});

//avatar
$('#avatar').bind('mousedown',function(event){
    var oldX = parseInt($(this).css('left').replace(/px/, '')) - event.clientX;
    var oldY = parseInt($(this).css('bottom').replace(/px/, '')) - (1122 - event.clientY);
　　$(document).bind('mousemove',function(event){ 
        var left = oldX + event.clientX;
        var bottom  = oldY + (1122 - event.clientY);
        $('#avatar').css('left', left + 'px');
        $('#avatar').css('bottom', bottom + 'px');
        $('input[name="avatar[x]"]').val(left);
        $('input[name="avatar[y]"]').val(bottom);
　　});
　　$(document).bind('mouseup',function(event){
　　　　 $(document).unbind('mousemove');
　  });
});

//name
$('#name').bind('mousedown',function(event){
    var oldX = parseInt($(this).css('left').replace(/px/, '')) - event.clientX;
    var oldY = parseInt($(this).css('top').replace(/px/, '')) - event.clientY;
　　$(document).bind('mousemove',function(event){ 
        var left = oldX + event.clientX;
        var top  = oldY + event.clientY;
        $('#name').css('left', left + 'px');
        $('#name').css('top', top + 'px');
        $('input[name="name[x]"]').val(left);
        $('input[name="name[y]"]').val(top + 12);
　　});
　　$(document).bind('mouseup',function(event){
　　　　 $(document).unbind('mousemove');
　  });
});

//position
$('#position').bind('mousedown',function(event){
    var oldX = parseInt($(this).css('left').replace(/px/, '')) - event.clientX;
    var oldY = parseInt($(this).css('top').replace(/px/, '')) - event.clientY;
　　$(document).bind('mousemove',function(event){ 
        var left = oldX + event.clientX;
        var top  = oldY + event.clientY;
        $('#position').css('left', left + 'px');
        $('#position').css('top', top + 'px');
        $('input[name="position[x]"]').val(left);
        $('input[name="position[y]"]').val(top);
　　});
　　$(document).bind('mouseup',function(event){
　　　　 $(document).unbind('mousemove');
　  });
});

//company_name
$('#company_name').bind('mousedown',function(event){
    var oldX = parseInt($(this).css('left').replace(/px/, '')) - event.clientX;
    var oldY = parseInt($(this).css('top').replace(/px/, '')) - event.clientY;
　　$(document).bind('mousemove',function(event){ 
        var left = oldX + event.clientX;
        var top  = oldY + event.clientY;
        $('#company_name').css('left', left + 'px');
        $('#company_name').css('top', top + 'px');
        $('input[name="company_name[x]"]').val(left);
        $('input[name="company_name[y]"]').val(top);
　　});
　　$(document).bind('mouseup',function(event){
　　　　 $(document).unbind('mousemove');
　  });
});

//phone
$('#phone').bind('mousedown',function(event){
    var oldX = parseInt($(this).css('left').replace(/px/, '')) - event.clientX;
    var oldY = parseInt($(this).css('top').replace(/px/, '')) - event.clientY;
　　$(document).bind('mousemove',function(event){ 
        var left = oldX + event.clientX;
        var top  = oldY + event.clientY;
        $('#phone').css('left', left + 'px');
        $('#phone').css('top', top + 'px');
        $('input[name="phone[x]"]').val(left);
        $('input[name="phone[y]"]').val(top);
　　});
　　$(document).bind('mouseup',function(event){
　　　　 $(document).unbind('mousemove');
　  });
});

//phone_no
$('#phone_no').bind('mousedown',function(event){
    var oldX = parseInt($(this).css('left').replace(/px/, '')) - event.clientX;
    var oldY = parseInt($(this).css('top').replace(/px/, '')) - event.clientY;
　　$(document).bind('mousemove',function(event){ 
        var left = oldX + event.clientX;
        var top  = oldY + event.clientY;
        $('#phone_no').css('left', left + 'px');
        $('#phone_no').css('top', top + 'px');
        $('input[name="phone_no[x]"]').val(left);
        $('input[name="phone_no[y]"]').val(top);
　　});
　　$(document).bind('mouseup',function(event){
　　　　 $(document).unbind('mousemove');
　  });
});

//qrcode_text
$('#qrcode_text').bind('mousedown',function(event){
    var oldX = parseInt($(this).css('left').replace(/px/, '')) - event.clientX;
    var oldY = parseInt($(this).css('top').replace(/px/, '')) - event.clientY;
　　$(document).bind('mousemove',function(event){ 
        var left = oldX + event.clientX;
        var top  = oldY + event.clientY;
        $('#qrcode_text').css('left', left + 'px');
        $('#qrcode_text').css('top', top + 'px');
        $('input[name="qrcode_text[x]"]').val(left);
        $('input[name="qrcode_text[y]"]').val(top);
　　});
　　$(document).bind('mouseup',function(event){
　　　　 $(document).unbind('mousemove');
　  });
});

//qrcode
$('#qrcode').bind('mousedown',function(event){
    var oldX = parseInt($(this).css('right').replace(/px/, '')) - (748 - event.clientX);
    var oldY = parseInt($(this).css('bottom').replace(/px/, '')) - (1122 - event.clientY);
　　$(document).bind('mousemove',function(event){ 
        var right = oldX + (748 - event.clientX);
        var bottom = oldY + (1122 - event.clientY);
        $('#qrcode').css('right', right + 'px');
        $('#qrcode').css('bottom', bottom + 'px');
        $('input[name="qrcode[x]"]').val(right);
        $('input[name="qrcode[y]"]').val(bottom);
　　});
　　$(document).bind('mouseup',function(event){
　　　　 $(document).unbind('mousemove');
　  });
});

//一键重置编辑信息
function editReset() {
    $('input[name="poster[x]"]').val('32');
    $('input[name="poster[y]"]').val('30');
    $('input[name="poster[position]"]').val('top-left');
    $('input[name="poster[width]"]').val('684');
    $('input[name="poster[height]"]').val('856');

    $('input[name="avatar[x]"]').val('66');
    $('input[name="avatar[y]"]').val('128');
    $('input[name="avatar[position]"]').val('bottom-left');
    $('input[name="avatar[width]"]').val('80');
    $('input[name="avatar[height]"]').val('80');

    $('#name_reset').find("option").eq(1).prop("selected", true);
    $('input[name="name[x]"]').val('178');
    $('input[name="name[y]"]').val('948');
    $('input[name="name[size]"]').val('33');
    $('input[name="name[color]"]').val('#000');
    $('input[name="name[align]"]').val('left');
    $('input[name="name[valign]"]').val('bottom');

    $('#position_reset').find("option").eq(0).prop("selected", true);
    $('input[name="position[x]"]').val('264');
    $('input[name="position[y]"]').val('948');
    $('input[name="position[size]"]').val('22');
    $('input[name="position[color]"]').val('#999');
    $('input[name="position[align]"]').val('left');
    $('input[name="position[valign]"]').val('bottom');

    $('#company_name_reset').find("option").eq(0).prop("selected", true);
    $('input[name="company_name[x]"]').val('178');
    $('input[name="company_name[y]"]').val('990');
    $('input[name="company_name[size]"]').val('23');
    $('input[name="company_name[color]"]').val('#999');
    $('input[name="company_name[align]"]').val('left');
    $('input[name="company_name[valign]"]').val('bottom');

    $('#phone_reset').find("option").eq(0).prop("selected", true);
    $('input[name="phone[x]"]').val('76');
    $('input[name="phone[y]"]').val('1055');
    $('input[name="phone[size]"]').val('23');
    $('input[name="phone[color]"]').val('#444');
    $('input[name="phone[align]"]').val('left');
    $('input[name="phone[valign]"]').val('bottom');

    $('#phone_no_reset').find("option").eq(0).prop("selected", true);
    $('input[name="phone_no[x]"]').val('142');
    $('input[name="phone_no[y]"]').val('1055');
    $('input[name="phone_no[size]"]').val('23');
    $('input[name="phone_no[color]"]').val('#999');
    $('input[name="phone_no[align]"]').val('left');
    $('input[name="phone_no[valign]"]').val('bottom');

    $('#is_qrcode').find("option").eq(0).prop("selected", true);
    qrcodeStatus();
    $('input[name="qrcode[x]"]').val('73');
    $('input[name="qrcode[y]"]').val('76');
    $('input[name="qrcode[position]"]').val('bottom-right');

    $('#qrcode_text_reset').find("option").eq(0).prop("selected", true);
    $('input[name="qrcode_text[x]"]').val('525');
    $('input[name="qrcode_text[y]"]').val('1076');
    $('input[name="qrcode_text[size]"]').val('21');
    $('input[name="qrcode_text[color]"]').val('#999');
    $('input[name="qrcode_text[align]"]').val('left');
    $('input[name="qrcode_text[valign]"]').val('bottom');

    $('#type_id').find("option").eq(0).prop("selected", true);

    $('input[name="start_t"]').val('');
    $('input[name="end_t"]').val('');

    $('#poster_position').find("option").eq(0).prop("selected", true);
    $('#avatar_position').find("option").eq(2).prop("selected", true);
    $('#name_align').find("option").eq(2).prop("selected", true);
    $('#name_valign').find("option").eq(1).prop("selected", true);
    $('#position_align').find("option").eq(2).prop("selected", true);
    $('#position_valign').find("option").eq(1).prop("selected", true);
    $('#company_name_align').find("option").eq(2).prop("selected", true);
    $('#company_name_valign').find("option").eq(1).prop("selected", true);
    $('#phone_align').find("option").eq(2).prop("selected", true);
    $('#phone_valign').find("option").eq(1).prop("selected", true);
    $('#phone_no_align').find("option").eq(2).prop("selected", true);
    $('#phone_no_valign').find("option").eq(1).prop("selected", true);
    $('#qrcode_position').find("option").eq(3).prop("selected", true);
    $('#qrcode_text_align').find("option").eq(2).prop("selected", true);
    $('#qrcode_text_valign').find("option").eq(1).prop("selected", true);

    inputDefaultValue();
    alert('重置成功！');
}