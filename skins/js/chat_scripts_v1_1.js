
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
    setTimeout(hideShow,3000,'load_block');
    setTimeout(hideShow,3000,'main-content');
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
