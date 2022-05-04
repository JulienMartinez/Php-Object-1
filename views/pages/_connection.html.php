<form action="/registered_l" method="post">
    <div class="center"><label for="mail">E-mail</label>
    <input type="text" name="mail" value=""></div>
    <div class="center"><label for="pseudo">Mot de passe</label>
    <input type="password" name="password" value=""></div>
    <div class="center"><input type="submit"></div>
</form>
<br>

<?php if(!empty($_SESSION['FORM_RESULT'])) echo $_SESSION['FORM_RESULT']; $_SESSION['FORM_RESULT'] = '' ?>

Inscrit toi =><a href="/">m'inscrire</a><br><br>
