<link rel="stylesheet" href="/css/forms/client_new.css" type="text/css" />
<script type="text/javascript" src="/js/forms/client_new.js"></script>
<?php
echo Scaffold::BulletedMenu($tabs, $currentTab);
$form = new FormBuilder(false, '/user/update');
echo $form->BeginForm(array('class'=>'formoid-default', 'style'=>"font-size:14px;font-family:'Open Sans','Helvetica Neue','Helvetica',Arial,Verdana,sans-serif;color:#666666;width:480px"));
echo $form->AddHiddenField('_id', $vals['_id']);
echo $form->AddTitle('{edit existing user}');
echo $form->Build('user', $vals);
echo $form->AddSubmitButton('func', 'Update User', array('label' => '{update user}'));
echo $form->EndForm();
