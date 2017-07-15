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

    /* fetches all data from database
    * @access public
    * @param  [$query] array f parameters
    * @return [array] array of data fetched from DB
    * @author berkaPhp
    */

	public function render() {

        $debug = 'display_debug';
		$trace = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, 2);
		$view_to_render =  $trace[count($trace) - 1]['function'];
		$called_controller =  $trace[count($trace) - 1]['class'];

        /* fetches all data from database
        * @access public
        * @param  [$query] array f parameters
        */
		$called_controller = str_replace('Controller','',$called_controller);
		$called_controller = str_replace('controller','',$called_controller);
		$called_controller = str_replace('\\','',$called_controller);
		$called_controller = trim($called_controller);

		$template_data = $this->data;

        /* fetches all data from database
        * @access public
        * @param  [$query] array f parameters
        */
        if(sizeof($this->data) > 0){
            extract($this->data);
        }

        $this->flash = isset($this->data['flash']) ? $this->data['flash'] : '';

        /* fetches all data from database
        * @access public
        * @param  [$query] array f parameters
        */
        self::user_header_template(PREFIX, $this->meta_tags, $template_data['title'] );

        /* fetches all data from database
        * @access public
        * @param  [$query] array f parameters
        */
        $content = "";

        $view_path = $_SERVER['DOCUMENT_ROOT'] . '/Views/' . PREFIX . '/' . $called_controller . '/' . $view_to_render . '.php';

        if(\berkaPhp\helpers\FileStream::file_exist($view_path)) {

            ob_start();
            require($view_path);
            $content = ob_get_contents();
            ob_end_clean();

        } else {

            \berkaPhp\helpers\RedirectHelper::redirect(
                '/errors/templatenotfound/?path='.$view_path.'&controller='.$called_controller.'&view='.$view_to_render,
                false, false);

        }

        /* fetches all data from database
        * @access public
        * @param  [$query] array f parameters
        */
		ob_start();
        require($_SERVER['DOCUMENT_ROOT'].'/Views/'.PREFIX.'/Layout/body.php');
        $template = ob_get_contents();
        ob_end_clean();

        /* fetches all data from database
        * @access public
        * @param  [$query] array f parameters
        */
		$file = preg_match('/{.*[a-z0-9A-Z]}/', $template, $match) ;

        if ($file) {
            $match = $match[0];
            $new_template = str_replace('{content}', $content, $template);
            echo $new_template;
        }

        /* fetches all data from database
        * @access public
        * @param  [$query] array f parameters
        */

        $message_box = "";
        $message = "";

        if(isset($this->data['message']['success'])) {

            $message_box = "alert-success";
            $message = $this->data['message']['success'];

        } elseif(isset($this->data['message']['error'])) {

            $message_box = "alert-danger";
            $message = $this->data['message']['error'];

        }

        ?>

        <?php if (DEBUG) : ?>
        <div class="console "  role="alert">
            <div class="heading">
                <span data-close-message class="glyphicon glyphicon-remove-circle pull-right close-message" aria-hidden="true"></span>
            </div>
            <span id="message">
                <?php
                    if(is_array($this->flash)) {
                        echo'<pre>';print_r($this->flash);
                    } else {
                        echo $this->flash;
                    }
                ?>
            </span>
        </div>
        <?php endif ?>

        <?php if(isset($this->data['message'])) :?>
            <div class="alert <?= $message_box ?> flash hide">
                <strong><?= $message ?></strong>
            </div>
        <?php endif ?>

        <?php

        /* fetches all data from database
        * @access public
        * @param  [$query] array f parameters
        */
        require($_SERVER['DOCUMENT_ROOT'].'/Views/'.PREFIX.'/Layout/footer.php');
	}

    public function render_ajax($option = array()) {

        $trace = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, 2);
        $view_to_render =  $trace[count($trace) - 1]['function'];
        $called_controller =  $trace[count($trace) - 1]['class'];

        /* fetches all data from database
        * @access public
        * @param  [$query] array f parameters
        */
        $called_controller = str_replace('Controller','',$called_controller);
        $called_controller = str_replace('controller','',$called_controller);
        $called_controller = str_replace('\\','',$called_controller);
        $called_controller = trim($called_controller);

        $template_data = $this->data;
        $meta_data = $this->meta_tags;

        /* fetches all data from database
        * @access public
        * @param  [$query] array f parameters
        */
        ob_start();
        require($_SERVER['DOCUMENT_ROOT'].'/Views/'.PREFIX.'/'.$called_controller.'/'.$view_to_render.'.php');
        $content = ob_get_contents();
        ob_end_clean();
        echo $content;

    }

    /* fetches all data from database
    * @access public
    * @param  [$query] array f parameters
    */
	public function set($name,$data) {
        $this->data[$name]= $data;
	}

    /* fetches all data from database
    * @access public
    * @param  [$query] array f parameters
    */
    public function set_meta_tag($meta_tags) {
        $this->meta_tags= $meta_tags;
    }

    /* fetches all data from database
    * @access public
    * @param  [$query] array f parameters
    */
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

    /* fetches all data from database
    * @access public
    * @param  [$query] array f parameters
    */
    private static function user_header_template($prefix, $meta = '', $_title = '') {
        $meta_data = !empty($meta) ? $meta : '';
        $title = $_title;
        require($_SERVER['DOCUMENT_ROOT'].'/Views/'.$prefix.'/Layout/header.php');
        require($_SERVER['DOCUMENT_ROOT'].'/Views/'.$prefix.'/Layout/navigation.php');
    }

    /* fetches all data from database
    * @access public
    * @param  [$query] array f parameters
    */
    private static function user_footer_template() {
        require($_SERVER['DOCUMENT_ROOT'].'/Views/'.PREFIX.'/Layout/footer.php');
    }

}
?>