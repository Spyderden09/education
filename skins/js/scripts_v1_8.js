function hideShow(id){
     st = document.getElementById(id);
    if(st.style.display == 'block'){
        st.style.display = 'none';
    }else {
        st.style.display = 'block';
    }
}
function Lose(){
    Show("player_dead")
    Show("bot_alive")
    Hide("player_alive")
    Hide("bot_dead")
    Hide("player_hp")
    Hide("bot_hp")
}
function Win(){
    Show("player_alive")
    Show("bot_dead")
    Hide("player_dead")
    Hide("bot_alive")
    Hide("bot_hp")
    Hide("player_hp")
}
function Show(id){
    st = document.getElementById(id);
    st.style.display = 'block';
}
function Hide(id){
    st = document.getElementById(id);
    st.style.display = 'none';
}
function Antibot(id, r_number){
    var number = document.getElementById(id).value;
    if (number == r_number){
        Show("yes")
        Hide("no")
    }else {
        Show("no")
        Hide("yes")
    }
    return false;
}
function inputsValidation(login_id, pass_id, error_block_id1, error_block_id2, error_block_id3, error_block_id4, error_block_id5) {
    var login_text_length = document.getElementById(login_id).value.length;
    var pass_text_length = document.getElementById(pass_id).value.length;
    if (login_text_length === 0) {
        Ok1 = false;
    } else {
        Ok1 = true;
    }
    if (pass_text_length === 0) {
        Ok2 = false;
    } else {
        Ok2 = true;
    }
    if (Ok1 === true && Ok2 === true) {
        if (login_text_length < 3) {
            hideShow(error_block_id1);
            func_return = false;
        }
        if (pass_text_length < 3) {
            hideShow(error_block_id3);
            func_return = false;
        }
        if (func_return === false) {
            return false;
        } else {

            return true;
        }
    } else if (Ok1 === false && Ok2 === false) {
        hideShow(error_block_id5);
        return false;
    } else if (Ok1 === false) {
        hideShow(error_block_id2);
        return false;
    } else if (Ok2 === false) {
        hideShow(error_block_id4);
        return false;
    }
}
function startGame(st_block, load_block){
    hideShow(st_block);
    hideShow(st_block);
    hideShow(load_block);
    myLoad(load_block);
    return false;
}
