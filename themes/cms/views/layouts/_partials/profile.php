<ul class="nav pull-right">
    <?php if(isset(Yii::app()->user->branchid)) : ?>
        <li><a href="javascript:void(0);"><?php echo Yii::app()->user->branchname; ?></a></li>
    <?php endif; ?>
    <!--
    <li>
        <ul class="messages">
            <li>
                <a href="#"><i class="icon-warning-sign"></i> 2<span class="responsive-text"> alerts</span></a>
            </li>
            <li>
                <a href="#"><i class="icon-envelope"></i> 25<span class="responsive-text"> new messages</span></a>
            </li>
        </ul>
    </li>
    -->
    <li class="separator"></li>
    <li class="dropdown">
        <a href="#" class="dropdown-toggle usermenu" data-toggle="dropdown">
            <img alt="Avatar" src="<?php echo Yii::app()->theme->baseUrl; ?>/resources/assets/images/avatar.png">
            <span>&nbsp;&nbsp;<?php echo Yii::app()->user->name; ?></span>
        </a>
        <?php $this->widget('application.components.BootstrapMenu',array(
            'items'=>array(
                array('label'=>'Profile', 'url'=>Yii::app()->createUrl('/user/auth/profile'), 'iconBootstrap'=>'icon-edit'),
                //array('label'=>'Settings', 'url'=>'#', 'iconBootstrap'=>'icon-wrench'),
                array('label'=>'', 'itemOptions' => array('class' => 'divider')),
                array('label'=>'Sign Out', 'url'=>array('//user/auth/logout'), 'iconBootstrap'=>'icon-off'),
            ),
            'htmlOptions'	=> array(
                'class' => 'dropdown-menu'
            )
        )); ?>
    </li>
</ul>