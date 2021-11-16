function handleClick(myRadio) {
    var ma_cs = myRadio.value;
    var xmlhttp = new XMLHttpRequest();
    $.ajax({
        url: '../DAO/nhanvien.php',
        data: {
            ma_co_so: ma_cs
        }
    }).done(function(data) {
        var nhan_vien = JSON.parse(data);
        $('#select_nv').empty();
        $.each(nhan_vien, function(key, value) {
            $('#select_nv').append($('<option>', {
                value: value.ma_nhan_vien,
                text: value.ten_nhan_vien
            }));
        })
    });
}