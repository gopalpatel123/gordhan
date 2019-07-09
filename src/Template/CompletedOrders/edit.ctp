<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CompletedOrder $completedOrder
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $completedOrder->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $completedOrder->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Completed Orders'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="completedOrders form large-9 medium-8 columns content">
    <?= $this->Form->create($completedOrder) ?>
    <fieldset>
        <legend><?= __('Edit Completed Order') ?></legend>
        <?php
            echo $this->Form->control('kot_no');
            echo $this->Form->control('bill_no');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
