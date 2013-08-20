<link rel="stylesheet" href="/css/forms/client_new.css" type="text/css" />
<?php
echo Scaffold::BulletedMenu($tabs, $currentTab);
$form = new FormBuilder(false, '/management/update');
echo $form->BeginForm(array('class'=>'formoid-default', 'style'=>"font-size:14px;font-family:'Open Sans','Helvetica Neue','Helvetica',Arial,Verdana,sans-serif;color:#666666;width:480px"));
echo $form->AddHiddenField('_id', $vals['_id']);
echo $form->AddTitle('{edit existing association}');
echo $form->Build('association', $vals);
echo $form->AddSubmitButton('func', 'Update Client', array('label' => '{update association}'));
echo $form->EndForm();

$contactHeaders = array
	(
		'{name}'=>'/contact/view/{_id}',
		'{title}'=>'',
		'{phone}'=>'',
		'{email}'=>'',
	);
$table = new Scaffold('contact');
$table->Render($contacts, $contactHeaders);

$recordHeaders = array
	(
		'{type}'=>'',
		'{name}'=>'/record/view/{_id}',
	);
$table = new Scaffold('record');
$table->Render($records, $recordHeaders);
