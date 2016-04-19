{% extends "index.html" %} {% block middle %}
<div id="login">
    <form action="../Final-Ecommerce/loginValid.php" method="get">
        <center>
            <h1 id="welcome">Toys4U</h1>
        </center>

        <center>
            <div class="input-field" id="user">
                <label for="username">Username</label>
                <input id="username" type="text" name="username" required>
            </div>

            <div class="input-field" id="pass">
                <label for="pwd">Password</label>
                <input id="pwd" type="password" name="password" required>
            </div>

            <div>
                <button type="submit" class="btn" id="log" value="Login">Log in</button>
            </div>
        </center>
    </form>
</div>
{% endblock %} {% block content %}{% endblock %}