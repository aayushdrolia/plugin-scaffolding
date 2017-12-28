<?php

namespace DFP\Plugins\AdManager;

trait LoadsView
{

    protected function loadView($file, $data = [])
    {
        extract($data);
        require plugin_dir_path(DFP_BASE_FILE) . 'views/' . $file . '.php';
    }

}
