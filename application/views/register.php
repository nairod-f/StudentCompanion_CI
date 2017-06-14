

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no, width=device-width">

        <title></title>

                <link type="text/css" rel="stylesheet" href="<?=base_url('css/font-awesome.min.css')?>">
                <link type="text/css" rel="stylesheet" href="<?=base_url('css/style.css')?>">

                <script type="text/javascript" src="<?=base_url('js/jquery-3.1.1.min.js')?>"></script>
    </head>

    <body id="register-page">

        <?=form_open($formdata['action'], $formdata['attributes']); ?>
            <h3> Register with<a></h3>
            </div>

        <div id="socialmedia">
    			<button type="button" class="button-default"><i class="fa fa-facebook"></i></button>
    			<button type="button" class="button-default"><i class="fa fa-twitter"></i></button>
    			<button type="button" class="button-default"><i class="fa fa-google-plus"></i></button>

            <hr> or <hr>

        </div>

<?php
    foreach ($form as $field):
?>
            <div class="input-spaces">
                <?=form_input($field);?>
            </div>
<?php
    endforeach;
?>


            <div class="flex-box">
                <div class="flex-space"></div>
                <button type="submit">Register</button>
            </div>


        <?=form_close();?>
    </body>
</html>
