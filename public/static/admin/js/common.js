/*页面 全屏-添加*/
function o2o_edit(title, url) {
    var index = layer.open({
        type: 2,
        title: title,
        content: url
    });
    layer.full(index);
}

/*添加或者编辑缩小的屏幕*/
function o2o_s_edit(title, url, w, h) {
    layer_show(title, url, w, h);
}

/*-删除*/
function o2o_del(url) {

    layer.confirm('确认要删除吗？', function (index) {
        window.location.href = url;
    });
}

$('.listorder input').blur(function () {
    var id = $(this).attr('attr-id');
    var listorder = $(this).val();
    var postData = {
        'id': id,
        'listorder': listorder
    };
    var url = SCOPE.listorder_url;
    $.post(url, postData, function (result) {
        if (result.code == 1) {
            location.href = result.data
        } else {
            alert(result.msg)
        }
    }, "json");
});
/*城市相关二级内容*/
$(".cityId").change(function () {
    var city_id = $(this).val();
    //抛出请求
    var url = SCOPE.city_url;
    var postData = {
        'id': city_id
    };
    $.post(url, postData, function (result) {

    }, 'json');
});
