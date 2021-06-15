<?php
class Form{

    public static $class = "form-control";

    public static function checkbox(string $name, string $value, array $data) : string{

        $attributes = '';
        if (isset($data[$name]) && in_array($value, $data[$name])){
            $attributes .= 'checked';
        }
        $class = self::$class ;
        return <<<HTML
                <label>
                    <input type="checkbox" name="{$name}[]" value="$value" $attributes class="{$class}">
                </label>
HTML;
    }
    public static function radio(string $name, string $value, array $data) : string{

        $attribute = '';
        if (isset($data[$name]) && in_array($value, $data[$name])){
            $attribute .= 'checked';
        }
        return <<<HTML
                <label>
                    <input type="radio" name="{$name}[]" value="$value" $attribute>
                </label>
    HTML;
    }
    public static function select (string $name, $value, array $options){
        $html_options = [];
        foreach($options as $k => $option){
            $attribute = $k === $value ? ' selected' :'' ;
            $html_options[] ="<option value='$k' $attribute>$option</option>" ;
        }
        return "<select class='form-control' name='$name'>" . implode($html_options) .' </select>';
    }

}