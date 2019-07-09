<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DailyUsageRow $dailyUsageRow
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Daily Usage Rows'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Daily Usages'), ['controller' => 'DailyUsages', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Daily Usage'), ['controller' => 'DailyUsages', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Raw Materials'), ['controller' => 'RawMaterials', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Raw Material'), ['controller' => 'RawMaterials', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="dailyUsageRows form large-9 medium-8 columns content">
    <?= $this->Form->create($dailyUsageRow) ?>
    <fieldset>
        <legend><?= __('Add Daily Usage Row') ?></legend>
        <?php
            echo $this->Form->control('daily_usage_id', ['options' => $dailyUsages]);
            echo $this->Form->control('raw_material_id', ['options' => $rawMaterials]);
            echo $this->Form->control('quantity');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
