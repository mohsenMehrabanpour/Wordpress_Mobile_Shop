<?php
    if(is_user_logged_in()){
        
$commenter =  wp_get_current_commenter();

$req =  get_option('require_name_email');

$aria_req = ($req ? "aria-required='true'" : '');

$fields =  array(

    'author' => '<div class="comment-frm-row">' . '<label for="author">' . __('') . '</label> ' . ($req ? '<span class="required">*</span>' : '') .

        '<input class="form-control" id="author" name="author" type="text" value="' . esc_attr($commenter['comment_author']) . '" placeholder="نام شما : " size="30"' . $aria_req . ' /></div>',

    'email'  => '<div class="comment-frm-row"><label for="email">' . __('') . '</label> ' . ($req ? '<span class="required">*</span>' : '') .

        '<input class="form-control" id="email" name="email" type="text" value="' . esc_attr($commenter['comment_author_email']) . '" placeholder="ایمیل شما : " size="30"' . $aria_req . ' /></div>',

    'url'    => '<div  class="comment-frm-row"><label for="url">' . __(' ') . '</label>' .

        '<input class="form-control" id="url" name="url" type="text" value="' . esc_attr($commenter['comment_author_url']) . '" placeholder="وب سایت شما : " size="30" /></div><div class="clearfix"></div>',
    'comment_field' => '<textarea placeholder="teeeeeeeeest"></textarea>'
);

$comments_args = array(

    'fields' => $fields,

    'title_reply_before' =>'<p style="text-align : right;">',

    'title_reply_after' =>'</p>',

    'class_submit' => 'btn btn-warning shadow shadow-lg',

    'comment_field' => '<textarea id="comment" name="comment" required class="shadow shaodow-lg" style="width:100%; border: 4px solid #ffa500; border-top-left-radius: 33px; border-bottom-right-radius: 33px;"></textarea>',

    'title_reply' => 'دیدگاه شما نسبت به این محصول',

    'label_submit' => 'ارسال دیدگاه',

    //'comment_notes_before'=>'<p class="comment-notes">Some Texts</p>',

    // 'comment_notes_after'=>'<p class="comment-notes-after">Some Text</p>'

);

comment_form($comments_args); 

}
else{
    echo "ابتدا وارد سایت شوید";
}