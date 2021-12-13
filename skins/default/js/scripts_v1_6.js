function hideShow(id){
    st = document.getElementById(id);
    if(st.style.display == 'block'){
        st.style.display = 'none';
    }else {
        st.style.display = 'block';
    }
}
function simbolsCount(id){
    var sCount = document.getElementById(id).value.length;
    if (sCount > 3){
        return true;
    }else {
        return false;
    }
}