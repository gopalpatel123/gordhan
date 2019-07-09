<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ReadyOrder $readyOrder
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Ready Orders'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="readyOrders form large-9 medium-8 columns content">
    <?= $this->Form->create($readyOrder) ?>
    <fieldset>
        <legend><?= __('Add Ready Order') ?></legend>
        <?php
            echo $this->Form->control('table_no');
            echo $this->Form->control('created_date');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
