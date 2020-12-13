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

    function read_json($json_path) {
        $json = file_get_contents(__DIR__.$json_path);

        # Handle not existing JSON file
        if ($json == false) {
            echo "Error while reading JSON file: No JSON file provided in ".$json_path; 
        }
        
        # Handle error while reading JSON file
        $json_array = json_decode($json, true);
        if ($json_array == null) {
            echo "Error while reading JSON file: Cannot decode JSON file ".$json_path; 
        }

        return $json_array;
    }
?>