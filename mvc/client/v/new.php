<link rel="stylesheet" href="/css/forms/client_new.css" type="text/css" />
<?php
$form = new FormBuilder(false, '/client/add');
echo Scaffold::BulletedMenu($tabs, $currentTab);
echo $form->BeginForm(array('class'=>'formoid-default', 'style'=>"font-size:14px;font-family:'Open Sans','Helvetica Neue','Helvetica',Arial,Verdana,sans-serif;color:#666666;width:480px"));
echo $form->AddTitle('{add a new client}');
echo $form->Build('client');
echo $form->AddSubmitButton('func', 'Add Client', array('label' => '{add client}'));
echo $form->EndForm();
