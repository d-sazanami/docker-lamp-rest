<?php

preg_match('|' . dirname($_SERVER['SCRIPT_NAME']) . '/([\w%/]*)|', $_SERVER['REQUEST_URI'], $matches);
$paths = explode('/', $matches[1]);
$id = isset($paths[1]) ? htmlspecialchars($paths[1]) : null;

$result = [];
try {
    switch (strtolower($_SERVER['REQUEST_METHOD']) . ':' . $paths[0]) {
        case 'post:user':
            // create array for json
            $result = ['result' => 'create success.'];
            break;
        case 'get:user':
            // create array for json
            require_once('user.php');
            $user = new User();
            $result = $user->get($id);
            break;
    }
} catch (ErrorException $e) {
    $result = ['result' => $e->getMessage()];
}

echo json_encode($result);
?>