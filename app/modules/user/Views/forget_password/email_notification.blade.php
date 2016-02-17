<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
</head>
<body>
<div class="span6 well">
    @if($user->last_visit==Null)
        <div>
            <p><strong>You can reset your password :</strong></p>
            {{ URL::to('password-reset-confirm/'.$link) }}.
        </div>
    @else
        <div>
            We heard that you lost your password. Sorry about that!<br><br>
            But don't worry! You can use the following link to reset your password:
        </div>
        <div>
            {{ URL::to('password-reset-confirm/'.$link) }}.
            <p><strong>If you don't use this link within 30 minutes, it will expire.</strong></p>
        </div>
    @endif
</div>
</body>
</html>