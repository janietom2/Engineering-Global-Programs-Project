<?php

    if(isLogged()){
        Session::flash('log', "You have logged in!");
        Redirect::to('/');
    }

    get_header();
    get_content();

?>

    <div class="row">
        <div class="col-4 offset-md-4 login-holder">
            
            <div class="login-message">
                <p class="text-center login-text-header">Please login using your credentials</p>
            </div>

            <div class="login-info">
                <form method="POST" action="/login">
                    
                    <div class="form-group">
                        <label for="email">Email: </label>
                        <input class="form-control" type="text" id="email" name="email">
                    </div>

                    <div class="form-group">
                        <label for="pwd">Password:</label>
                        <input class="form-control" type="password" id="pwd" name="pwd">
                    </div>

                    <input type="hidden" name="token" value=<?php echo Token::generate(); ?>>

                    <div class="form-group">
                        <button type="submit" name="login" class="btn btn-primary">Login</button>
                    </div>

                </form>
            </div>    

        </div>
    </div>


<?php
    get_footer();
?>


