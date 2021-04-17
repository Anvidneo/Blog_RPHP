<?php
    $res = [];
    header('Access-Control-Allow-Origin: *');
    $request = array_key_exists('request', $_POST) ? $_POST['request']: '';

    switch ($request) {
        case 'login':
            $mail = $_POST['mail'];
            $pass = $_POST['password'];

            require_once('controllers/consult_controller.php');
            $con = new consult_controller();
            $data = $con->login($mail, $pass);
            $res = $data;
            break;
        
        # USERS
        case 'register':
            require_once('controllers/insert_controller.php');
            $con = new insert_controller();
            $data = $con->register($_POST);
            $res = $data;
            break;

        case 'users':
            $role = $_POST['role'];

            require_once('controllers/consult_controller.php');
            $con = new consult_controller();
            $data = $con->consult_users($role);
            $res = $data;
            break;
        
        case 'update_user':
            require_once('controllers/update_controller.php');
            $con = new update_controller();
            $data = $con->update_user($_POST);
            $res = $data;
            break;
        
        case 'delete_user':
            require_once('controllers/delete_controller.php');
            $con = new delete_controller();
            $data = $con->delete_user($_POST);
            $res = $data;
            break;
        
        # CATEGORIES
        case 'new_category':
            require_once('controllers/insert_controller.php');
            $con = new insert_controller();
            $data = $con->insert_category($_POST);
            $res = $data;
            break;

        case 'category':
            $id = $_POST['id'];

            require_once('controllers/consult_controller.php');
            $con = new consult_controller();
            $data = $con->consult_categories($id);
            $res = $data;
            break;
        
        case 'update_category':
            require_once('controllers/update_controller.php');
            $con = new update_controller();
            $data = $con->update_category($_POST);
            $res = $data;
            break;
        
        case 'delete_category':
            require_once('controllers/delete_controller.php');
            $con = new delete_controller();
            $data = $con->delete_category($_POST);
            $res = $data;
            break;

        # POSTS
        case 'new_post':
            require_once('controllers/insert_controller.php');
            $con = new insert_controller();
            $data = $con->insert_post($_POST);
            $res = $data;
            break;

        case 'posts':
            require_once('controllers/consult_controller.php');
            $con = new consult_controller();
            $data = $con->consult_posts($_POST);
            $res = $data;
            break;
        
        case 'update_post':
            require_once('controllers/update_controller.php');
            $con = new update_controller();
            $data = $con->update_post($_POST);
            $res = $data;
            break;
        
        case 'delete_post':
            require_once('controllers/delete_controller.php');
            $con = new delete_controller();
            $data = $con->delete_post($_POST);
            $res = $data;
            break;
        
        # LIKES
        case 'new_like':
            require_once('controllers/insert_controller.php');
            $con = new insert_controller();
            $data = $con->insert_like($_POST);
            $res = $data;
            break;

        case 'likes':
            require_once('controllers/consult_controller.php');
            $con = new consult_controller();
            $data = $con->consult_likes($_POST);
            $res = $data;
            break;
                
        case 'delete_like':
            require_once('controllers/delete_controller.php');
            $con = new delete_controller();
            $data = $con->delete_like($_POST);
            $res = $data;
            break;
        
        # COMMENTS
        case 'new_comment':
            require_once('controllers/insert_controller.php');
            $con = new insert_controller();
            $data = $con->insert_comment($_POST);
            $res = $data;
            break;

        case 'comments':
            require_once('controllers/consult_controller.php');
            $con = new consult_controller();
            $data = $con->consult_comments($_POST);
            $res = $data;
            break;

        case 'update_comment':
            require_once('controllers/update_controller.php');
            $con = new update_controller();
            $data = $con->update_comment($_POST);
            $res = $data;
            break;

        case 'delete_comment':
            require_once('controllers/delete_controller.php');
            $con = new delete_controller();
            $data = $con->delete_comment($_POST);
            $res = $data;
            break;
        # DEFAULT
        default:
            $res = array(
                'state'     => 0,
                'message'   => 'Not resquest'
            );
            break;

    }
    // ob_end_clean();
    $res = json_encode($res);
    echo $res;
?>
