function profile_show_data_info() {
    document.querySelector('#profile_purchase_section').style.display = 'none';
    document.querySelector('#profile_info_section').style.display = 'block';
    document.querySelector('#profile_btn_info').style.background = '#6262f7';
    document.querySelector('#profile_btn_info').style.color = '#ffffff';
    document.querySelector('#profile_btn_purchase').style.background = '#eeeeee';
    document.querySelector('#profile_btn_purchase').style.color = '#000000';
}

function profile_show_purchase_info() {
    document.querySelector('#profile_purchase_section').style.display = 'block';
    document.querySelector('#profile_info_section').style.display = 'none';
    document.querySelector('#profile_btn_info').style.background = '#eeeeee';
    document.querySelector('#profile_btn_info').style.color = '#000000';
    document.querySelector('#profile_btn_purchase').style.background = '#6262f7';
    document.querySelector('#profile_btn_purchase').style.color = '#ffffff';
}

function single_show_added_to_basket_alert() {
    document.querySelector("#added_to_basket_alert").style.display = 'block';
}