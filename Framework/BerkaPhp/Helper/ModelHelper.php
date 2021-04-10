<?php

namespace BerkaPhp\Helper;
/**
 * Created by PhpStorm.
 * User: berka
 * Date: 2017/12/02
 * Time: 02:09
 */

class Model {
    public static function Create($params, $withFooter = true) {

        $template = self::getModelTemplate($withFooter);

        foreach($params as $param => $value) {
            $template =  str_replace('{'.$param.'}', $value, $template);
        }

        return $template;

    }

    public static function openButton($id) {
        return 'data-toggle="modal" data-target="#'.$id.'"';
    }

    private static function getModelTemplate($withFooter){

        $footerTemplate = '<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>';

        $footer = ($withFooter == true) ? $footerTemplate : "";

        $template = '
                <div id="{id}" class="modal fade" role="dialog">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">{title}</h4>
                      </div>
                      <div class="modal-body">
                        {content}
                      </div>

                      <div class="modal-footer">
                        '.$footer.'
                      </div>
                    </div>
                  </div>
                </div>
                ';
        return $template;
    }
}

?>