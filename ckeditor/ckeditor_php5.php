<?php
/*
* Copyright (c) 2003-2010, CKSource - Frederico Knabben. All rights reserved.
* For licensing, see LICENSE.html or http://ckeditor.com/license
*/

/**
 * \brief CKEditor class that can be used to create editor
 * instances in PHP pages on server side.
 * @see http://ckeditor.com
 *
 * Sample usage:
 * @code
 * $CKEditor = new CKEditor();
 * $CKEditor->editor("editor1", "<p>Initial value.</p>");
 * @endcode
 */
class CKEditor
{
	/**
	 * The version of %CKEditor.
	 */
	const version = '3.4';
	/**
	 * A constant string unique for each release of %CKEditor.
	 */
	const timestamp = 'A7HG4HT';

	/**
	 * URL to the %CKEditor installation directory (absolute or relative to document root).
	 * If not set, CKEditor will try to guess it's path.
	 *
	 * Example usage:
	 * @code
	 * $CKEditor->basePath = '/ckeditor/';
	 * @endcode
	 */
	public $basePath;
	/**
	 * An array that holds the global %CKEditor configuration.
	 * For the list of available options, see http://docs.cksource.com/ckeditor_api/symbols/CKEDITOR.config.html
	 *
	 * Example usage:
	 * @code
	 * $CKEditor->config['height'] = 400;
	 * // Use @@ at the beggining of a string to ouput it without surrounding quotes.
	 * $CKEditor->config['width'] = '@@screen.width * 0.8';
	 * @endcode
	 */
	public $config = array();
	/**
	 * A boolean variable indicating whether CKEditor has been initialized.
	 * Set it to true only if you have already included
	 * &lt;script&gt; tag loading ckeditor.js in your website.
	 */
	public $initialized = false;
	/**
	 * Boolean variable indicating whether created code should be printed out or returned by a function.
	 *
	 * Example 1: get the code creating %CKEditor instance and print it on a page with the "echo" function.
	 * @code
	 * $CKEditor = new CKEditor();
	 * $CKEditor->returnOutput = true;
	 * $code = $CKEditor->editor("editor1", "<p>Initial value.</p>");
	 * echo "<p>Editor 1:</p>";
	 * echo $code;
	 * @endcode
	 */
	public $returnOutput = false;
	/**
	 * An array with textarea attributes.
	 *
	 * When %CKEditor is created with the editor() method, a HTML &lt;textarea&gt; element is created,
	 * it will be displayed to anyone with JavaScript disabled or with incompatible browser.
	 */
	public $textareaAttributes = array( "rows" => 8, "cols" => 60 );
	/**
	 * A string indicating the creation date of %CKEditor.
	 * Do not change it unless you want to force browsers to not use previously cached version of %CKEditor.
	 */
	public $timestamp = "A7HG4HT";
	/**
	 * An array that holds event listeners.
	 */
	private $events = array();
	/**
	 * An array that holds global event listeners.
	 */
	private $globalEvents = array();

	/**
	 * Main Constructor.
	 *
	 *  @param $basePath (string) URL to the %CKEditor installation directory (optional).
	 */
	function __construct($basePath = null) {
		if (!empty($basePath)) {
			$this->basePath = $basePath;
		}
	}

	/**
	 * Creates a %CKEditor instance.
	 * In incompatible browsers %CKEditor will downgrade to plain HTML &lt;textarea&gt; element.
	 *
	 * @param $name (string) Name of the %CKEditor instance (this will be also the "name" attribute of textarea element).
	 * @param $value (string) Initial value (optional).
	 * @param $config (array) The specific configurations to apply to this editor instance (optional).
	 * @param $events (array) Event listeners for this editor instance (optional).
	 *
	 * Example usage:
	 * @code
	 * $CKEditor = new CKEditor();
	 * $CKEditor->editor("field1", "<p>Initial value.</p>");
	 * @endcode
	 *
	 * Advanced example:
	 * @code
	 * $CKEditor = new CKEditor();
	 * $config = array();
	 * $config['toolbar'] = array(
	 *     array( 'Source', '-', 'Bold', 'Italic', 'Underline', 'Strike' ),
	 *     array( 'Image', 'Link', 'Unlink', 'Anchor' )
	 * );
	 * $events['instanceReady'] = 'function (ev) {
	 *     alert("Loaded: " + ev.editor.name);
	 * }';
	 * $CKEditor->editor("field1", "<p>Initial value.</p>", $config, $events);
	 * @endcode
	 */
	public function editor($name, $value = "", $config = array(), $events = array())
	{
		$attr = "";
		foreach ($this->textareaAttributes as $key => $val) {
			$attr.= " " . $key . '="' . str_replace('"', '&quot;', $val) . '"';
		}
		$out = "<textarea name=\"" . $name . "\"" . $attr . ">" . htmlspecialchars($value) . "</textarea>\n";
		if (!$this->initialized) {
			$out .= $this->init();
		}

		$_config = $this->configSettings($config, $events);

		$js = $this->returnGlobalEvents();
		if (!empty($_config))
			$js .= "CKEDITOR.replace('".$name."', ".$this->jsEncode($_config).");";
		else
			$js .= "CKEDITOR.replace('".$name."');";

		$out .= $this->script($js);

		if (!$this->returnOutput) {
			print $out;
			$out = "";
		}

		return $out;
	}

	/**
	 * Replaces a &lt;textarea&gt; with a %CKEditor instance.
	 *
	 * @param $id (string) The id or name of textarea element.
	 * @param $config (array) The specific configurations to apply to this editor instance (optional).
	 * @param $events (array) Event listeners for this editor instance (optional).
	 *
	 * Example 1: adding %CKEditor to &lt;textarea name="article"&gt;&lt;/textarea&gt; element:
	 * @code
	 * $CKEditor = new CKEditor();
	 * $CKEditor->replace("article");
	 * @endcode
	 */
	public function replace($id, $config = array(), $events = array())
	{
		$out = "";
		if (!$this->initialized) {
			$out .= $this->init();
		}

		$_config = $this->configSettings($config, $events);

		$js = $this->returnGlobalEvents();
		if (!empty($_config)) {
			$js .= "CKEDITOR.replace('".$id."', ".$this->jsEncode($_config).");";
		}
		else {
			$js .= "CKEDITOR.replace('".$id."');";
		}
		$out .= $this->script($js);

		if (!$this->returnOutput) {
			print $out;
			$out = "";
		}

		return $out;
	}

	/**
	 * Replace all &lt;textarea&gt; elements available in the document with editor instances.
	 *
	 * @param $className (string) If set, replace all textareas with class className in the page.
	 *
	 * Example 1: replace all &lt;textarea&gt; elements in the page.
	 * @code
	 * $CKEditor = new CKEditor();
	 * $CKEditor->replaceAll();
	 * @endcode
	 *
	 * Example 2: replace all &lt;textarea class="myClassName"&gt; elements in the page.
	 * @code
	 * $CKEditor = new CKEditor();
	 * $CKEditor->replaceAll( 'myClassName' );
	 * @endcode
	 */
	public function replaceAll($className = null)
	{
		$out = "";
		if (!$this->initialized) {
			$out .= $this->init();
		}

		$_config = $this->configSettings();

		$js = $this->returnGlobalEvents();
		if (empty($_config)) {
			if (empty($className)) {
				$js .= "CKEDITOR.replaceAll();";
			}
			else {
				$js .= "CKEDITOR.replaceAll('".$className."');";
			}
		}
		else {
			$classDetection = "";
			$js .= "CKEDITOR.replaceAll( function(textarea, config) {\n";
			if (!empty($className)) {
				$js .= "	var classRegex = new RegExp('(?:^| )' + '". $className ."' + '(?:$| )');\n";
				$js .= "	if (!classRegex.test(textarea.className))\n";
				$js .= "		return false;\n";
			}
			$js .= "	CKEDITOR.tools.extend(config, ". $this->jsEncode($_config) .", true);";
			$js .= "} );";

		}

		$out .= $this->script($js);

		if (!$this->returnOutput) {
			print $out;
			$out = "";
		}

		return $out;
	}

	/**
	 * Adds event listener.
	 * Events are fired by %CKEditor in various situations.
	 *
	 * @param $event (string) Event name.
	 * @param $javascriptCode (string) Javascript anonymous function or function name.
	 *
	 * Example usage:
	 * @code
	 * $CKEditor->addEventHandler('instanceReady', 'function (ev) {
	 *     alert("Loaded: " + ev.editor.name);
	 * }');
	 * @endcode
	 */
	public function addEventHandler($event, $javascriptCode)
	{
		if (!isset($this->events[$event])) {
			$this->events[$event] = array();
		}
		// Avoid duplicates.
		if (!in_array($javascriptCode, $this->events[$event])) {
			$this->events[$event][] = $javascriptCode;
		}
	}

	/**
	 * Clear registered event handlers.
	 * Note: this function will have no effect on already created editor instances.
	 *
	 * @param $event (string) Event name, if not set all event handlers will be removed (optional).
	 */
	public function clearEventHandlers($event = null)
	{
		if (!empty($event)) {
			$this->events[$event] = array();
		}
		else {
			$this->events = array();
		}
	}

	/**
	 * Adds global event listener.
	 *
	 * @param $event (string) Event name.
	 * @param $javascriptCode (string) Javascript anonymous function or function name.
	 *
	 * Example usage:
	 * @code
	 * $CKEditor->addGlobalEventHandler('dialogDefinition', 'function (ev) {
	 *     alert("Loading dialog: " + ev.data.name);
	 * }');
	 * @endcode
	 */
	public function addGlobalEventHandler($event, $javascriptCode)
	{
		if (!isset($this->globalEvents[$event])) {
			$this->globalEvents[$event] = array();
		}
		// Avoid duplicates.
		if (!in_array($javascriptCode, $this->globalEvents[$event])) {
			$this->globalEvents[$event][] = $javascriptCode;
		}
	}

	/**
	 * Clear registered global event handlers.
	 * Note: this function will have no effect if the event handler has been already printed/returned.
	 *
	 * @param $event (string) Event name, if not set all event handlers will be removed (optional).
	 */
	public function clearGlobalEventHandlers($event = null)
	{
		if (!empty($event)) {
			$this->globalEvents[$event] = array();
		}
		else {
			$this->globalEvents = array();
		}
	}

	/**
	 * Prints javascript code.
	 *
	 * @param string $js
	 */
	private function script($js)
	{
		$out = "<script type=\"text/javascript\">";
		$out .= "//<![CDATA[\n";
		$out .= $js;
		$out .= "\n//]]>";
		$out .= "</script>\n";

		return $out;
	}

	/**
	 * Returns the configuration array (global and instance specific settings are merged into one array).
	 *
	 * @param $config (array) The specific configurations to apply to editor instance.
	 * @param $events (array) Event listeners for editor instance.
	 */
	private function configSettings($config = array(), $events = array())
	{
		$_config = $this->config;
		$_events = $this->events;

		if (is_array($config) && !empty($config)) {
			$_config = array_merge($_config, $config);
		}

		if (is_array($events) && !empty($events)) {
			foreach ($events as $eventName => $code) {
				if (!isset($_events[$eventName])) {
					$_events[$eventName] = array();
				}
				if (!in_array($code, $_events[$eventName])) {
					$_events[$eventName][] = $code;
				}
			}
		}

		if (!empty($_events)) {
			foreach($_events as $eventName => $handlers) {
				if (empty($handlers)) {
					continue;
				}
				else if (count($handlers) == 1) {
					$_config['on'][$eventName] = '@@'.$handlers[0];
				}
				else {
					$_config['on'][$eventName] = '@@function (ev){';
					foreach ($handlers as $handler => $code) {
						$_config['on'][$eventName] .= '('.$code.')(ev);';
					}
					$_config['on'][$eventName] .= '}';
				}
			}
		}

		return $_config;
	}

	/**
	 * Return global event handlers.
	 */
	private function returnGlobalEvents()
	{
		static $returnedEvents;
		$out = "";

		if (!isset($returnedEvents)) {
			$returnedEvents = array();
		}

		if (!empty($this->globalEvents)) {
			foreach ($this->globalEvents as $eventName => $handlers) {
				foreach ($handlers as $handler => $code) {
					if (!isset($returnedEvents[$eventName])) {
						$returnedEvents[$eventName] = array();
					}
					// Return only new events
					if (!in_array($code, $returnedEvents[$eventName])) {
						$out .= ($code ? "\n" : "") . "CKEDITOR.on('". $eventName ."', $code);";
						$returnedEvents[$eventName][] = $code;
					}
				}
			}
		}

		return $out;
	}

	/**
	 * Initializes CKEditor (executed only once).
	 */
	private function init()
	{
		static $initComplete;
		$out = "";

		if (!empty($initComplete)) {
			return "";
		}

		if ($this->initialized) {
			$initComplete = true;
			return "";
		}

		$args = "";
		$ckeditorPath = $this->ckeditorPath();

		if (!empty($this->timestamp) && $this->timestamp != "%"."TIMESTAMP%") {
			$args = '?t=' . $this->timestamp;
		}

		// Skip relative paths...
		if (strpos($ckeditorPath, '..') !== 0) {
			$out .= $this->script("window.CKEDITOR_BASEPATH='". $ckeditorPath ."';");
		}

		$out .= "<script type=\"text/javascript\" src=\"" . $ckeditorPath . 'ckeditor.js' . $args . "\"></script>\n";

		$extraCode = "";
		if ($this->timestamp != self::timestamp) {
			$extraCode .= ($extraCode ? "\n" : "") . "CKEDITOR.timestamp = '". $this->timestamp ."';";
		}
		if ($extraCode) {
			$out .= $this->script($extraCode);
		}

		$initComplete = $this->initialized = true;

		return $out;
	}

	/**
	 * Return path to ckeditor.js.
	 */
	private function ckeditorPath()
	{
		if (!empty($this->basePath)) {
			return $this->basePath;
		}

		/**
		 * The absolute pathname of the currently executing script.
		 * Note: If a script is executed with the CLI, as a relative path, such as file.php or ../file.php,
		 * $_SERVER['SCRIPT_FILENAME'] will contain the relative path specified by the user.
		 */
		if (isset($_SERVER['SCRIPT_FILENAME'])) {
			$realPath = dirname($_SERVER['SCRIPT_FILENAME']);
		}
		else {
			/**
			 * realpath — Returns canonicalized absolute pathname
			 */
			$realPath = realpath( './' ) ;
		}

		/**
		 * The filename of the currently executing script, relative to the document root.
		 * For instance, $_SERVER['PHP_SELF'] in a script at the address http://example.com/test.php/foo.bar
		 * would be /test.php/foo.bar.
		 */
		$selfPath = dirname($_SERVER['PHP_SELF']);
		$file = str_replace("\\", "/", __FILE__);

		if (!$selfPath || !$realPath || !$file) {
			return "/ckeditor/";
		}

		$documentRoot = substr($realPath, 0, strlen($realPath) - strlen($selfPath));
		$fileUrl = substr($file, strlen($documentRoot));
		$ckeditorUrl = str_replace("ckeditor_php5.php", "", $fileUrl);
		$ckeditorUrl=str_replace("l/","",$ckeditorUrl);
		return $ckeditorUrl;
	}

	/**
	 * This little function provides a basic JSON support.
	 * http://php.net/manual/en/function.json-encode.php
	 *
	 * @param mixed $val
	 * @return string
	 */
	private function jsEncode($val)
	{
		if (is_null($val)) {
			return 'null';
		}
		if ($val === false) {
			return 'false';
		}
		if ($val === true) {
			return 'true';
		}
		if (is_scalar($val))
		{
			if (is_float($val))
			{
				// Always use "." for floats.
				$val = str_replace(",", ".", strval($val));
			}

			// Use @@ to not use quotes when outputting string value
			if (strpos($val, '@@') === 0) {
				return substr($val, 2);
			}
			else {
				// All scalars are converted to strings to avoid indeterminism.
				// PHP's "1" and 1 are equal for all PHP operators, but
				// JS's "1" and 1 are not. So if we pass "1" or 1 from the PHP backend,
				// we should get the same result in the JS frontend (string).
				// Character replacements for JSON.
				static $jsonReplaces = array(array("\\", "/", "\n", "\t", "\r", "\b", "\f", '"'),
				array('\\\\', '\\/', '\\n', '\\t', '\\r', '\\b', '\\f', '\"'));

				$val = str_replace($jsonReplaces[0], $jsonReplaces[1], $val);

				return '"' . $val . '"';
			}
		}
		$isList = true;
		for ($i = 0, reset($val); $i < count($val); $i++, next($val))
		{
			if (key($val) !== $i)
			{
				$isList = false;
				break;
			}
		}
		$result = array();
		if ($isList)
		{
			foreach ($val as $v) $result[] = $this->jsEncode($v);
			return '[ ' . join(', ', $result) . ' ]';
		}
		else
		{
			foreach ($val as $k => $v) $result[] = $this->jsEncode($k).': '.$this->jsEncode($v);
			return '{ ' . join(', ', $result) . ' }';
		}
	}
}
