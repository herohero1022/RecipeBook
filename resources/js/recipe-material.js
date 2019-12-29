$('#material-form-box-plus').on('click', function(){
  var inputCount = $('#material-form-erea .material-form-box').length;
  if (inputCount < 31){
    var element = $('#material-form-erea .material-form-box:last-child').clone(true);// 末尾をイベントごと複製
    // 複製したinputのクリア
    var inputList = element[0].querySelectorAll('input[type="text"], textarea');
    for (var i = 0; i < inputList.length; i++) {
      inputList[i].value = "";
    }
    $('#material-form-erea .material-form-box').parent().append(element);// 末尾追加
  }
});
// 削除
$('.form-box-minus').on('click', function(){// イベントごと複製しているのでonのselectorは未設定
  var inputCount = $('#material-form-erea .material-form-box').length;
  if (inputCount > 1){
    $(this).closest('.material-form-box').remove();
  }
});