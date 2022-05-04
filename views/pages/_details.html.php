<h2><?php echo $title ?></h2>

<?php if( empty( $room_by_id ) ): ?>
    <div>Plus de disponibilité sur cette chambre</div>
<?php else: ?>

    <ul>
            <li>
                <?php echo $room_by_id->description ?><br>
                <?php echo $room_by_id->surface . ' m2' ?><br>

                <?php if(!empty($_SESSION['USER']) && $_SESSION['USER']->user_type === 1): ?>
                    <form action="/rent_room_post" method="post">
                    <input type="hidden" name="room_id" value="<?php echo $_GET['id']?>">

                    <input type="submit">
                    </form>
                <?php endif; ?>
            </li>
    </ul>
    <?php if(!empty($_SESSION['USER']) && $_SESSION['USER']->user_type === 1): ?>
    <?php if(!empty($_SESSION['FORM_RESULT'])) echo $_SESSION['FORM_RESULT']; $_SESSION['FORM_RESULT'] = '' ?>
    <?php endif ?>
<?php endif ?>