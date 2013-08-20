<link rel="stylesheet" href="/css/forms/client_new.css" type="text/css" />
<script type="text/javascript" src="/js/forms/client_new.js"></script>
<?php
$form = new FormBuilder(false, '/contact/update');
echo $form->BeginForm(array('class'=>'formoid-default', 'style'=>"font-size:14px;font-family:'Open Sans','Helvetica Neue','Helvetica',Arial,Verdana,sans-serif;color:#666666;width:480px"));
echo $form->AddHiddenField('_id', $contact['_id']);
echo $form->AddTitle('{edit existing contact}');
echo $form->Build('contact', $contact);
echo $form->AddSubmitButton('func', 'Update Client', array('label' => '{update contact}'));
echo $form->EndForm();
