<link rel="stylesheet" href="/css/forms/client_new.css" type="text/css" />
<?php
$form = new FormBuilder(false, '/user/add');
echo Scaffold::BulletedMenu($tabs, $currentTab);
echo $form->BeginForm(array('class'=>'formoid-default', 'style'=>"font-size:14px;font-family:'Open Sans','Helvetica Neue','Helvetica',Arial,Verdana,sans-serif;color:#666666;width:480px"));
echo $form->AddTitle('{add a new user}');
echo $form->Build('user');
echo $form->AddSubmitButton('func', 'Add User', array('label' => '{add user}'));
echo $form->EndForm();
