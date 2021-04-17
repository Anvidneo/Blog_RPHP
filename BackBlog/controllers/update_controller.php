<?php
class update_controller {
    private $db;

    public function update_user($post){
        # Define the variable
        $id             = $post['id'];
        $name           = $post['name'];
        $mail           = $post['mail'];
        $phone          = $post['phone'];
        $role           = $post['role'];
        $date_update    = date("Y-m-d");

        # Call the model
        require_once("models/modific_model.php");
        $con = new modific_model();
        $data = $con->update_user($id, $name, $mail, $phone, $role, $date_update);
        
        # Return response
        return $data;
    }

    public function update_category($post){
        # Define the variable
        $id             = $post['id'];
        $name           = $post['name'];
        $description    = $post['description'];

        # Call the model
        require_once("models/modific_model.php");
        $con = new modific_model();
        $data = $con->update_category($id, $name, $description);
        
        # Return response
        return $data;
    }

    public function update_post($post){
        # Define the variable
        $id             = $post['id'];
        $id_category    = $post['id_category'];
        $title          = $post['title'];
        $text           = $post['text'];
        $text_large     = $post['text_large'];
        $image          = '';
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
        $data = $con->update_post($id, $id_category, $title, $slug, $text, $text_large, $image, $date_update);
        
        # Return response
        return $data;
    }

    public function update_comment($post){
        # Define the variable
        $id   = $post['id'];
        $text = $post['text'];

        # Call the model
        require_once("models/modific_model.php");
        $con = new modific_model();
        $data = $con->update_comment($id, $text);
        
        # Return response
        return $data;
    }
}
?>
