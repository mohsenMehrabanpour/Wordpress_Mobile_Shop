<link rel="stylesheet" href="<?php Assets::css('uikit-rtl.min.css'); ?>">
<?php
$details_arr = unserialize($product_general_details);
?>
<table class="uk-table uk-table-hover uk-table-striped">
    <tbody>
        <tr>
            <td>وزن</td>
            <td>
                <input type="text" name="weight" id="weight" class=".uk-form-small" value="<?php echo $details_arr['weight'] ?>"> گرم
            </td>
        </tr>
        <tr>
            <td>تعداد سیم کارت</td>
            <td>
                <input type="text" name="sim_count" id="sim_count" class=".uk-form-small" value="<?php echo $details_arr['sim_count'] ?>"> سیم کارت
            </td>

        </tr>
        <tr>
            <td>تراشه پردازنده</td>
            <td>
                <input type="text" name="chipset" id="chipset" class=".uk-form-small" value="<?php echo $details_arr['chipset'] ?>">
            </td>
        </tr>
        <tr>
            <td>پردازنده مرکزی</td>
            <td>
                <input type="text" name="cpu" id="cpu" class=".uk-form-small" value="<?php echo $details_arr['cpu'] ?>">
            </td>
        </tr>
        <tr>
            <td>پردازنده گرافیکی</td>
            <td>
                <input type="text" name="gpu" id="gpu" class=".uk-form-small" value="<?php echo $details_arr['gpu'] ?>">
            </td>
        </tr>
        <tr>
            <td>حافظه داخلی</td>
            <td>
                <input type="text" name="memory" id="memory" class=".uk-form-small" value="<?php echo $details_arr['memory'] ?>"> گیگابایت
            </td>
        </tr>
        <tr>
            <td>RAM</td>
            <td>
                <input type="text" name="RAM" id="RAM" class=".uk-form-small" value="<?php echo $details_arr['RAM'] ?>"> گیگابایت
            </td>
        </tr>
        <tr>
            <td>پشتیبانی از کارت حافظه جانبی</td>
            <td>
                <input type="text" name="exstorage" id="exstorage" class=".uk-form-small" value="<?php echo $details_arr['exstorage'] ?>">
            </td>
        </tr>
        <tr>
            <td>فناوری صفحه نمایش</td>
            <td>
                <input type="text" name="display" id="display" class=".uk-form-small" value="<?php echo $details_arr['display'] ?>">
            </td>
        </tr>
        <tr>
            <td>سایز صفحه نمایش</td>
            <td>
                <input type="text" name="displaySize" id="displaySize" class=".uk-form-small" value="<?php echo $details_arr['displaySize'] ?>"> اینچ
            </td>
        </tr>
        <tr>
            <td>رزولوشن</td>
            <td>
                <input type="text" name="resolution" id="resolution" class=".uk-form-small" value="<?php echo $details_arr['resolution'] ?>">
            </td>
        </tr>
        <tr>
            <td>شبکه های ارتباطی</td>
            <td>
                <input type="text" name="networks" id="networks" class=".uk-form-small" value="<?php echo $details_arr['networks'] ?>">
            </td>
        </tr>
        <tr>
            <td>WI-FI</td>
            <td>
                دارد <input type="checkbox" name="wifi" id="wifi" <?php $details_arr['wifi'] == 1 ? print 'checked' : ''; ?>>
            </td>
        </tr>
        <tr>
            <td>بلوتوث</td>
            <td>
                دارد <input type="checkbox" name="bluetooth" id="bluetooth" onclick="handle_blutooth_version()" <?php $details_arr['bluetooth'] == 1 ? print 'checked' : ''; ?>>
            </td>
        </tr>
        <tr id="bluetooth_ver_tr" style="display: none;">
            <td>نسخه بلوتوث</td>
            <td>
                <input type="text" name="bluetooth_ver" id="bluetooth_ver" class=".uk-form-small" value="<?php echo $details_arr['bluetooth_ver'] ?>">
            </td>
        </tr>
        <tr>
            <td>رادیو</td>
            <td>
                دارد <input type="checkbox" name="radio" id="radio" <?php $details_arr['radio'] == 1 ? print 'checked' : ''; ?>>
            </td>
        </tr>
        <tr>
            <td>فناوری مکان یابی</td>
            <td>
                <input type="text" name="navigate" id="navigate" class=".uk-form-small" value="<?php echo $details_arr['navigate'] ?>">
            </td>
        </tr>
        <tr>
            <td>درگاه ارتباطی</td>
            <td>
                <input type="text" name="port" id="port" class=".uk-form-small" value="<?php echo $details_arr['port'] ?>">
            </td>
        </tr>
        <tr>
            <td>دوربین</td>
            <td>
                دارد <input type="checkbox" name="camera" id="camera" onclick="handle_camera_resolution()" <?php $details_arr['camera'] == 1 ? print 'checked' : ''; ?>>
            </td>
        </tr>
        <tr id="camera_resolution_tr" style="display: none;">
            <td>رزولوشن عکس</td>
            <td>
                <input type="text" name="camera_resolution" id="camera_resolution" class=".uk-form-small" value="<?php echo $details_arr['camera_resolution'] ?>"> مگاپیکسل
            </td>
        </tr>
        <tr>
            <td>دوربین سلفی</td>
            <td>
                دارد <input type="checkbox" name="selfie" id="selfie" onclick="handle_selfie()" <?php $details_arr['selfie'] == 1 ? print 'checked' : ''; ?>>
            </td>
        </tr>
        <tr id="selfie_resolution_tr" style="display: none;">
            <td>رزولوشن عکس سلفی</td>
            <td>
                <input type="text" name="selfie_resolution" id="selfie_resolution" class=".uk-form-small" value="<?php echo $details_arr['selfie_resolution'] ?>"> مگاپیکسیل
            </td>
        </tr>
        <tr>
            <td>سیستم عامل</td>
            <td>
                <input type="text" name="os" id="os" class=".uk-form-small" value="<?php echo $details_arr['os'] ?>">
            </td>
        </tr>
        <tr>
            <td>حس گر ها</td>
            <td>
                <input type="text" name="sensor" id="sensor" class=".uk-form-small" value="<?php echo $details_arr['sensor'] ?>">
            </td>
        </tr>
        <tr>
            <td>مشخصات باتری</td>
            <td>
                <input type="text" name="battery" id="battery" class=".uk-form-small" value="<?php echo $details_arr['battery'] ?>">
            </td>
        </tr>
    </tbody>
</table>
<script>
    function handle_blutooth_version() {
        if (document.querySelector('#bluetooth').checked) {
            document.querySelector('#bluetooth_ver_tr').style.display = 'table-row';
        }
        if (!document.querySelector('#bluetooth').checked) {
            document.querySelector('#bluetooth_ver_tr').style.display = 'none';
        }
    }

    function handle_camera_resolution() {
        if (document.querySelector('#camera').checked) {
            document.querySelector('#camera_resolution_tr').style.display = 'table-row';
        }
        if (!document.querySelector('#camera').checked) {
            document.querySelector('#camera_resolution_tr').style.display = 'none';
        }
    }

    function handle_selfie() {
        if (document.querySelector('#selfie').checked) {
            document.querySelector('#selfie_resolution_tr').style.display = 'table-row';
        }
        if (!document.querySelector('#selfie').checked) {
            document.querySelector('#selfie_resolution_tr').style.display = 'none';
        }
    }
</script>