<link rel="stylesheet" href="/css/forms/client_new.css" type="text/css" />
<?php
$form = new FormBuilder(false, '/record/add');
echo Scaffold::BulletedMenu($tabs, $currentTab);
echo $form->BeginForm(array('enctype'=>'multipart/form-data','class'=>'formoid-default', 'style'=>"font-size:14px;font-family:'Open Sans','Helvetica Neue','Helvetica',Arial,Verdana,sans-serif;color:#666666;width:480px"));
echo $form->AddTitle('{add a new record}');
echo $form->Build('record');
echo $form->AddSubmitButton('func', 'Add Record', array('label' => '{add record}'));
echo $form->EndForm();
