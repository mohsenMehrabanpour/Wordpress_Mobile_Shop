$(document).ready(function() {
    //login ajax handler jquery
    $('#login-form').on('submit', (event) => {
        event.preventDefault();
        var in_username = $('#username').val();
        var in_password = $('#password').val();
        var in_login_nonce = $('#login_nonce').val();
        var ajax_url = mehraban_ajax_url.url;
        var in_remember_me = $('#rememberme').prop('checked');
        if (in_username == '' || in_password == '') {
            $('#err_box').slideDown(100).html('.لطفا فیلد هارا پر کنید');
            return;
        }
        $.ajax({
            url: ajax_url,
            type: 'post',
            dataType: 'json',
            data: {
                action: 'mehraban_user_login',
                username: in_username,
                password: in_password,
                rememberme: in_remember_me,
                login_nonce: in_login_nonce
            },
            success: function(response) {

                if (response.error) {
                    $('#err_box').slideDown(100).html(response.message);
                }
                if (response.success) {
                    $('#success_box').slideDown(100).html(response.message);
                }

            },
            error: function() {}

        });

    });

    //add to basket ajax handler
    $('#add_to_basket').click(function(e) {
        e.preventDefault();
        $.ajax({
            url: mehraban_ajax_url.url,
            type: 'post',
            dataType: 'json',
            data: {
                action: 'mehraban_add_to_basket',
                product_id: product_info.product_id,
                product_title: product_info.product_title,
                product_price: product_info.product_price
            },
            success: function(response) {},
            error: function() {}

        });
    });

});

app = new Vue({
    el: '#app',
    data: {
        products: '',
        ajax_url: ''
    },
    created() {
        this.ajax_url = mehraban_ajax_url.url;

        $.ajax({
            url: this.ajax_url,
            type: 'post',
            dataType: 'json',
            data: {
                action: 'load_product'
            },
            success: function(response) {
                app.products = response;
            },
            error: function() {}
        });

    },
    mounted() {

        //filter product list
        $('#filter_product_list').click(function(e) {

            var terms = document.querySelectorAll('[id=terms]');
            var tags_in = document.querySelectorAll('[id=tags]');
            var categories = '';
            var tags = '';
            var min_price = document.querySelector('#min_poroduct_price_filter').value;
            var max_price = document.querySelector('#max_poroduct_price_filter').value;
            var search_box = document.querySelector('#filter_search_box').value;

            terms.forEach(element => {
                if (element.checked) {
                    categories += element.value + ','
                }
            });
            categories = categories.substring(0, categories.length - 1);


            tags_in.forEach(element => {
                if (element.checked) {
                    tags += element.value + ','
                }
            });
            tags = tags.substring(0, tags.length - 1);

            $.ajax({
                url: mehraban_ajax_url.url,
                type: 'post',
                dataType: 'json',
                data: {
                    action: 'filter_product',
                    category_filter: categories,
                    min_price_filter: min_price,
                    max_price_filter: max_price,
                    search_box_filter: search_box,
                    tags_filter: tags,
                },
                success: function(response) {
                    app.products = response;
                    $('#filter_added_alert').show(500);
                    setTimeout(function() { $('#filter_added_alert').hide(500); }, 3000);
                },
                error: function() {}
            });

        });


    }
})

discount_app = new Vue({
    el: '#discount_app',
    data: {
        discount_list: '',
        ajax_url: ''
    },
    created() {
        this.ajax_url = mehraban_ajax_url.url;

        $.ajax({
            url: this.ajax_url,
            type: 'post',
            dataType: 'json',
            data: {
                action: 'load_products_with_discount'
            },
            success: function(response) {
                discount_app.discount_list = response;
            },
            error: function() {}
        });

    }
});