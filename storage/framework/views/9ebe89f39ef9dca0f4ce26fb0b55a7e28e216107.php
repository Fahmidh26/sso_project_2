<!DOCTYPE html>
<html>
<head>
    <title>Welcome</title>
</head>
<body>
    <p><?php echo e($message); ?></p>
    <?php if(auth()->guard()->guest()): ?>
        <a href="https://dev-rwp4ps1yhz8i1x7o.us.auth0.com/u/login?state=hKFo2SAtTzJvcjNDVzZtZFBNZFFHYUxocFpJUTEySjZKYkNsdaFur3VuaXZlcnNhbC1sb2dpbqN0aWTZIHZPZ3h6U3l5dm13MGlVMUgxdUdNSTlQUF9kMkQ2U1VNo2NpZNkgV1p3MUZTZEd1TXd2ZFl0ZUpXRlhDVkVSZVVqd2dRM2w">Log In</a>
        <a href="https://<?php echo e(config('app.auth0_domain')); ?>/authorize?response_type=code&client_id=<?php echo e(config('app.auth0_client_id')); ?>&redirect_uri=<?php echo e(config('app.auth0_redirect_uri')); ?>&scope=openid profile email&state=random_state_string&nonce=random_nonce_string&connection=<?php echo e(config('app.auth0_connection')); ?>">Sign Up</a>
    <?php else: ?>
        <!-- Display personalized content for authenticated users -->
        <!-- For example: Welcome back, <?php echo e(Auth::user()->name); ?> -->
    <?php endif; ?>
</body>
</html>
<?php /**PATH C:\SSO\erp\resources\views/welcome.blade.php ENDPATH**/ ?>