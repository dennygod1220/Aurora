

$(function () {

    var client_name = $("#client_name").text();
    var client_email = $("#client_email").text();

    var token = $("input[name='_token']").val();

let count = 0;
const btnShuffle = document.querySelector('#casinoShuffle');
const btnStop = document.querySelector('#casinoStop');
const casino1 = document.querySelector('#casino1');
const casino2 = document.querySelector('#casino2');
const casino3 = document.querySelector('#casino3');
const mCasino1 = new SlotMachine(casino1, {
    active: 5,
    delay: 500,
    //指定停止時顯示的東西要是拉霸中的哪個，像陣列一樣從index 0 開始
    randomize: function (activeElementIndex) {
        return prize_arr0;
    },
});
const mCasino2 = new SlotMachine(casino2, {
    active: 5,
    delay: 1000,
    randomize: function (activeElementIndex) {
        return prize_arr1;
    }
});
const mCasino3 = new SlotMachine(casino3, {
    active: 5,
    delay: 1500,
    randomize: function (activeElementIndex) {
        return prize_arr2;
    }
});
btnShuffle.addEventListener('click', () => {
    count = 3;
    mCasino1.shuffle(9999);
    mCasino2.shuffle(9999);
    mCasino3.shuffle(9999);
});

btnStop.addEventListener('click', () => {
    
    mCasino1.stop();
    setTimeout(() => {
        mCasino2.stop();
    }, 1000);
    setTimeout(() => {
        mCasino3.stop(() => {
            $(".cover").css({'background-color':'rgba(100,100,100,0.8)','z-index':'999999',"position": "absolute","height": "100%","width": "100%"});
            if( (prize_arr0 == prize_arr1) && (prize_arr2 == prize_arr0) ){
                $.ajax({
                    url:'http://localhost:8888/Laravel/aurora/public/slot_result',
                    type:'POST',
                    data:{}
                });
                $(".btn-continue").show();
                $(".btn-tomorrow").show();
            }else{
                $(".btn-continue").show();   
                $(".btn-tomorrow").show();
            }
        });
    }, 2500);
});

});
