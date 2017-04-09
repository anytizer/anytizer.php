<?php
namespace backend;

class spl_include
{
	/**
	 * Directory of classes
     * @var string
     */
	private $path;

	/**
	 * Which path to lookup?
	 *
     * spl_include constructor.
     * @param string $path
     */
	public function __construct(string $path)
	{
		$this->path = realpath($path);
	}
	
	/**
	 * For namespace based class names access
	 *
     * @param string $class
     */
	public function namespaced_inc_dot(string $class)
	{
		$chunks = explode("\\", $class);

		/**
		 * From the last word
		 */
		$class = array_pop($chunks);
		
		$namespace = implode("/", $chunks);
		if(!$namespace) $namespace = ".";

		$path = $this->path;
		$file = "{$path}/{$namespace}/class.{$class}.inc.php";
		
		if(is_file($file))
		{
			require_once($file);
		}
		#echo "\r\n", $file;
		
		/**
		 * Continue to other handlers in case of failures
		 */
	}

	/**
     * @todo PSR-0
     * @todo PSR-4
     */
}
