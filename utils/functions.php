<?php
    function get_static_path($path) {
        $static_file_hosting = getenv("STATIC_FILE_HOSTING");
        $static_file_hosting_url = getenv("STATIC_FILE_HOSTING_URL");

        $dir = "";
        $url = "";

        if ($static_file_hosting) $dir .= $static_file_hosting;
        if ($static_file_hosting_url) $url .= $static_file_hosting_url;

        $dir .= $path."/";
        $url .= $path."/";

        return [$dir, $url];
    }
?>