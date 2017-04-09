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
     * Class file name is: class.name.inc.php
     *
     * @param string $class_name
     * @return string
     */
	private function inc_dot_name(string $class_name): string
    {
        $class_file_name = "class.{$class_name}.inc.php";
        return $class_file_name;
    }
	
	/**
	 * For namespace based class names access
	 *
     * @param string $class_name
     */
	public function namespaced_inc_dot(string $class_name)
	{
		$chunks = explode("\\", $class_name);

		/**
		 * From the last word
		 */
		$class_name = array_pop($chunks);
		
		$namespace = implode("/", $chunks);
		if(!$namespace) $namespace = ".";

        $class_file_name = $this->inc_dot_name($class_name);

		$path = $this->path;
		$file = "{$path}/{$namespace}/{$class_file_name}";
		
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
