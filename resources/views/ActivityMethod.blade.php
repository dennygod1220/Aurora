@extends('layouts.app') 
@section('content')
<h1 style="background-color:#00a2ff">活動辦法</h1>

<a href="{{ url('/') }}" class="btn btn-outline-info">首頁</a>

<div class="text-block">
  <div style="margin:50px">
    <p> ● 活動期間：2018年8月1日(三)～2018年8月31日(二)</p>
    <p>● 活動辦法：凡於活動期間內完成「震旦之星」連線並分享至個人臉書塗鴉牆，同時標註#震旦21歲生日了、#拉霸抽大獎，並將權限設定為公開，即可參加抽獎活動！每人每日可參加一次，活動期間內可每日參加。</p>
    <p>● 中獎公布： 2018年9月6日(四)於本活動網站以電腦抽獎程式隨機抽出，同時抽獎過程將於震旦通訊粉絲團直播，並將中獎名單於2018年9月7日(五)於本活動網站公布。</p>
    <p>● 獎項介紹： 【GOGORO電動機車】 2名 </p>

    <p>● 活動注意事項：</p>
    <p>活動參與僅限台、澎、金、馬之持有中華民國護照者參加。 </p>
    <p>抽獎最後登錄時間為：2018年8月31日 23:59截止，並確實填妥會員聯絡資訊。</p>
    <p>每日限參加一次，重複輸入視同無效，若經系統檢核資料有誤，將不具抽獎資格。 </p>
    <p>主辦單位就本活動參加者之資格，保有審查之權利，若以惡意之電腦程式或其他明顯違反活動公平性之方式，或經查核有不符合本活動規定之參加資格者，一經本公司發現或經第三人檢舉，主辦單位除得立即取消參賽者之參賽、得獎資格，並得追回獎品。 </p>
    <p>本活動如任何因電腦、網路、電話、技術或其他不可歸責於主辦單位之事由，而使參與本活動者所登錄之資料有遺失、錯誤或毀損所導致資料無效之情況，主辦單位及其活動小組不負任何法律責任，參加者與得獎者亦不得異議。 </p>
    <p>顧客於參加本活動之同時，即同意接受本活動所有內容及細則之規範，如有違反本活動注意事項之行為，活動小組得取消其中獎資格，並對於任何破壞本活動之行為保留法律追訴權。 </p>
    <p>本次活動主辦單位為震旦通訊股份有限公司。主辨單位員工不得參加本活動，以示公允。 </p>
    <p>主辦單位僅使用參加者所提供之個人資料於此次活動用途，且遵守【個人資料保護法】相關規定，以維護參加者權益，活動結束後將不保留任何參加者之完整資料。中獎人同意中獎相關個人資訊由主辦單位於活動範圍內進行蒐集、電腦處理及利用，但不做其他用途，中獎人並授權主辦單位得公開公佈姓名。</p>
    <p>活動參加者需保證所有填寫或提出之資料均為真實且正確，並未冒用或盜用他人資料，如有不實或不正確資訊，主辦單位將取消其中獎資格，並就其損害主辦單位或任何第三人權益，保留一切民、刑事訴追之責。 </p>
    <p>如有未盡事宜，主辦單位保留修改、變更活動內容與獎項細節之權利，且不事前另行通知，並有權對本活動所有事宜作出解釋或裁決。如本活動因不可抗力之特殊原因無法執行時，主辦單位有權決定取消、終止、修改或暫停本活動，任何未盡事宜均應受中華民國法律約束。 </p>
</div>
</div>
<br>
<br>
<div class="row" style="margin:20px">
  <div class="col-sm-5"></div>
  <div class="col-sm-2" style="text-align:center">
      <div class="form-row align-items-center"  style="text-align:center;font-size: 14px;">
          <div class="custom-control custom-checkbox">
              <input type="checkbox" class="custom-control-input" id="chk-agree">
              <label class="custom-control-label" for="chk-agree">我已閱讀並同意活動辦法</label>
          </div>
      </div>
      <br>
      <br>
      <div class="form-group" style="text-align:center;">
          <button class="btn btn-outline-danger" id="btn-game" disabled style="width:100%">進行遊戲</button>
      </div>
  </div>
  <div class="col-sm-5"></div>

</div>




<script>
  $(function(){
    $('#chk-agree').click(function(){
      //判斷是否勾選了閱讀同意活動辦法
      if($("#chk-agree").is(":checked")== true){
        $("#btn-game").removeClass("btn-outline-danger");
        $("#btn-game").removeAttr('disabled');
        $("#btn-game").addClass("btn-outline-success");
      }
      else{
        $("#btn-game").removeClass("btn-outline-success");
        $("#btn-game").attr('disabled','');
        $("#btn-game").addClass("btn-outline-danger");
      }
    })

    //點擊 進行遊戲按鈕  跳轉到 我要參加頁面
    $("#btn-game").click(function(){
      window.location.href = "{{ url('/IWantJoin') }}";
    })
  });
</script>
@endsection