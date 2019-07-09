<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DailyUsage $dailyUsage
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Daily Usages'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Daily Usage Rows'), ['controller' => 'DailyUsageRows', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Daily Usage Row'), ['controller' => 'DailyUsageRows', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="dailyUsages form large-9 medium-8 columns content">
    <?= $this->Form->create($dailyUsage) ?>
    <fieldset>
        <legend><?= __('Add Daily Usage') ?></legend>
        <?php
            echo $this->Form->control('voucher_no');
            echo $this->Form->control('transaction_date');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
