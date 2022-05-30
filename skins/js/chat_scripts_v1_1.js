
function myAjax(comment, dest) {
    var comment_text = document.getElementById(comment).value
    var dest_text = document.getElementById(dest).value
    getElementById('comment_block').innerHTML = '<div class="comm_inf"> <p class="login_comments">'+ (dest_length == '' ? ' ' : '<span class="destination_comments">→'+destination+'</span>')+'<span class="comment_date">'+$row["date"]+'</span></p></div><hr color="#1b2640" noshade  class="comment_hr">  \n' + '<div class="comm_inf">\n' + '<br>'
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
            var hp = JSON.parse(atk);
        },
        error: function (x, t, m) {
            if (t==="timeout") {
                setTimeout(myBattle,15000);
            }else {
                alert('Возникли трудности')
            }
        }
    });
    getElementById('player_hp').innerHTML = hp.user;
    getElementById('bot_hp').innerHTML = hp.bot;
    return false;
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