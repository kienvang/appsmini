<section class="row-fluid">
    <h3 class="box-header">Phân Quyền</h3>
    <div class="marginBottom">
      <div class="iconSet">
        <div class="iconBox">
        <?php echo SHtml::link(
                SHtml::image($this->module->getIconsPath().'/manageAuth.png',
                        Helper::translate('srbac','Managing auth items'),
                        array('class'=>'icon',
                          'title'=>Helper::translate('srbac','Managing auth items'),
                          'border'=>0
                          )
                    )." " .
                    ($this->module->iconText ?
                    Helper::translate('srbac','Managing auth items') :
                    ""),
                array('authitem/manage'))
        ?>
        </div>
        <div class="iconBox">
        <?php echo SHtml::link(
                SHtml::image($this->module->getIconsPath().'/usersAssign.png',
                        Helper::translate('srbac','Assign to users'),
                        array('class'=>'icon',
                          'title'=>Helper::translate('srbac','Assign to users'),
                          'border'=>0,
                          )
                    )." " .
                    ($this->module->iconText ?
                    Helper::translate('srbac','Assign to users') :
                    ""),
                array('authitem/assign'));?>
        </div>
        <div class="iconBox">
        <?php echo SHtml::link(
                SHtml::image($this->module->getIconsPath().'/users.png',
                        Helper::translate('srbac','User\'s assignments'),
                        array('class'=>'icon',
                          'title'=>Helper::translate('srbac','User\'s assignments'),
                          'border'=>0
                          )
                    )." " .
                    ($this->module->iconText ?
                    Helper::translate('srbac','User\'s assignments') :
                    ""),
                array('authitem/assignments'));?>
        </div>
      </div>
        <div class="reset"></div>
    </div>
</section>