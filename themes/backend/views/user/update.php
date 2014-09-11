<?php

?>
<div class="content">
    <div class="title"><h5>Cập Nhật Tài Khoản "<?php echo $model->username; ?>"</h5></div>
    <?php $this->renderPartial('_form', array('model'=>$model)); ?>
</div>