<link rel="stylesheet" href="/css/forms/client_new.css" type="text/css" />
<?php
$form = new FormBuilder(false, '/event/add');
echo Scaffold::BulletedMenu($tabs, $currentTab);
echo $form->BeginForm(array('class'=>'formoid-default', 'style'=>"font-size:14px;font-family:'Open Sans','Helvetica Neue','Helvetica',Arial,Verdana,sans-serif;color:#666666;width:480px"));
echo $form->AddTitle('{add a new event}');
echo $form->Build('event');
echo $form->AddSubmitButton('func', 'Add Event', array('label' => '{add event}'));
echo $form->EndForm();
