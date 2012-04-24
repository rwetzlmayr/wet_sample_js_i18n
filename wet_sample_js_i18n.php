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
		$keys = array(
			'save',
			'publish',
			'category1'
		);

		// Render as a JS collection
		foreach($keys as $key) {
			$out[] = "$key: \"".gTxt($key).'"';
		}

		// Add a manual entry because we can
		$out[] = 'wet_foo: "Foo!"';

		$out = join(', '.n, $out);

		// Push to client
		$js = <<<EOS
			$(document).ready(function() {
				$.extend(textpattern.textarray, {
				{$out}
				});
			});
EOS;
		echo script_js($js);
	}
}

if (txpinterface == 'admin') new wet_sample_js_i18n;
