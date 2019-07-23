<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PendingKot $pendingKot
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Pending Kot'), ['action' => 'edit', $pendingKot->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Pending Kot'), ['action' => 'delete', $pendingKot->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pendingKot->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Pending Kots'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pending Kot'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Tables'), ['controller' => 'Tables', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Table'), ['controller' => 'Tables', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Employees'), ['controller' => 'Employees', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Employee'), ['controller' => 'Employees', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Pending Kot Rows'), ['controller' => 'PendingKotRows', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pending Kot Row'), ['controller' => 'PendingKotRows', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="pendingKots view large-9 medium-8 columns content">
    <h3><?= h($pendingKot->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Employee') ?></th>
            <td><?= $pendingKot->has('employee') ? $this->Html->link($pendingKot->employee->name, ['controller' => 'Employees', 'action' => 'view', $pendingKot->employee->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Table') ?></th>
            <td><?= $pendingKot->has('table') ? $this->Html->link($pendingKot->table->name, ['controller' => 'Tables', 'action' => 'view', $pendingKot->table->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Kot Pending') ?></th>
            <td><?= h($pendingKot->kot_pending) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Order Type') ?></th>
            <td><?= h($pendingKot->order_type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cancle') ?></th>
            <td><?= h($pendingKot->cancle) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cancle Reason') ?></th>
            <td><?= h($pendingKot->cancle_reason) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($pendingKot->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Financial Year Id') ?></th>
            <td><?= $this->Number->format($pendingKot->financial_year_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Table No') ?></th>
            <td><?= $this->Number->format($pendingKot->table_no) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('No Of Pax') ?></th>
            <td><?= $this->Number->format($pendingKot->no_of_pax) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('No Of Adult') ?></th>
            <td><?= $this->Number->format($pendingKot->no_of_adult) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('No Of Child') ?></th>
            <td><?= $this->Number->format($pendingKot->no_of_child) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created On') ?></th>
            <td><?= h($pendingKot->created_on) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cancle Time') ?></th>
            <td><?= h($pendingKot->cancle_time) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Comment') ?></h4>
        <?= $this->Text->autoParagraph(h($pendingKot->comment)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Pending Kot Rows') ?></h4>
        <?php if (!empty($pendingKot->pending_kot_rows)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Pending Kot Id') ?></th>
                <th scope="col"><?= __('Item Id') ?></th>
                <th scope="col"><?= __('Quantity') ?></th>
                <th scope="col"><?= __('Rate') ?></th>
                <th scope="col"><?= __('Amount') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($pendingKot->pending_kot_rows as $pendingKotRows): ?>
            <tr>
                <td><?= h($pendingKotRows->id) ?></td>
                <td><?= h($pendingKotRows->pending_kot_id) ?></td>
                <td><?= h($pendingKotRows->item_id) ?></td>
                <td><?= h($pendingKotRows->quantity) ?></td>
                <td><?= h($pendingKotRows->rate) ?></td>
                <td><?= h($pendingKotRows->amount) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'PendingKotRows', 'action' => 'view', $pendingKotRows->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'PendingKotRows', 'action' => 'edit', $pendingKotRows->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'PendingKotRows', 'action' => 'delete', $pendingKotRows->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pendingKotRows->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
