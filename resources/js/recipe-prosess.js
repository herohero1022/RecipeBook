$('#prosess-form-box-plus').on('click', function(){
  var inputCount = $('#prosess-form-erea .prosess-form-box').length;
  if (inputCount < 15){
    var element = $('#prosess-form-erea .prosess-form-box:last-child').clone(true);// 末尾をイベントごと複製
    // 複製したinputのクリア
    var inputList = element[0].querySelectorAll('input[type="text"], textarea');
    for (var i = 0; i < inputList.length; i++) {
      inputList[i].value = "";
    }
    $('#prosess-form-erea .prosess-form-box').parent().append(element);// 末尾追加
    $('.order-number').each(function(i){
      $(this).text((i + 1));
    });
    $('.input-erea-number').each(function(i){
      $(this).text((i + 1));
    });
  }
});
// 削除
$('.prosess-form-box-minus').on('click', function(){// イベントごと複製しているのでonのselectorは未設定
  var inputCount = $('#prosess-form-erea .prosess-form-box').length;
  if (inputCount > 1){
    $(this).closest('.prosess-form-box').remove();
    $('.order-number').each(function(i){
      $(this).text((i + 1));
    });
    $('.input-erea-number').each(function(i){
      $(this).text((i + 1));
    });
  }
});