@extends('layouts.app')

@section('content')
<h1 style="background-color:#00a2ff">這是首頁</h1>




<!-- Button trigger modal -->
<button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#exampleModal">
    隱私權政策
  </button>
  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">隱私權政策</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            Cookies是伺服端為了區別使用者的不同喜好， 經由瀏覽器寫入使用者瀏灠器的資訊。<br>
            您可以在chrome的「進階設定」的「隱私權」或是IE的「I nternet 選項」的「安全性」 中選擇修改您瀏覽器對Cookies的接受程度， 包括接受所有cookies、設定cookies時得 到通知、拒絕所有Cookies等三種。如果您選擇拒絕所有的C ookies ， 您就可能無法使用 部份個人化服務。<br>
            如何取得cookie的資訊：<br>
            域動在下面的狀況下，依本政策原則在您瀏覽器中寫入並讀取Coo kies 。<br>
            取得方式：<br>
            在您觀看廣告時建立、收集並儲存資訊， 這些資訊不包含PII，並且我們沒有分享或銷售cookie的相 關資訊給第三方。<br>
            我們搜集的目的：<br>
            我們收集資訊是為了向所有使用者提供更優質的服務； 這些資訊可協助我們判斷基本設定， 甚至分析更複雜的內容 (例如對您最實用的廣告、您在網路上最關注的對象)。 這是為了提供更好、更個人化的服務， 以及方便您參與個人化的互動活動。<br>
            我們收集的資訊<br>
            1、cookie：瀏覽內容時， 我們會自動收集特定資訊並儲存在伺服器記錄中，這類資訊包括： 您看過的廣告，點擊過的廣告，瀏灠的內容<br>
            2、device：我們會收集裝置專屬資訊 (例如您的作業系統版本、裝置的UDID 和 Advertising ID)。<br>
            如何刪除cookie的資訊：<br>
            如果您想刪除Cookies的資訊，做法如下： 您可以在chrome的「進階設定」的「隱私權」中清除瀏灠器的 Cookies 或是IE的「Internet選項」的「刪除」中刪除Cookies。<br>
            詳細的cookie刪除方式可以參考下面連結：http://www.aboutcookies.org/DEFAULT.ASPX?page=2<br>
            如何刪除IDFA(ios)的資訊：<br>
            詳細的刪除方式請參：https://support.apple.com/en-us/HT202074<br>
            如何刪除Advertising ID(android)的資訊：<br>
            詳細的刪除方式請參：  http://ccm.net/faq/34732-android-reset-your-advertising-id<br>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">了解，關閉</button>
        </div>
      </div>
    </div>
  </div>




@endsection