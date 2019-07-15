<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Floor $floor
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Floor'), ['action' => 'edit', $floor->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Floor'), ['action' => 'delete', $floor->id], ['confirm' => __('Are you sure you want to delete # {0}?', $floor->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Floors'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Floor'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="floors view large-9 medium-8 columns content">
    <h3><?= h($floor->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($floor->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= h($floor->status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($floor->id) ?></td>
        </tr>
    </table>
</div>
