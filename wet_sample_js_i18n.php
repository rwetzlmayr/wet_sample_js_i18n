<?php
class wet_sample_js_i18n
{
	function __construct()
	{
		register_callback(array(__CLASS__ , 'add_i18n_entries'), 'admin_side', 'head_end');
	}

	function add_i18n_entries()
	{
		// Which strings do we need to push to the client?

		// single string
		gTxtScript('404_not_found');
		// array of strings
		gTxtScript(array('form_submission_error', 'publish'));

		// single string w/ one variable substitution
		gTxtScript('file_updated', array('{name}' => 'readme.txt'));

		// single string w/ two variable substitutions
		gTxtScript('comment_received', array('{site}' => 'My Site', '{title}' => 'My First Post'));

		// array of strings w/ matching array of variable substitutions
		gTxtScript(
			array(
				'file_updated',
				'password_changed_mailed'
			),
			array(
				array('{name}' => 'readme.txt'),
				array('{email}' => 'donald.swain@example.com'
				)
			)
		);
	}
}

if (txpinterface == 'admin') new wet_sample_js_i18n;
