<?php
class comments
{

    public static function get_this_product_comments($current_product_id)
    {
        $current_product_comments = array();
        $comments = get_comments();

        foreach ($comments as $comment) {
            if (intval($comment->comment_post_ID) === intval($current_product_id) && $comment->comment_type == 'comment' && intval($comment->comment_approved) === 1) {
                $temp = array();
                $date = myCalender::seprate_clock_and_date($comment->comment_date);
                $temp['writer'] = $comment->comment_author;
                $temp['content'] = $comment->comment_content;
                $temp['clock'] = $date['clock'];
                $temp['date'] = $date['date'];
                $temp['persian_date'] = myCalender::to_persian_date($date['date']);
                $current_product_comments[] = $temp;
            }
        }

        return $current_product_comments;
    }

}
