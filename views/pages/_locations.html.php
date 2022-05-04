<h1><?php echo $h1_tag ?></h1>

<?php if( empty( $rooms_all ) ): ?>
    <div>Plus de disponibilité sur cette chambre on ce moment</div>
<?php else: ?>
    <ul>
        <?php foreach( $rooms_all as $room ): ?>
            <li>Le super logement
                <a href="/chambre?id=<?php echo $room->id?>">
                <?php echo $room->description ?> est disponible pour
                ( <?php echo $room->price ?> € )<br>
                <?php echo $room->surface ?> <?php echo $room->nb_sleep ?><br>
                <?php echo $room->addresses->address . ' ' . $room->addresses->city . ' ' . $room->addresses->country ?>
                <?php foreach($room->equipments as $equipment): ?>
                <?php
                    echo $equipment->equipment; ?>
                <?php endforeach; ?>
                </a>
            </li>
        <?php endforeach ?>
    </ul>
<?php endif ?>