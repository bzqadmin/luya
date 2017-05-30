<?php
use \luya\cms\admin\Module;

?>
<?= $this->render('_angulardirectives'); ?>
<script type="text/ng-template" id="reverse2.html">
    <span class="treeview__label treeview__label--page" ng-click="go(data)">
        <span class="treeview__icon treeview__icon--collapse" ng-show="(menuData.items | menuparentfilter:catitem.id:data.id).length">
            <i class="material-icons">arrow_drop_down</i>
        </span>
        <span class="treeview__icon treeview__icon--right" ng-if="data.is_home==1">
            <i class="material-icons">home</i>
        </span>
    
        <span class="treeview__link">
            <span class="google-chrome-font-offset-fix">{{data.title}}</span>
        </span>
    </span>
    <ul class="treeview__items">
        <li class="treeview__item" ng-class="{'treeview__item--isoffline' : data.is_offline, 'treeview__item--ishidden': data.is_hidden, 'treeview__item--has-children' : (menuData.items | menuparentfilter:catitem.id:data.id).length}" ng-repeat="data in menuData.items | menuparentfilter:catitem.id:data.id" ng-include="'reverse2.html'" />
    </ul>
</script>
<div class="luya__subnav">
    <div class="cmsnav" ng-controller="CmsMenuTreeController">
        <ul class="cmsnav__list cmsnav__list--buttons">
            <?php if (Yii::$app->adminuser->canRoute('cmsadmin/page/create')): ?>
            <li class="cmsnav__button" ui-sref="custom.cmsadd">
                <div class="btn btn-block text-left btn-success">
                    <span class="material-icons">add_box</span>
                    <span class="btn-icon-label"><?= Module::t('view_index_sidebar_new_page'); ?></span>
                </div>
            </li>
            <?php endif; ?>
            <?php if (Yii::$app->adminuser->canRoute('cmsadmin/page/drafts')): ?>
            <li class="cmsnav__button" ui-sref="custom.cmsdraft">
                <div class="btn btn-block text-left btn-info">
                    <span class="material-icons">receipt</span>
                    <span class="btn-icon-label"><?= Module::t('view_index_sidebar_drafts'); ?></span>
                </div>
            </li>
            <?php endif; ?>
        </ul>
        <ul class="cmsnav__list cmsnav__list--switches">
            <li class="cmsnav__switch">
                <label class="switch" for="switch-live-preview">
                    <span class="switch__switch">
                        <input class="switch__checkbox" type="checkbox" id="switch-live-preview"/>
                        <span class="switch__control" for="switch-live-preview"></span>
                    </span>
                    <span class="switch__label">
                        Live preview
                    </span>
                </label>
            </li>
        </ul>
        <ul class="cmsnav__list cmsnav__list--treeview treeview"> 
            <li class="treeview__container"  ng-repeat="catitem in menuData.containers" >
                <div class="treeview__label treeview__label--container">
                    <span class="treeview__icon treeview__icon--collapse">
                        <i class="material-icons">keyboard_arrow_down</i>
                    </span>
                    <span class="treeview__link"><span class="google-chrome-font-offset-fix">{{catitem.alias}}</span></span>
                </div>
                <ul class="treeview__items">
                    <li class="treeview__item" ng-class="{'treeview__item--isoffline' : data.is_offline, 'treeview__item--ishidden': data.is_hidden, 'treeview__item--has-children' : (menuData.items | menuparentfilter:catitem.id:data.id).length}" ng-repeat="data in menuData.items | menuparentfilter:catitem.id:0" ng-include="'reverse2.html'" />
                </ul>
            </li>
        </ul>
    </div>
</div>
<div class="luya__content" ui-view></div>