<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign in</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="shortcut icon" href="#">
    <style>
        html,
        body {
            height: 75%;
        }

        .form-signin {
            max-width: 330px;
            padding: 1rem;
        }

        .form-signin .form-floating:focus-within {
            z-index: 2;
        }

        .form-signin input[name="login"] {
            margin-bottom: -1px;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
        }

        .form-signin input[type="password"] {
            margin-bottom: 10px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }

    </style>
</head>
<body class="d-flex align-items-center py-4 bg-body-tertiary">
<div class="container">
    <main class="form-signin w-100 m-auto">

        <? if (isset($error)) : ?>
            <div class="alert alert-danger" role="alert">
                <?= $error ?>
            </div>
        <? endif;?>

	    <?= Form::open() ?>
        <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

        <div class="form-floating">
		    <?= Form::input('login', NULL, [
                'class'         => 'form-control',
                'placeholder'   => ' ' /*hack for moving label to top */
            ]) ?>
		    <?= Form::label('login') ?>
        </div>
        <div class="form-floating">
		    <?= Form::password('password', NULL, [
                'class'       => 'form-control',
                'placeholder' => ' '
            ]) ?>
		    <?= Form::label('password') ?>
        </div>

        <div class="form-check text-start my-3">
		    <?= Form::checkbox('is_remember', NULL, FALSE, [
                'class' => 'form-check-input',
                'id'    => 'is_remember',
                'style' => 'cursor:pointer'
            ]) ?>

		    <?= Form::label('is_remember', 'Remember me', [
                'class' => 'form-check-label',
                'style' => 'cursor:pointer'
            ]) ?>
        </div>
	    <?= Form::submit('submit', 'Sign in', ['class' => 'btn btn-primary w-100 py-2']) ?>
	    <?= Form::close() ?>
    </main>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>
</html>