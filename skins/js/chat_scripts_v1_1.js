
function myAjax(comment, dest, login, date) {
    var comment_text = document.getElementById(comment).value
    var dest_text = document.getElementById(dest).value
    var dest_length = document.getElementById(dest).value.length
    document.getElementById('comment_storage').innerHTML += '<div class="comment_div" id="comment_block"><div class="comm_inf"> <p class="login_comments">'+ login + (dest_length === '' ? ' ' : '<span class="destination_comments">→'+dest_text+'</span>')+'<span class="comment_date">'+ date +'</span></p></div><hr color="#1b2640" noshade  class="comment_hr">  \n' + '<div class="comm_inf">\n' + '<br>'+ comment_text +'</div></div>'
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
function Load() {
    $.ajax({
        url: '/game/load',
        type: "POST",
        cache: false,
        timeout: 10000,
        data: {},
        success: function (load) {
            var hp = JSON.parse(load);
            console.log(load)
            document.getElementById('player_hp').innerHTML = hp.hp+"/10";
            document.getElementById('bot_hp').innerHTML = hp.c_hp+"/10";
        },
        error: function (x, t, m) {
            if (t==="timeout") {
                setTimeout(myAjax,15000);
            }else {
                alert('Возникли трудности')
            }
        }
    });
    Hide("start_block");
    hideShow("load_block");
    setTimeout(hideShow,3000,'load_block');
    setTimeout(Show,3000,'battle');
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
            console.log(hp)
            if((hp.user <= 0) || (hp.bot <= 0)){
                if (hp.user <= 0){
                    game_status = "Ты проиграл"
                    Lose()
                }
                if (hp.bot <= 0){
                    game_status = "Ты победил"
                    Win()
                }
            }else {
                game_status = hp.status;
            }
            document.getElementById('game_status').innerHTML = game_status;
            document.getElementById('player_hp').innerHTML = hp.user+"/10";
            document.getElementById('bot_hp').innerHTML = hp.bot+"/10";
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
function myStartGame(){
    $.ajax({
        url: '/game/start',
        type: "POST",
        cache: false,
        timeout: 10000,
        data: {},
        success: function (start) {
        },
        error: function (x, t, m) {
            if (t === "timeout") {
                setTimeout(myStartGame, 15000);
            } else {
                alert('Возникли трудности')
            }
        }
    });
    Load()
    Show("battleground")
    return false;
}
function myRestart() {
    $.ajax({
        url: '/game/restart',
        type: "POST",
        cache: false,
        timeout: 10000,
        data: {},
        success: function (restart) {
            var game_status = JSON.parse(restart)
            document.getElementById('game_status').innerHTML = game_status;
            document.getElementById('player_hp').innerHTML = "10/10";
            document.getElementById('bot_hp').innerHTML = "10/10";
        },
        error: function (x, t, m) {
            if (t==="timeout") {
                setTimeout(myRestart,15000);
            }else {
                alert('Возникли трудности')
            }
        }
    });
    Hide("player_dead");
    Hide("bot_dead");
    Show("bot_alive");
    Show("player_alive");
    Show("player_hp");
    Show("bot_hp");
    Hide("battle");
    Load();
    return false;
}