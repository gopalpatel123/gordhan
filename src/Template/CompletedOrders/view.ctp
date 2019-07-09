<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CompletedOrder $completedOrder
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Completed Order'), ['action' => 'edit', $completedOrder->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Completed Order'), ['action' => 'delete', $completedOrder->id], ['confirm' => __('Are you sure you want to delete # {0}?', $completedOrder->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Completed Orders'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Completed Order'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="completedOrders view large-9 medium-8 columns content">
    <h3><?= h($completedOrder->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Kot No') ?></th>
            <td><?= h($completedOrder->kot_no) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Bill No') ?></th>
            <td><?= h($completedOrder->bill_no) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($completedOrder->id) ?></td>
        </tr>
    </table>
</div>
