<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\NationalFestival $nationalFestival
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit National Festival'), ['action' => 'edit', $nationalFestival->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete National Festival'), ['action' => 'delete', $nationalFestival->id], ['confirm' => __('Are you sure you want to delete # {0}?', $nationalFestival->id)]) ?> </li>
        <li><?= $this->Html->link(__('List National Festivals'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New National Festival'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="nationalFestivals view large-9 medium-8 columns content">
    <h3><?= h($nationalFestival->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($nationalFestival->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Statas') ?></th>
            <td><?= h($nationalFestival->statas) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Changed Fixed') ?></th>
            <td><?= h($nationalFestival->changed_fixed) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($nationalFestival->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Effected Date') ?></th>
            <td><?= h($nationalFestival->effected_date) ?></td>
        </tr>
    </table>
</div>
