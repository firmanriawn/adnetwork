<?php
    $this->load->view('admin/layout/header');
    if (!empty($css) && is_array($css)) {
        foreach ($css as $style) {
            echo '<link rel="stylesheet" type="text/css" href="' . $style. '">';
        }
    }
    $this->load->view($content);
    if (!empty($javascript) && is_array($javascript)) {
        foreach ($javascript as $script) {
            echo '<script src="' .$script . '"></script>';
        }
    }
    $this->load->view('admin/layout/footer');
?>