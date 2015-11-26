<table class="table table-responsive">
    <thead>
    <tr>
        <th class="mll-table"><?= __("Date"); ?></th>
        <th><?= __("New"); ?></th>
        <th><?= __("Link"); ?></th>
    </tr>
    </thead>
    <tbody>
    <?php
    $compteur = 0;
    foreach ($news as $new):
        $compteur++;
        if ($compteur % 2)
            echo "<tr class='success'>";
        else
            echo "<tr class='info'>";
    ?>
            <td><?= $new->date ?></td>
            <td><?= $new->description ?></td>
            <td>
                <?php if ($new->link) :
                    echo $this->html->link(__('Link'), $new->link);
                endif;
                ?>
            </td>
        </tr>
    <?php
    endforeach;
    ?>
    </tbody>
</table>
