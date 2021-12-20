function hideShow(id){
    st = document.getElementById(id);
    if(st.style.display == 'block'){
        st.style.display = 'none';
    }else {
        st.style.display = 'block';
    }
}
function inputsValidation(login_id, pass_id, error_block_id1, error_block_id2){
    var login_text_length = document.getElementById(login_id).value.length;
    var pass_text_length = document.getElementById(pass_id).value.length;
    if((login_text_length === 0) || (pass_text_length === 0)) {
        hideShow(error_block_id2);
        return false;
    }else if (login_text_length > 3){
        return true;
    } else {
        hideShow(error_block_id1);
        return false;
    }
}
