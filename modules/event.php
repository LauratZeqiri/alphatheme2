<h1 class="event-h1">Calendar</h1>
<?php if (get_row_layout() === 'event') {
    $events = get_sub_field('eventi');
    $count = 0;
    $event_ids = array();

    foreach ($events as $event) {
        $event_ids[] = $event->ID;
    }

?>

<div class="event-calendar">

    <?php foreach ($events as $event) {
        $count++;
        $emri_event= $event->post_title;
        $id = $event->ID;
        $oneliner1 = get_field('event_pershkrimi', $id);
        $event_image = get_the_post_thumbnail_url($id);
        $start_date = get_field('start_date', $id);
        $end_date = get_field('end_date', $id);

        $current_date = new DateTime(); // Get the current date as a DateTime object

        $end_date_obj = DateTime::createFromFormat('d/m/Y', $end_date);

        if ($end_date_obj !== false) {
            $end_date_formatted = $end_date_obj->format('Y-m-d');
        } else {
            error_reporting(E_ALL);
            ini_set('display_errors', 1);
        }

        $expired = ($end_date_obj < $current_date); // Compare DateTime objects

        ?>
        <div class="event-card">
            <a href="<?php echo get_permalink($event->ID); ?>" class="view-event-link">View Event</a>

            <div class="event-thumbnail">
                <img src="<?php echo $event_image; ?>" class="thumbnail-image">
            </div>
            <div class="event-details">
                <h2 class="event-title">
                    <span class="event-icon"><i class="far fa-calendar-days"></i></span>
                    <?= $emri_event; ?>
                </h2>

                <?php if (!$expired) { ?>
                    <div class="date-container">
                        <span class="event-date"><?= esc_html($start_date); ?></span>
                        <span class="hyphen">-</span>
                        <span class="event-date"><?= esc_html($end_date); ?></span>
                    </div>
                <?php } ?>

                <?php if ($expired) { ?>
                    <div class="expired-overlay">
                        <span class="expired-label">Expired!</span>
                    </div>
                <?php } ?>

                <p class="oneliner1"><?php echo esc_html($oneliner1); ?></p>
            </div>

      
        </div>

        <?php if ($count >= 9) break; ?>
    <?php } ?>
</div>

<?php } ?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-Bq2DtFXC3znv86s4h9p6SPXsFd/IhoHqAOpLz5q7iHVRiig/C9b85NI7eb6zB/6U" crossorigin="anonymous">
