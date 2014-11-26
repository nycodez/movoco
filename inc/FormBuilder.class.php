<?php
$elementsDefault = array (
	'client' => array (
		'fullname' => array (
			'type' => 'text',
			'label' => 'client full name',
			'size' => 40,
			'length' => 100,
			'active' => true,
			'required' => true,
			'placeholder' => 'Business Widgets, Inc.',
		),
		'name' => array (
			'type' => 'text',
			'label' => 'name',
			'size' => 40,
			'length' => 100,
			'active' => true,
			'required' => true,
			'placeholder' => 'BizWidgets',
		),
		'industry' => array (
			'type' => 'select',
			'label' => 'industry',
			'options' => array (
				'Legal' => 'Legal',
				'Medical' => 'Medical',
				'Manufacturing' => 'Manufacturing',
				'Management' => 'Management',
				'Office' => 'Office',
				'Retail' => 'Retail',
			),
			'active' => true,
			'required' => true,
			'placeholder' => 'select an industry',
		),
		'account' => array (
			'type' => 'text',
			'label' => 'account number',
			'size' => 40,
			'length' => 100,
			'active' => true,
			'required' => true,
			'placeholder' => 'Client Account Number',
		),
		'user' => array (
			'type' => 'select',
			'label' => '{user assigned}',
			'source' => array (
				'model' => 'user',
				'method' => 'getActiveUsers',
			),
			'active' => true,
			'placeholder' => '{select a user}',
		),
	),
	'contact' => array (
		'client' => array (
			'type' => 'select',
			'label' => '{client}',
			'source' => array (
				'model' => 'client',
				'method' => 'getActiveClients',
			),
			'active' => true,
			'placeholder' => '{select a client}',
		),
		'name' => array (
			'type' => 'text',
			'label' => '{contact name}',
			'size' => 40,
			'length' => 100,
			'active' => true,
			'required' => true,
			'placeholder' => 'Joe Consumer',
		),
		'client' => array (
			'type' => 'select',
			'label' => '{client name}',
			'source' => array (
				'model' => 'client',
				'method' => 'getActiveClients',
			),
			'active' => true,
			'placeholder' => '{select a client}',
		),
		'title' => array (
			'type' => 'text',
			'label' => '{title}',
			'size' => 40,
			'length' => 100,
			'active' => true,
			'required' => true,
			'placeholder' => 'Manager',
		),
		'email' => array (
			'type' => 'text',
			'label' => '{email address}',
			'size' => 40,
			'length' => 100,
			'active' => true,
			'placeholder' => 'email@clientname.com',
		),
		'phone' => array (
			'type' => 'text',
			'label' => 'phone',
			'size' => 20,
			'length' => 100,
			'active' => true,
			'placeholder' => '(212) 203-9069',
		),
		'fax' => array (
			'type' => 'text',
			'label' => 'fax',
			'size' => 20,
			'length' => 100,
			'active' => true,
			'placeholder' => '(212) 203-9071',
		),
	),
	'event' => array (
		'name' => array (
			'type' => 'text',
			'label' => 'event name',
			'size' => 40,
			'length' => 100,
			'active' => true,
			'required' => true,
			'placeholder' => 'Lunch Meeting',
		),
		'date' => array (
			'type' => 'date',
			'label' => 'event date',
			'size' => 20,
			'length' => 100,
			'active' => true,
			'required' => true,
			'placeholder' => 'Event Date',
		),
		'occasion' => array (
			'type' => 'select',
			'label' => 'event type',
			'options' => array (
				'Lunch' => 'Lunch',
				'Meeting' => 'Meeting',
				'On Site' => 'On Site',
			),
			'active' => true,
			'required' => true,
			'placeholder' => 'select an occasion',
		),
		'client' => array (
			'type' => 'select',
			'label' => '{client name}',
			'source' => array (
				'model' => 'client',
				'method' => 'getActiveClients',
			),
			'active' => true,
			'placeholder' => '{select a client}',
		),
		'user' => array (
			'type' => 'select',
			'label' => '{user assigned}',
			'source' => array (
				'model' => 'user',
				'method' => 'getActiveUsers',
			),
			'active' => true,
			'placeholder' => '{select a user}',
		),
	),
	'user' => array (
		'name' => array (
			'type' => 'text',
			'label' => '{user name}',
			'size' => 40,
			'length' => 100,
			'active' => true,
			'required' => true,
			'placeholder' => 'Joe Employee',
		),
		'role' => array (
			'type' => 'select',
			'label' => '{company role}',
			'options' => array (
				'Admin' => 'Admin',
				'Sales' => 'Sales',
				'Officer' => 'Officer',
			),
			'active' => true,
			'required' => true,
			'placeholder' => 'select a role',
		),
		'login' => array (
			'type' => 'text',
			'label' => '{user login}',
			'size' => 40,
			'length' => 100,
			'active' => true,
			'required' => true,
			'placeholder' => 'user login',
		),
		'secret' => array (
			'type' => 'text',
			'label' => '{user password}',
			'size' => 40,
			'hidden' => false,
			'length' => 100,
			'active' => true,
			'required' => true,
			'placeholder' => 'secret password',
		),
		'api' => array (
			'type' => 'check',
			'label' => '{api user}',
			'hidden' => false,
			'active' => true,
			'required' => false,
			'placeholder' => 'user is an API connection',
		),
		'origin' => array (
			'type' => 'textarea',
			'label' => '{connection origin}',
			'size' => 40,
			'hidden' => false,
			'active' => true,
			'required' => false,
			'placeholder' => 'IP addresses user is allowed to connect from',
		),
	),
	'record' => array (
		'name' => array (
			'type' => 'text',
			'label' => '{quick subject}',
			'size' => 40,
			'length' => 100,
			'active' => true,
			'required' => true,
			'placeholder' => 'Fall Profit Spreadsheet',
		),
		'details' => array (
			'type' => 'textarea',
			'label' => '{details}',
			'cols' => 30,
			'rows' => 3,
			'active' => true,
			'required' => false,
			'placeholder' => 'Record Details',
		),
		'attachment' => array (
			'type' => 'file',
			'label' => '{attachments}',
			'active' => true,
		),
		'subtype' => array (
			'type' => 'select',
			'label' => '{record subtype}',
			'options' => array (
				'attachment' => 'Attachment',
				'call' => 'Call',
				'request' => 'Request',
			),
			'default' => 'call',
			'active' => true,
			'required' => true,
			'placeholder' => 'select a subtype',
		),
		'status' => array (
			'type' => 'select',
			'label' => '{record status}',
			'options' => array (
				'open' => 'Open',
				'closed' => 'Closed',
			),
			'default' => 'open',
			'active' => true,
			'required' => true,
			'placeholder' => '{select a status}',
		),
		'client' => array (
			'type' => 'select',
			'label' => '{client name}',
			'source' => array (
				'model' => 'client',
				'method' => 'getActiveClients',
			),
			'active' => true,
			'placeholder' => '{select a client}',
		),
		'userAssigned' => array (
			'type' => 'select',
			'label' => '{user assigned}',
			'source' => array (
				'model' => 'user',
				'method' => 'getActiveUsers',
			),
			'active' => true,
			'placeholder' => '{select a user}',
		),
	),
	'product' => array (
		'name' => array (
			'type' => 'text',
			'label' => 'product name',
			'size' => 40,
			'length' => 100,
			'active' => true,
			'required' => true,
			'placeholder' => 'Small Widget',
		),
		'class' => array (
			'type' => 'select',
			'label' => 'product class',
			'options' => array (
				'Item' => 'Item',
				'Service' => 'Service',
			),
			'active' => true,
			'required' => true,
			'placeholder' => 'select a class',
		),
		'price' => array (
			'type' => 'text',
			'label' => 'price per unit',
			'size' => 40,
			'length' => 100,
			'active' => true,
			'required' => true,
			'placeholder' => '4.50',
		),
	),
	'association' => array (
		'name' => array (
			'type' => 'text',
			'label' => 'association name',
			'size' => 40,
			'length' => 100,
			'active' => true,
			'required' => true,
			'placeholder' => 'Fox Chase HOA',
		),
		'streetAddress' => array (
			'type' => 'text',
			'label' => 'address',
			'size' => 40,
			'length' => 100,
			'active' => true,
			'required' => true,
			'placeholder' => '123 Here Ct',
		),
		'streetCity' => array (
			'type' => 'text',
			'label' => 'city',
			'size' => 40,
			'length' => 100,
			'active' => true,
			'required' => true,
			'placeholder' => 'Anyville',
		),
		'streetState' => array (
			'type' => 'text',
			'label' => 'state',
			'size' => 40,
			'length' => 100,
			'active' => true,
			'required' => true,
			'placeholder' => 'GA',
		),
		'streetZip' => array (
			'type' => 'text',
			'label' => 'zip',
			'size' => 40,
			'length' => 100,
			'active' => true,
			'required' => true,
			'placeholder' => '12345',
		),
	),
);
class FormBuilder
{
	public $Descriptor = 'label';		// label, placeholder
	public $Style = 'defaultForm';		//defaultForm, defaultFormRO
	public $ReadOnly = false;		//true, false
	public $TextBoxSize = 40;
	public $SetFormName = true;
	public $Heading;
	public function FlattenAttrs($attrs)
	{
		$s = '';
		if($attrs && count($attrs))
			foreach($attrs as $k => $v)
			{
				if($v === false)
					$v = $k;

				$s .= " $k=\"" . htmlspecialchars($v) . "\"";
			}

		return $s;
	}
	public function __construct($name = false, $action = false, $method = 'POST')
	{
		global $PHP_SELF;

		if($name)
			$this->FormName = $name;
		else
			$this->FormName = 'form'. rand();

		if($action === false)
			$this->Action = $PHP_SELF;
		else
			$this->Action = $action;

		$this->Method = $method;
	}
	public function BeginForm($formOpts = false)
	{
		if(isset($formOpts) && $formOpts['labels'] === false)
			$this->labels = false;
		else
			$this->labels = true;
		$opts = array
			(
				'name' => $this->FormName,
				'action' => $this->Action,
				'method' => $this->Method,
				'accept-charset' => 'utf-8',
			);

		if($formOpts)
			$opts = array_merge($opts, $formOpts);

		$this->Heading = '<form ' . $this->FlattenAttrs($opts) . ">
			<input type=\"hidden\" name=\"formName\" value=\"{$this->FormName}\">\n";

		return $this->Heading;
	}
	public function BeginValidatedForm($formOpts = array())
	{
		$formOpts = array_merge($formOpts, array
			(
				'onsubmit' => 'return ValidateForm(this);'
			));

		return $this->BeginForm($formOpts);
	}
	public function Build($class, $values = array())
	{
		global $elementsDefault;
		if(!count($values))
			$blank = true;
		else
			$blank = false;
		$customElements = ModelLoad::Load('settings', 'GetClassFormElements', $class);
		$elements = array_merge((array)$elementsDefault[$class], (array)$customElements);
		$str = '';
		foreach($elements as $k => $v)
		{
			if(!$v['active'] || $v['hidden'])
			{
				continue;
			}

			$str .= '<div class=element-input>';

			if($v['label'] && $this->labels)
			{
				$str .= "<label class=title for={$k}>{$v['label']}</label>";
			}
			if($v['required'])
			{
				//				$str .= " required=true ";
			}
			if($blank)
				$default = $v['default'];
			else
				$default = $values[$k];
			switch($v['type'])
			{
			case 'check':
				$str .= $this->AddCheckBox($k, $default, 1);
				if(isset($v['placeholder']))
				{
					$str .= '<span>'. $v['placeholder'] .'</span>';
				}
				break;
			case 'radio':
				$str .= $this->AddRadioButton($k, $default, 1);
				break;
			case 'text':
				$str .= $this->AddTextField($k, $default, $v['size'], $v['length'], array('placeholder' => $v['placeholder']));
				break;
			case 'file':
				$str .= $this->AddFileButton('file[]', true);
				break;
			case 'date':
				$str .= $this->AddTextField($k, $default, $v['size'], $v['length'], array('class' => 'datepicker', 'placeholder' => $v['placeholder']));
				break;
			case 'textarea':
				$str .= $this->AddTextArea($k, $default, $v['size'], $v['length'], array('placeholder' => $v['placeholder']));
				break;
			case 'select':
				if(is_array($v['options']))
					$opts = $v['options'];
				else if(is_array($v['source']))
				{
					$o = ModelLoad::Load($v['source']['model'], $v['source']['method']);
					foreach($o as $kk => $vv)
						$opts[$kk] = $vv['name'];
				}
				$str .= $this->AddSelect($k, $v['placeholder'], $opts, $default);
				unset($opts);
				break;
			case 'hidden':
				break;
			}
			$str .= '</div>';
		}
		return $str;
	}
	public function AddSelect($name, $title, $options, $selected = false, $formOpts = false)
	{
		if(!is_array($formOpts))
			$formOpts = array();

		if($this->SetFormName)
			$formOpts['name'] = "{$this->FormName}[{$name}]";
		else
			$formOpts['name'] = $name;

		if(!isset($formOpts['class']))
			$formOpts['class'] = '';

		$pullDown = '<select';
		$pullDown .= $this->FlattenAttrs($formOpts);
		$pullDown .= ">\n";

		if($title != '')
		{
			if(!array_key_exists('multiple', $formOpts))
			{
				$pullDown .= "\t<option value=\"\"";
				if(!strlen($selected))
					$pullDown .= ' selected="selected"';
				$pullDown .= ">$title</option>\n";

				$pullDown .= "\t<option value=\"\">----------------</option>\n";
			}
			else
				$pullDown = "$title: <br />" . $pullDown;
		}

		if($selected !== false && !is_array($selected))
			$selected = array($selected);

		if(is_array($options))
			foreach($options as $key => $val)
			{
				if(is_array($val))
				{
					if(isset($val['value']))
						$key = $val['value'];

					$val = $val['name'];
				}

				$pullDown .= "\t<option value=\"$key\"";
				if($selected)
					foreach($selected as $v)
					{
						if((string)$key === (string)$v)
							$pullDown .= ' selected="selected"';
					}

				$pullDown .= ">$val</option>\n";
			}

		return $pullDown . "</select>\n";
	}
	public function AddTitle($string)
	{
		return "<div class=element-text><h2 class=title>{$string}</h2></div>";
	}
	public function AddSelectBox($name, $title, $options, $selected = array(), $formOpts = false)
	{
		if(!is_array($formOpts))
			$formOpts = array();

		$formOpts['multiple'] = false;

		return $this->AddSelect($name, $title, $options, $selected, $formOpts);
	}
	public function makeFormInputElement($type, $name, $value, $opts = array())
	{
		$attr = $this->FlattenAttrs(array_merge(array(
			'type' => $type,
			'name' => $name,
			'value' => $value,
		), $opts));

		return "<input $attr />\n";
	}
	public function makeFormButtonElement($type, $name, $value, $opts = array())
	{
		if(isset($opts['label']))
		{
			$label = $opts['label'];
			unset($opts['label']);
		}
		else
			$label = $value;

		$attr = $this->FlattenAttrs(array_merge(array(
			'type' => $type,
			'name' => $name,
			'value' => $value,
		), $opts));

		return "<button $attr />$label</button>\n";
	}
	public function AddHiddenField($name, $value, $opts = array())
	{
		if($this->SetFormName)
			$name = "{$this->FormName}[{$name}]";
		return $this->makeFormInputElement('hidden', $name, $value, $opts);
	}
	public function AddPassword($name, $value, $size = 40, $max = 0, $opt = false)
	{
		return $this->AddTextField($name, $value, $size, $max, $opt, 'password');
	}
	public function AddTextField($name, $value, $size = 40, $max = 0, $opt = false, $type = 'text')
	{
		$opts = array();

		if($size)
			$opts['size'] = $size;
		if($max)
			$opts['maxlength'] = $max;
		if($opt)
			$opts = array_merge($opts, $opt);
		if($this->SetFormName)
			$name = "{$this->FormName}[{$name}]";

		return $this->makeFormInputElement($type, $name, $value, $opts);
	}
	public function AddTextArea($name, $value, $cols, $rows, $opt = array())
	{
		if($this->SetFormName)
			$name = "{$this->FormName}[{$name}]";

		$attr = $this->FlattenAttrs(array_merge(array(
			'name' => $name,
			'cols' => $cols,
			'rows' => $rows,
		), $opt));

		$value = htmlspecialchars($value);

		return "<textarea $attr>$value</textarea>\n";
	}
	public function AddCheckBox($name, $label, $value = false, $checked = 0, $opt = array())
	{
		if($value === false)
			$value = 1;

		if($checked)
			$opt['checked'] = false;

		if($this->SetFormName)
			$name = "{$this->FormName}[{$name}]";

		$attr = $this->FlattenAttrs(array_merge(array(
			'type' => 'checkbox',
			'name' => $name,
			'value' => $value,
		), $opt));

		$elt = "<input $attr>";

		if($label != '')
			return "<label>$elt $label</label>\n";
		else
			return $elt . "\n";
	}
	public function AddRadioButton($name, $label, $value, $testValue, $opt = array())
	{
		$opt['type'] = 'radio';

		return $this->AddCheckBox($name, $label, $value, ($value == $testValue), $opt);
	}
	public function AddButton($name, $value, $opt = array())
	{
		return $this->makeFormInputElement('button', $name, $value, $opt);
	}
	public function AddFileButton($name, $multiple = false)
	{
		if($multiple)
			$multStr = 'multiple="multiple" ';
		else
			$multStr = '';
		return "<input type=\"file\" name=\"$name\" $multStr/>\n";
	}
	public function AddResetButton($value, $opt = array())
	{
		$attr = $this->FlattenAttrs(array_merge(array(
			'type' => 'reset',
			'value' => $value,
		), $opt));

		return "<input $attr />\n";
	}
	public function AddSubmitButton($name, $value, $opt = array())
	{
		return '<div class=element-submit>'.$this->makeFormButtonElement('submit', $name, $value, $opt).'</div>';
	}
	public function EndForm()
	{
		return "</FORM>\n";
	}
}
