<?php 
    if(isset($_POST['slider_gallery']) && count($_POST['slider_gallery'])>0){
        $slider_pics_arry = [];
        foreach($_POST['slider_gallery'] as $value){
            if($value!=''){
                $slider_pics_arry[]=$value;
            }
        }
        $res = update_option('main_slider',$slider_pics_arry);?>
        <script>
            location.reload();
        </script>
        <?php
    }
?>
<script>
  function add_new_input(){
    document.querySelector(".content").innerHTML += 
    '<p><input style="width:80%;direction:ltr;" type="text" name="slider_gallery[]"></p>';
    }
</script>

<h1>تنظیمات اسلایدر :</h1>
<h3>لینک تصاویر مورد نظر خود را برای درج در اسلایدر از قسمت رسانه کپی کرده و در باکس های زیر جایگذاری کنید . </h3>

<button type="button" class="btn btn-primary" onclick="add_new_input()">اضافه کردن لینک عکس جدید</button>

<form method="post">
<div class="content">
</div>
<?php if($slider_pics && count($slider_pics)>0) :?>
    <?php foreach($slider_pics as $index): ?>
        <img src="<?php echo $index ?>" width="400px" height="200px" style="margin-top: 20px;">
        <p><input style="width:80%;direction:ltr;" value="<?php echo $index ?>" type="text" name="slider_gallery[]" ></p>
    <?php endforeach; ?>
<?php endif; ?>
<input type="submit"  value="ذخیره تغییرات" style="margin-top: 10px;">
</form>

