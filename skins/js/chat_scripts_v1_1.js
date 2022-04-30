
function myAjax(comment, dest) {
    var comment_text = document.getElementById(comment).value
    var dest_text = document.getElementById(dest).value
    $.ajax({
        url: '/comments/sending_message',
        type: "POST",
        cache: false,
        timeout: 10000,
        data: {comment: comment_text, dest: dest_text},
        success: function (comm) {
            alert(comm);
        },
        error: function (x, t, m) {
            if (t==="timeout") {
                setTimeout(myAjax,15000);
            }else {
                alert('Возникли трудности')
            }
        }
    });
    return false;
}
function myBattle(attack) {
    var attack = document.getElementById(attack).value
    $.ajax({
        url: '/game/attack',
        type: "POST",
        cache: false,
        timeout: 10000,
        data: {attack_user: attack},
        success: function (atk) {
        },
        error: function (x, t, m) {
            if (t==="timeout") {
                setTimeout(myBattle,15000);
            }else {
                alert('Возникли трудности')
            }
        }
    });
    return false;
}

function myLoad() {
    console.log('1');
    $.ajax({
        url: '/game/load',
        type: "POST",
        cache: false,
        timeout: 10000,
        data: {},
        success: function (load) {
        },
        error: function (x, t, m) {
            if (t==="timeout") {
                 setTimeout(myLoad,15000);
            }else {
                alert('Возникли трудности')
            }
        }
    });
    console.log('2');
    hideShow("load_block")
    console.log('3');
    setTimeout(hideShow,3000,'load_block');
    console.log('4');
    hideShow("start_block")
    console.log('5');
    setTimeout(hideShow,3000,'main-content');
    console.log('6');
    return false;
    console.log('7');
}
function myStartGame(){
    $.ajax({
        url: '/game/start',
        type: "POST",
        cache: false,
        timeout: 10000,
        data: {},
        success: function (load) {
        },
        error: function (x, t, m) {
            if (t === "timeout") {
                setTimeout(myStartGame, 15000);
            } else {
                alert('Возникли трудности')
            }
        }
    });
    return false;
}
function myRestart() {
    $.ajax({
        url: '/game/restart',
        type: "POST",
        cache: false,
        timeout: 10000,
        data: {},
        success: function (load) {
        },
        error: function (x, t, m) {
            if (t==="timeout") {
                setTimeout(myRestart,15000);
            }else {
                alert('Возникли трудности')
            }
        }
    });
    return false;
}

/*
window.onload = function () {
    document.getElementById('test').onclick = myAjax('comment', 'dest');
}
*/
