<link rel="stylesheet" href="/css/forms/client_new.css" type="text/css" />
<?php
echo Scaffold::BulletedMenu($tabs, $currentTab);
$form = new FormBuilder(false, '/record/update');
echo $form->BeginForm(array('enctype'=>'multipart/form-data','class'=>'formoid-default', 'style'=>"font-size:14px;font-family:'Open Sans','Helvetica Neue','Helvetica',Arial,Verdana,sans-serif;color:#666666;width:480px"));
echo $form->AddHiddenField('_id', $vals['_id']);
echo $form->AddTitle('{edit existing record}');
echo $form->Build('record', $vals);
echo $form->AddSubmitButton('func', 'Update Record', array('label' => '{update record}'));
echo $form->EndForm();

$headers = array
(
 '{type}'=>'',
 '{name}'=>'/record/download/{_id}',
 '{size}'=>'',
 '{uploadUserName}'=>'',
 '{date}'=>'',
 );
$table = new Scaffold('files');
$table->Render($vals['files'], $headers);
