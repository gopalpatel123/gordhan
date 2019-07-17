<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\NationalFestival $nationalFestival
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $nationalFestival->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $nationalFestival->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List National Festivals'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="nationalFestivals form large-9 medium-8 columns content">
    <?= $this->Form->create($nationalFestival) ?>
    <fieldset>
        <legend><?= __('Edit National Festival') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('effected_date');
            echo $this->Form->control('statas');
            echo $this->Form->control('changed_fixed');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
