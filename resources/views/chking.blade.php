<html>
<body>
<form  method="post" action="{{"resetPassword"}}">

    <input type="hidden" name="token" value="{{ csrf_field() }}">
    <input type="email" name="email">
    <input type="submit">
</form>
</body>>
</html>>