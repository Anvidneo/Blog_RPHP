<?php
class insert_controller {
    private $db;

    # Insert new user
    public function register($post){
        # Define the variables
        $name           = $post['name'];
        $mail           = $post['mail'];
        $pass           = $post['password'];
        $phone          = $post['phone'];
        $role           = $post['role'];
        $date_created   = date("Y-m-d");
        $date_update    = date("Y-m-d");

        # Encrypt password
        $SALT = 'EstoEsUnSalt';
        $pass =  hash('sha512', $SALT . $pass);

        # Call the model
        require_once("models/modific_model.php");
        $con = new modific_model();
        $param = "'$name', '$mail', '$pass', '$phone', $role, '$date_created', '$date_update'";
        $data = $con->insert_user($param);
        
        # Return response
        return $data;
    }

    # Insert new category
    public function insert_category($post){
        # Define the variables
        $name           = $post['name'];
        $description    = $post['description'];

        # Call the model
        require_once("models/modific_model.php");
        $con = new modific_model();
        $param = "'$name', '$description'";
        $data = $con->insert_category($param);
        
        # Return response
        return $data;
    }
    
    # Insert new post
    public function insert_post($post){
        # Define the variables
        $id_autor       = $post['id_autor'];
        $id_category    = $post['id_category'];
        $title          = $post['title'];
        $text           = $post['text'];
        $text_large     = $post['text_large'];
        $image          = '';
        $date_created   = date("Y-m-d");
        $date_update    = date("Y-m-d");

        # Create the slug
        $max = 30;
        $out = iconv('UTF-8', 'ASCII//TRANSLIT', $text);
        $out = substr(preg_replace("/[^-\/+|\w ]/", '', $out), 0, $max);
        $out = strtolower(trim($out, '-'));
        $slug = preg_replace("/[\/_| -]+/", '-', $out);

        # Call the model
        require_once("models/modific_model.php");
        $con = new modific_model();
        $param = "$id_autor, $id_category, '$title', '$slug', '$text', '$text_large', '$image', '$date_update', '$date_created'";
        $data = $con->insert_post($param);
        
        # Return response
        return $data;
    }

    # Insert new like
    public function insert_like($post){
        # Define the variables
        $id_autor       = $post['id_autor'];
        $id_post        = $post['id_post'];
        $date_created   = date("Y-m-d H:i:s");

        # Call the model
        require_once("models/modific_model.php");
        $con = new modific_model();
        $param = "$id_autor, $id_post, '$date_created'";
        $data = $con->insert_like($param);
        
        # Return response
        return $data;
    }

    # Insert new comment
    public function insert_comment($post){
        # Define the variables
        $id_autor       = $post['id_autor'];
        $id_post        = $post['id_post'];
        $text           = $post['text'];
        $date_created   = date("Y-m-d H:i:s");

        # Call the model
        require_once("models/modific_model.php");
        $con = new modific_model();
        $param = "$id_autor, $id_post, '$text', '$date_created'";
        $data = $con->insert_comment($param);
        
        # Return response
        return $data;
    }
}
?>
