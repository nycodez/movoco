<link rel="stylesheet" href="/css/forms/client_new.css" type="text/css" />
<?php
echo Scaffold::BulletedMenu($tabs, $currentTab);
$form = new FormBuilder(false, '/product/update');
echo $form->BeginForm(array('class'=>'formoid-default', 'style'=>"font-size:14px;font-family:'Open Sans','Helvetica Neue','Helvetica',Arial,Verdana,sans-serif;color:#666666;width:480px"));
echo $form->AddHiddenField('_id', $vals['_id']);
echo $form->AddTitle('{edit existing product}');
echo $form->Build('product', $vals);
echo $form->AddSubmitButton('func', 'Update Product', array('label' => '{update product}'));
echo $form->EndForm();
