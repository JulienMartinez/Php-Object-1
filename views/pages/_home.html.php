<?php if( !empty($error) ): ?>
<div style="color:red"><?php echo $error ?></div>
<?php endif?>
<form action="/registered_i" method="post">
    <div class="center"><label for="nickname">Pseudo</label>
    <input type="text" name="nickname" value=""></div>
    <div class="center"><label for="pseudo">Mot de passe</label>
    <input type="password" name="password" value=""></div>
    <div class="center"><label for="mail">E-mail</label>
    <input type="email" name="mail" value=""></div>
    <div><label for="type_account">Utilisateur</label>
    <input type="checkbox" name="user_type" value="2">Annonceur</div>
    <div class="center"><input type="submit"></div>
</form>

<div>Deja inscrit, connecte toi =><a href="/connection">Connectez-vous</a></div>