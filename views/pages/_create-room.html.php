<h3> Bonjour <?php echo $user ?> </h3>

<form action="/create_room_post" method="post">

    <fieldset>
        <legend>Type de chambre :</legend>
        <div>
            <input type="radio" id="type1" name="room_type" value="1">
            <label for="type1">Logement entier</label>
        </div>
        <div>
            <input type="radio" id="type2" name="room_type" value="2">
            <label for="type2">Chambre privée</label>
        </div>
        <div>
            <input type="radio" id="type3" name="room_type" value="3">
            <label for="type3">Chambre partagée</label>
        </div>
    </fieldset>

    <label for="surface">Superficie du logement</label>
    <input type="text" name="surface" value="">
    <label for="description">Nom du logement</label>
    <input type="text" name="description" value="">
    <label for="nb_sleep">Nombre de lit</label>
    <input type="number" id="nb_sleep" name="nb_sleep" value="">
    <label for="dispo_to">Prix (par nuits)</label>
    <input type="text" name="price" value="">
    <label for="country">Pays</label>
    <input type="text" name="country" value="">
    <label for="city">Ville</label>
    <input type="text" name="city" value="">
    <label for="address">Adresse</label>
    <input type="text" name="address" value="">
    <fieldset>
        <legend>Equipements :</legend>
        <div>
            <input type="checkbox" id="equipment1" name="equipments[]" value="1">
            <label for="equipment">Télévision</label>
        </div>
        <div>
            <input type="checkbox" id="equipment2" name="equipments[]" value="2">
            <label for="equipment2">Wifi</label>
        </div>
        <div>
            <input type="checkbox" id="equipment3" name="equipments[]" value="3">
            <label for="equipment3">Brosse a dents</label>
        </div>
        <div>
            <input type="checkbox" id="equipment4" name="equipments[]" value="4">
            <label for="equipment4">Piscine</label>
        </div>
        <div>
            <input type="checkbox" id="equipment5" name="equipments[]" value="5">
            <label for="equipment5">Papier toilette</label>
        </div>
    </fieldset>


    <input type="submit">
</form>


<?php if(!empty($_SESSION['FORM_RESULT'])) echo $_SESSION['FORM_RESULT']; $_SESSION['FORM_RESULT'] = '' ?>

