<div class="notifications index large-9 medium-8 columns content">
    <h3><?= __('Notifications') ?></h3>
    <table class="table">
        <thead>
            <tr>
                <th><?= __('name') ?></th>
                <th><?= __('created') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($notifications as $notification):
                if ($notification->isRead):
                ?>
                    <tr>
                <?php
                else:
                ?>
                    <tr class="warning">
                <?php
                endif;
                ?>
                <td><a class="display-block" href="<?= $notification->link ?>"><?= h($notification->name) ?></a></td>
                <td><a class="display-block" href="<?= $notification->link ?>"><?= $notification->created->timeAgoInWords() ?></a></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
