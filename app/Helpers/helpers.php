<?php

if (! function_exists('get_salted_id')) {
    /**
     * URLパラメータで渡されたソルト入りidを復号化して、ソルト文字を取り除く関数。
     *
     * @param string $value
     * @return string
     */
    function get_salted_id($request, $goal_id)
    {
        $salted = \Crypt::decrypt($request->id);
        $id = str_replace($goal_id, '', $salted);
        return $id;
    }
}
