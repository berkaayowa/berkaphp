<?php
namespace berkaPhp\template;

require_once('AutoLoader.php');
use \autoload\AppClassLoader;
AppClassLoader::loadBaseControllerRequires();
use \berkaPhp\helpers;

class AppView
{
	private $data;
	public $variables;
    private $flash;
    private $ajax_view;
    private $meta_tags;
	function __construct($variables='') {
		$this->variables = $variables;
		$this->data = null;
        $this->ajax_view = false;
        $this->data['title'] = '';
	}

	public function render() {
        $debug = 'display_debug';
		$trace = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, 2);
		$view_to_render =  $trace[count($trace) - 1]['function'];
		$called_controller =  $trace[count($trace) - 1]['class'];

		$called_controller = str_replace('Controller','',$called_controller);
		$called_controller = str_replace('controller','',$called_controller);
		$called_controller = str_replace('\\','',$called_controller);
		$called_controller = trim($called_controller);

		$template_data = $this->data;

        if(sizeof($this->data) > 0){
            extract($this->data);
        }

        $this->flash = isset($this->data['flash']) ? $this->data['flash'] : '';

        self::user_header_template(PREFIX, $this->meta_tags, $template_data['title'] );

		ob_start();
		require($_SERVER['DOCUMENT_ROOT'].'/Views/'.PREFIX.'/'.$called_controller.'/'.$view_to_render.'.php');
		$content = ob_get_contents();
		ob_end_clean();

		ob_start();
        require($_SERVER['DOCUMENT_ROOT'].'/Views/'.PREFIX.'/Layout/body.php');
        $template = ob_get_contents();
        ob_end_clean();

		$file = preg_match('/{.*[a-z0-9A-Z]}/', $template, $match) ;

        if ($file) {
            $match = $match[0];
            $new_template = str_replace('{content}', $content, $template);
            echo $new_template;
        }

        require($_SERVER['DOCUMENT_ROOT'].'/Views/'.PREFIX.'/Layout/footer.php');
	}

    public function render_ajax($option = array()) {
        $trace = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, 2);
        $view_to_render =  $trace[count($trace) - 1]['function'];
        $called_controller =  $trace[count($trace) - 1]['class'];

        $called_controller = str_replace('Controller','',$called_controller);
        $called_controller = str_replace('controller','',$called_controller);
        $called_controller = str_replace('\\','',$called_controller);
        $called_controller = trim($called_controller);

        $template_data = $this->data;
        $meta_data = $this->meta_tags;

        ob_start();
        require($_SERVER['DOCUMENT_ROOT'].'/Views/'.PREFIX.'/'.$called_controller.'/'.$view_to_render.'.php');
        $content = ob_get_contents();
        ob_end_clean();
        echo $content;

    }

	public function set($name,$data) {
        $this->data[$name]= $data;
	}

    public function set_meta_tag($meta_tags) {
        $this->meta_tags= $meta_tags;
    }

    public function is_ajax($is_it) {
        $this->ajax_view = $is_it;
    }

	public function get_content($path) {
		$content ='';
		ob_start();
		require($path);
		$content = ob_get_contents();
		ob_end_clean();

		return $content;
	}

	public function run_render($action) {
		$trace = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, 2);
		$view_to_render =  $action;
		$called_controller =  $trace[count($trace) - 1]['class'];

		$called_controller = str_replace('Controller','',$called_controller);
		$called_controller = str_replace('controller','',$called_controller);
		$called_controller = str_replace('\\','',$called_controller);
		$called_controller = trim($called_controller);

		$title = $called_controller;
		$template_data = $this->data;

        self::user_header_template(PREFIX);

		ob_start();
		require($_SERVER['DOCUMENT_ROOT'].'/Views/'.PREFIX.'/'.$called_controller.'/'.$view_to_render.'.php');
		$content = ob_get_contents();
		ob_end_clean();

		$template = file_get_contents($_SERVER['DOCUMENT_ROOT'].'/Views/'.PREFIX.'/Layout/body.php');

		$file = preg_match('/{.*[a-z0-9A-Z]}/', $template, $match) ;

		if ($file) {
		    $match = $match[0];
		    $new_template = str_replace(['{','}'], ['<?php echo $','?>'], $template);
		    eval("?> $new_template <?php ");
		    echo $new_template;
		}

        require($_SERVER['DOCUMENT_ROOT'].'/Views/'.PREFIX.'/Layout/footer.php');
	}

    private static function user_header_template($prefix, $meta = '', $_title = '') {
        $meta_data = !empty($meta) ? $meta : '';
        $title = $_title;
        require($_SERVER['DOCUMENT_ROOT'].'/Views/'.$prefix.'/Layout/header.php');
        require($_SERVER['DOCUMENT_ROOT'].'/Views/'.$prefix.'/Layout/navigation.php');
    }

    private static function user_footer_template() {
        require($_SERVER['DOCUMENT_ROOT'].'/Views/'.PREFIX.'/Layout/footer.php');
    }

}
?>