<link rel="stylesheet" href="/css/forms/client_new.css" type="text/css" />
<?php
$form = new FormBuilder(false, '/client/customUpdate');
echo Scaffold::BulletedMenu($tabs, $currentTab);
echo $form->BeginForm(array('class'=>'formoid-default', 'style'=>"font-size:14px;font-family:'Open Sans','Helvetica Neue','Helvetica',Arial,Verdana,sans-serif;color:#666666;width:480px"));
echo $form->AddHiddenField('_id', $_id);
echo $form->AddTitle('{update custom page}');
echo $form->AddTextArea('page', $page, 20, 20);
echo $form->AddSubmitButton('func', 'Add Client', array('label' => '{update page}'));
echo $form->EndForm();
