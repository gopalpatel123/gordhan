<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\FloorNo $floorNo
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Floor No'), ['action' => 'edit', $floorNo->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Floor No'), ['action' => 'delete', $floorNo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $floorNo->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Floor Nos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Floor No'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="floorNos view large-9 medium-8 columns content">
    <h3><?= h($floorNo->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($floorNo->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= h($floorNo->status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($floorNo->id) ?></td>
        </tr>
    </table>
</div>
