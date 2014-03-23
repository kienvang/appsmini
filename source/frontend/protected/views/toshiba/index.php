<div class="tv">

</div>
<div class="nv"></div>
<div class="content">
    <h2 class="title"></h2>
    <div class="form">
        <div class="box">
            <p class="question">Câu 1</p>
            <h2>Hãy chon bieu tuong</h2>
            <div class="box-content">
                <!--
                <textarea placeholder="nội dung câu trả lời..."></textarea>
                -->
                <ul class="items">
                    <li>
                        <label for="01">
                        <img src="/themes/toshiba/resources/images/h01.png">
                        </label>
                        <div class="rdo"><input id="01" type="radio" name="ans"></div>
                    </li>
                    <li>
                        <img src="/themes/toshiba/resources/images/h02.png">
                        <div class="rdo"><input type="radio" name="ans"></div>
                    </li>
                    <li>
                        <img src="/themes/toshiba/resources/images/h03.png">
                        <div class="rdo"><input type="radio" name="ans"></div>
                    </li>
                    <li>
                        <img src="/themes/toshiba/resources/images/h04.png">
                        <div class="rdo"><input type="radio" name="ans"></div>
                    </li>
                </ul>
            </div>
        </div>
        <input type="button" class="btn">
    </div>
</div>
<style type="text/css">

</style>
<script type="text/javascript">
    $(function(){
        $('.rdo input').iCheck({
            checkboxClass: 'icheckbox_minimal-blue',
            radioClass: 'iradio_minimal-blue',
            increaseArea: '60%'
        });
    });
</script>