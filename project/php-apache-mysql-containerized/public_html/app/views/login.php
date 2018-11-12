<?php
    get_header();
    get_content();

    $user = new User();

    echo $user->data()->pid;
    echo "test";
?>

    <div class="row">
        <div class="col-3 offset-md-4 login-holder">
            <p>Please login using your credentials</p>
            <form method="POST" action="/verifycred">
                
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
                    <input type="submit" value="login" name="login" class="btn btn-default">
                </div>

            </form>
        </div>
    </div>


<?php
    get_footer();
?>


