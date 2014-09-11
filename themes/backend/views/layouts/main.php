<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />

    <link rel="stylesheet" type="text/css" media="all" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/main.css" />
    <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/bootstrap-responsive.css" rel="stylesheet">
    <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/bootstrap.js"></script>

    <title>File Management System</title>

</head>
<body>
<?php if(!Yii::app()->user->isGuest):?>
<!-- Top navigation bar -->

<?php $this->widget('TopNav'); ?>
<?php endif;?>
<!-- Content -->
<?php echo $content; ?>
<div class="fix"></div>

<!-- Footer -->
<?php if(!Yii::app()->user->isGuest):?>
<div id="footer">
    <div class="wrapper">
        <span>&copy; Cung cấp bởi <a href="http://daobv.info" target="_blank">DaoBV.Info</a></span>
    </div>
</div>
<?php endif;?>
</body>
</html>
<script type="text/javascript">
    $(document).ready(function(){
        $(".dd").click(function(){
            $(this).find('.menu_body').slideToggle(200);
        });
    });
</script>