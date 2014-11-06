<?php

function loadView ($strViewPath, $arrayOfData=array())
{
    // This makes $arrayOfData['content'] turn into $content
    extract($arrayOfData);

    // Require the file
    ob_start();
    $strViewPath_ = __DIR__ .'/'. $strViewPath;
    require($strViewPath_);

    // Return the string
    $strView = ob_get_contents();
    ob_end_clean();
    echo $strView;
}
/*
abstract class bView {
    public $data;
    public $template;
    private function getStringBetween($str) {
        $from = "['";
        $to = "']";
        $sub = substr($str, strpos($str, $from) + strlen($from), strlen($str));
        return substr($sub, 0, strpos($sub, $to));
    }

    public function get_template() {
        $modulo = chop(get_called_class(), 'View');
        $file = __DIR__ . '/../plantillas/' . $modulo . '/' .$this->template;
        $tfile=  file_get_contents($file);
        $lines = explode("\n", $tfile);
        if(strpos($lines[0], '{extend ')!== FALSE) {
            $base = $this->getStringBetween($lines[0]);
            $file_base =  __DIR__ . '/../plantillas/' . $modulo . '/' . $base;
            $html = file_get_contents($file_base);
            array_shift($lines);
            $skipped_content = implode("\n", $lines);
            $res = str_replace('{block}', $skipped_content, $html);
        } else {
            $res = file_get_contents($file);
        }
        return $res;
    }

    public function render_dinamic_data($html, $data) {
        foreach ($data as $clave => $valor) {
            $html = str_replace('{' . $clave . '}', $valor, $html);
        }
        return $html;
    }

    public function retornar_vista() {
        $html = $this->get_template();
        $html = $this->render_dinamic_data($html, $this->data);
        print $html;
    }

}
?>*/

