<!DOCTYPE html>
<html>
<head>
    <title>Welcome</title>
</head>
<body>
    <p>{{ $message }}</p>
    @guest
        <a href="https://dev-rwp4ps1yhz8i1x7o.us.auth0.com/u/login?state=hKFo2SAtTzJvcjNDVzZtZFBNZFFHYUxocFpJUTEySjZKYkNsdaFur3VuaXZlcnNhbC1sb2dpbqN0aWTZIHZPZ3h6U3l5dm13MGlVMUgxdUdNSTlQUF9kMkQ2U1VNo2NpZNkgV1p3MUZTZEd1TXd2ZFl0ZUpXRlhDVkVSZVVqd2dRM2w">Log In</a>
        <a href="https://{{ config('app.auth0_domain') }}/authorize?response_type=code&client_id={{ config('app.auth0_client_id') }}&redirect_uri={{ config('app.auth0_redirect_uri') }}&scope=openid profile email&state=random_state_string&nonce=random_nonce_string&connection={{ config('app.auth0_connection') }}">Sign Up</a>
    @else
        <!-- Display personalized content for authenticated users -->
        <!-- For example: Welcome back, {{ Auth::user()->name }} -->
    @endguest
</body>
</html>
