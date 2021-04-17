<?php
class consult_controller {
    private $db;

    public function login($mail, $pass){
        # Encrypt password
        $SALT = 'EstoEsUnSalt';
        $pass =  hash('sha512', $SALT . $pass);

        # Call the model
        require_once("models/consult_model.php");
        $con = new consult_model();
        $data = $con->get_user($mail, $pass);

        # Test the data
        if ($data === false || $data === null){
            $res = array(
                'state'     => 0,
                'message'   => 'Login error'
            );
        } else {
            $res = array(
                'state'     => 1,
                'message'   => 'Login successfully',
                'name'      => $data['name'],
                'role'      => $data['role']
            );
        }
        
        # Return response
        return $res;
    }
    
    public function consult_users($role = ''){
        # Call the model
        require_once("models/consult_model.php");
        $con = new consult_model();
        $data = $con->get_users($role);

        # Test the data
        if ($data === false || $data === null){
            $res = array(
                'state'     => 0,
                'message'   => 'Consult with error'
            );
        } else {
            $res = array(
                'state'     => 1,
                'message'   => 'Consult successfully',
                'data'      => $data
            );
        }
        
        # Return response
        return $res;
    }

    public function consult_categories($id = ''){
        # Call the model
        require_once("models/consult_model.php");
        $con = new consult_model();
        $data = $con->get_categories($id);

        # Test the data
        if ($data === false || $data === null){
            $res = array(
                'state'     => 0,
                'message'   => 'Consult with error'
            );
        } else {
            $res = array(
                'state'     => 1,
                'message'   => 'Consult successfully',
                'data'      => $data
            );
        }
        
        # Return response
        return $res;
    }

    public function consult_posts($post){
        # Define the variable
        $id          = $post['id'];
        $category    = $post['id_category'];

        # Call the model
        require_once("models/consult_model.php");
        $con = new consult_model();
        $data = $con->get_posts($id, $category);

        # Test the data
        if ($data === false || $data === null){
            $res = array(
                'state'     => 0,
                'message'   => 'Consult with error'
            );
        } else {
            $res = array(
                'state'     => 1,
                'message'   => 'Consult successfully',
                'data'      => $data
            );
        }
        
        # Return response
        return $res;
    }

    public function consult_likes($post){
        # Define the variable
        $id = $post['id'];

        # Call the model
        require_once("models/consult_model.php");
        $con = new consult_model();
        $data = $con->get_likes($id);

        # Test the data
        if ($data === false || $data === null){
            $res = array(
                'state'     => 0,
                'message'   => 'Consult with error'
            );
        } else {
            $res = array(
                'state'     => 1,
                'message'   => 'Consult successfully',
                'data'      => $data
            );
        }
        
        # Return response
        return $res;
    }

    public function consult_comments($post){
        # Define the variable
        $id = $post['id'];

        # Call the model
        require_once("models/consult_model.php");
        $con = new consult_model();
        $data = $con->get_comments($id);

        # Test the data
        if ($data === false || $data === null){
            $res = array(
                'state'     => 0,
                'message'   => 'Consult with error'
            );
        } else {
            $res = array(
                'state'     => 1,
                'message'   => 'Consult successfully',
                'data'      => $data
            );
        }
        
        # Return response
        return $res;
    }
}
?>
