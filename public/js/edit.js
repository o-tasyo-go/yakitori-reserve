

// 15分刻みの選択肢を生成する関数
function generateTimeOptions() {
    // 選択肢を初期化
    const timeSelect = document.getElementById('timeSelect');
    timeSelect.innerHTML = '<option value="">-- 時間を選択してください --</option>';
    
    // 00:00から23:45までの選択肢を生成
    for (let hour = 9; hour < 19; hour++) {
      for (let minute = 0; minute < 60; minute += 15) {
        const timeValue = ('0' + hour).slice(-2) + ':' + ('0' + minute).slice(-2);
        const option = new Option(timeValue, timeValue);
        timeSelect.appendChild(option);
      }
    }
  }
  
  // 選択肢を生成
  window.onload = function() {
      generateTimeOptions();
      var products = document.getElementsByClassName('product-quantity');
      for (var i = 0; i < products.length; i++) {
          var product = products[i].getAttribute('data-product');
          if (product == '唐揚げ') {
              for (var j = 0; j <= 1000; j += 10) {
                  var option = document.createElement('option');
                  option.value = j;
                  option.text = j + " グラム";
                  products[i].appendChild(option);
              }
          } else {
              for (var j = 0; j <= 300; j++) {
                  var option = document.createElement('option');
                  option.value = j;
                  option.text = j + " 本";
                  products[i].appendChild(option);
              }
          }
      }
  };