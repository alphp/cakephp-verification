<?php
declare(strict_types=1);

/**
 * @var \App\View\AppView $this
 * @var array $availableDrivers
 * @var ?string $selectedDriver
 */


$this->assign('title', __d('verification', 'Verification choosing'));

echo $this->Html->div('verification enroll');
echo $this->Form->create();
echo $this->Form->control('verification_preferences.otp_driver', ['label' => __d('verification', 'Verification method'), 'options' => $availableDrivers, 'value' => $selectedDriver]);
echo $this->Form->button(__d('verification', 'Confirm'));
echo $this->Form->end();
echo $this->Html->tag('/div');
