<div id="topNav">
    <div class="fixed">
        <div class="wrapper">
            <div class="welcome"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/icons/topnav/profile.png"
                                      width="18px" height="20px" alt=""/>
                <span>Chào, <?php echo Yii::app()->user->name; ?>!</span></div>
            <div class="userNav" style="margin-left: 60%">
                <ul>
                    <li class="dd" style="width: 19%">
                            <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/icons/topnav/tasks.png" alt=""
                                 style="height:25px"/>
                            <span>File Và Url</span>
                        <ul class="menu_body">
                            <li><a href="<?php echo Yii::app()->createUrl('file/admin');?>"
                                   title="" class="sInbox">Quản Lý File</a></li>
                            <li><a href="<?php echo Yii::app()->createUrl('file/create');?>"
                                   title="" class="sInbox">Thêm Mới</a></li>
                        </ul>
                    </li>
                    <li class="dd" style="width: 15%"><a title="">
                            <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/icons/topnav/profile.png"
                                 alt="" style="height:25px"/>
                            <span>Tài khoản</span></a>
                        <ul class="menu_body">
                            <li><a href="<?php echo Yii::app()->createUrl('user/update',
                                    array('id' => Yii::app()->user->id));?>"
                                   title="" class="sInbox">Đổi mật khẩu</a></li>
                        </ul>
                    </li>
                    <li class="dd" style="padding-right:100px"><a
                            href="<?php echo Yii::app()->createUrl("user/logout"); ?>" title="">
                            <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/icons/topnav/logout.png"
                                 alt="" style="height:25px"/><span>Thoát</span></a></li>
                </ul>
            </div>
            <div class="fix"></div>
        </div>
    </div>
</div>
<div id="header" class="wrapper">
    <div class="logo"><a href="<?php echo Yii::app()->createUrl('/'); ?>" title=""><img
                src="<?php //echo CHtml::value(Setting::model()->find('name="logo"'), 'value'); ?>" alt=""/></a></div>
    <div class="fix"></div>
</div>
